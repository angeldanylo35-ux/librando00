<?php

namespace App\Http\Controllers\Api;

use App\Services\ImageService;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class PerfilController extends Controller
{
    // Campos de texto aceitos (whitelist do RF-007 / RN-12)
    private const CAMPOS = ['nome', 'nome_usuario', 'localizacao', 'bio'];

    // Arquivo enviado => [coluna que guarda a URL, pasta no disco]
    private const ARQUIVOS = [
        'foto_perfil' => ['foto_perfil_url', 'perfis'],
        'foto_capa' => ['foto_capa_url', 'capas'],
    ];

    // Ver o próprio perfil (preenche a tela e o formulário de edição)
    public function show(Request $request)
    {
        return response()->json([
            'sucesso' => true,
            'perfil' => $this->formatar($request->user()),
        ]);
    }

    // Excluir a própria conta (RF-007): a conta é sempre a dona do token
    public function excluirConta(Request $request)
    {
        $usuario = $request->user();

        try {
            DB::transaction(function () use ($usuario) {
                $usuario->tokens()->delete(); // invalida todos os tokens da conta
                $usuario->delete();           // posts e enquete_opcoes saem em cascata (FK)
            });
        } catch (\Throwable $e) {
            Log::error('Falha ao excluir conta: ' . $e->getMessage());

            return response()->json([
                'sucesso'  => false,
                'mensagem' => 'Não foi possível excluir a conta. Tente novamente.',
            ], 500);
        }

        return response()->json([
            'sucesso'  => true,
            'mensagem' => 'Conta excluída com sucesso.',
        ]);
    }
    // Editar o próprio perfil (POST /perfil, aceita arquivos)
    public function update(Request $request)
    {
        $user = $request->user(); // RN-02: sempre a conta autenticada, não existe {id} na rota

        // Nome e @ sem espaços nas pontas; o "@" digitado no campo não é gravado
        foreach (['nome', 'nome_usuario'] as $campo) {
            if (is_string($request->input($campo))) {
                $valor = trim($request->input($campo));
                if ($campo === 'nome_usuario') {
                    $valor = ltrim($valor, '@');
                }
                $request->merge([$campo => $valor]);
            }
        }

        $validator = Validator::make($request->all(), [
            'nome' => ['sometimes', 'required', 'string', 'max:100'],
            'nome_usuario' => [
                'sometimes', 'required', 'string', 'max:50',
                'regex:/^[A-Za-z0-9_.]+$/',
                Rule::unique('usuarios', 'nome_usuario')->ignore($user->id), // RN-05
            ],
            'localizacao' => ['sometimes', 'nullable', 'string', 'max:100'],
            'bio' => ['sometimes', 'nullable', 'string', 'max:300'],
            'foto_perfil' => ['sometimes', 'nullable', 'file', 'mimes:jpg,jpeg,png,webp', 'max:4096'],
            'foto_capa' => ['sometimes', 'nullable', 'file', 'mimes:jpg,jpeg,png,webp', 'max:6144'],
        ], [
            'nome.required' => 'Informe seu nome.',
            'nome.max' => 'O nome pode ter no máximo 100 caracteres.',
            'nome_usuario.required' => 'Informe seu nome de usuário.',
            'nome_usuario.max' => 'O nome de usuário pode ter no máximo 50 caracteres.',
            'nome_usuario.regex' => 'Use apenas letras, números, ponto e underline no nome de usuário.',
            'nome_usuario.unique' => 'Este nome de usuário já está em uso.',
            'localizacao.max' => 'A localização pode ter no máximo 100 caracteres.',
            'bio.max' => 'A bio pode ter no máximo 300 caracteres.',
            'foto_perfil.mimes' => 'A foto de perfil deve estar em formato .jpg, .png ou .webp.',
            'foto_perfil.max' => 'A foto de perfil pode ter no máximo 4 MB.',
            'foto_perfil.uploaded' => 'Não foi possível enviar a foto de perfil (arquivo grande demais?).',
            'foto_capa.mimes' => 'A capa deve estar em formato .jpg, .png ou .webp.',
            'foto_capa.max' => 'A capa pode ter no máximo 6 MB.',
            'foto_capa.uploaded' => 'Não foi possível enviar a capa (arquivo grande demais?).',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'sucesso' => false,
                'mensagem' => $validator->errors()->first(),
                'campos' => array_keys($validator->errors()->toArray()),
            ], 400);
        }

        // RN-13: só atualiza o que foi enviado (campo ausente = mantém o atual)
        $dados = $request->only(self::CAMPOS);

        // Envia os arquivos diretamente para o ImgBB (Nuvem)
        try {
            foreach (self::ARQUIVOS as $campo => [$coluna, $pasta]) {
                if ($request->hasFile($campo)) {
                    // Faz upload para o ImgBB e obtém o link direto permanente
                    $urlPublica = \App\Services\ImageService::uploadParaImgBB($request->file($campo));
                    $dados[$coluna] = $urlPublica;
                }
            }
        } catch (\Throwable $e) {
            Log::error('Falha ao enviar imagem para o ImgBB: ' . $e->getMessage());

            return response()->json([
                'sucesso' => false,
                'mensagem' => 'Não foi possível enviar a imagem para a nuvem. Tente novamente.',
            ], 500);
        }

        if (empty($dados)) {
            return response()->json([
                'sucesso' => false,
                'mensagem' => 'Nenhuma informação foi enviada para atualizar.',
            ], 400);
        }

        try {
            $user->forceFill($dados)->save(); // um único UPDATE: ou grava tudo ou não grava nada (RNF-06)
        } catch (QueryException $e) {
            // Duas pessoas pegando o mesmo @ ao mesmo tempo: o índice único do banco barra
            if ($e->getCode() === '23000' && array_key_exists('nome_usuario', $dados)) {
                return response()->json([
                    'sucesso' => false,
                    'mensagem' => 'Este nome de usuário já está em uso.',
                    'campos' => ['nome_usuario'],
                ], 400);
            }

            Log::error('Falha ao atualizar perfil: ' . $e->getMessage());

            return response()->json([
                'sucesso' => false,
                'mensagem' => 'Não foi possível salvar o perfil. Tente novamente.',
            ], 500);
        } catch (\Throwable $e) {
            Log::error('Falha ao atualizar perfil: ' . $e->getMessage());

            return response()->json([
                'sucesso' => false,
                'mensagem' => 'Não foi possível salvar o perfil. Tente novamente.',
            ], 500);
        }

        // RN-10: só chega aqui se o banco confirmou
        return response()->json([
            'sucesso' => true,
            'mensagem' => 'Perfil atualizado com sucesso!',
            'perfil' => $this->formatar($user->fresh()),
        ]);
    }
    private function formatar($u): array
    {
        return [
            'id' => $u->id,
            'nome' => $u->nome,
            'nome_usuario' => $u->nome_usuario,
            'localizacao' => $u->localizacao,
            'bio' => $u->bio,
            'foto_perfil_url' => $this->corrigirUrlImagem($u->foto_perfil_url),
            'foto_capa_url' => $this->corrigirUrlImagem($u->foto_capa_url),
        ];
    }
    private function corrigirUrlImagem(?string $url): ?string
    {
    if (!$url) {
        return null;
    }

    if (str_starts_with($url, 'http://librando-backend-8eqs.onrender.com/')) {
        return str_replace(
            'http://librando-backend-8eqs.onrender.com/',
            'https://librando-backend-8eqs.onrender.com/',
            $url
        );
    }

    return $url;
    }
}
