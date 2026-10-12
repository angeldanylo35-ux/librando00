<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    private const TIPOS = ['texto', 'imagem', 'gif', 'video', 'enquete'];

    // Feed: lista as publicações mais recentes
    public function index()
    {
        $posts = Post::with(['usuario:id,nome,nome_usuario', 'opcoes:id,post_id,texto,votos'])
            ->latest()
            ->paginate(10);

        return response()->json([
            'sucesso' => true,
            'posts' => $posts->getCollection()->map(fn ($p) => $this->formatar($p))->values(),
            'pagina_atual' => $posts->currentPage(),
            'ultima_pagina' => $posts->lastPage(),
        ]);
    }

    // Criar e publicar
    public function store(Request $request)
    {
        $tipo = $request->input('tipo');

        $regras = [
            'tipo' => ['required', Rule::in(self::TIPOS)],
            'conteudo' => ['nullable', 'string', 'max:2000'],
        ];

        switch ($tipo) {
            case 'texto':
                $regras['conteudo'] = ['required', 'string', 'max:2000'];
                break;
            case 'imagem':
                $regras['midia'] = ['required', 'file', 'mimes:jpg,jpeg,png,webp', 'max:5120'];
                break;
            case 'gif':
                $regras['midia'] = ['required', 'file', 'mimes:gif', 'max:10240'];
                break;
            case 'video':
                $regras['midia'] = ['required', 'file', 'mimetypes:video/mp4,video/webm,video/quicktime', 'max:51200'];
                break;
            case 'enquete':
                $regras['conteudo'] = ['required', 'string', 'max:200'];
                $regras['opcoes'] = ['required', 'array', 'min:2', 'max:4'];
                $regras['opcoes.*'] = ['required', 'string', 'max:80', 'distinct'];
                break;
        }

        $validator = Validator::make($request->all(), $regras, [
            'tipo.required' => 'Selecione o tipo de publicação.',
            'tipo.in' => 'Tipo de publicação inválido.',
            'conteudo.required' => 'O conteúdo da publicação é obrigatório.',
            'conteudo.max' => 'O conteúdo excede o tamanho permitido.',
            'midia.required' => 'Selecione um arquivo para publicar.',
            'midia.uploaded' => 'O arquivo é maior que o limite aceito pelo servidor.',
            'midia.mimes' => 'Arquivo inválido para este tipo de publicação.',
            'midia.mimetypes' => 'Arquivo inválido para este tipo de publicação.',
            'midia.max' => 'O arquivo excede o tamanho máximo permitido.',
            'opcoes.required' => 'Informe as opções da enquete.',
            'opcoes.min' => 'A enquete precisa de pelo menos 2 opções.',
            'opcoes.max' => 'A enquete pode ter no máximo 4 opções.',
            'opcoes.*.required' => 'Preencha todas as opções da enquete.',
            'opcoes.*.distinct' => 'As opções da enquete não podem se repetir.',
            'opcoes.*.max' => 'Cada opção pode ter no máximo 80 caracteres.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'sucesso' => false,
                'mensagem' => $validator->errors()->first(),
                'campos' => array_keys($validator->errors()->toArray()), // para destacar os campos no front (A1)
            ], 400);
        }

        $caminho = null;

        try {
            $post = DB::transaction(function () use ($request, $tipo, &$caminho) {
                $dados = [
                    'usuario_id' => $request->user()->id,
                    'tipo' => $tipo,
                    'conteudo' => $request->input('conteudo'),
                ];

                if ($request->hasFile('midia')) {
                    $arquivo = $request->file('midia');
                    $caminho = $arquivo->store('posts', 'public');
                    $dados['midia_path'] = $caminho;
                    $dados['midia_mime'] = $arquivo->getMimeType();
                }

                $post = Post::create($dados);

                if ($tipo === 'enquete') {
                    foreach ($request->input('opcoes') as $texto) {
                        $post->opcoes()->create(['texto' => $texto]);
                    }
                }

                return $post;
            });
        } catch (\Throwable $e) {
            // RN-08: não deixa publicação incompleta nem arquivo órfão
            if ($caminho) {
                Storage::disk('public')->delete($caminho);
            }
            Log::error('Falha ao publicar postagem: ' . $e->getMessage());

            return response()->json([
                'sucesso' => false,
                'mensagem' => 'Não foi possível realizar a publicação. Tente novamente.',
            ], 500);
        }

        $post->load(['usuario:id,nome,nome_usuario', 'opcoes:id,post_id,texto,votos']);

        return response()->json([
            'sucesso' => true,
            'mensagem' => 'Publicação realizada com sucesso!',
            'post' => $this->formatar($post),
        ], 201);
    }

    private function formatar(Post $post): array
    {
        return [
            'id' => $post->id,
            'tipo' => $post->tipo,
            'conteudo' => $post->conteudo,
            'midia_url' => $post->midia_path ? '/storage/' . $post->midia_path : null,
            'opcoes' => $post->opcoes->map(fn ($o) => [
                'id' => $o->id,
                'texto' => $o->texto,
                'votos' => $o->votos,
            ])->values(),
            'usuario' => [
                'nome' => $post->usuario->nome,
                'nome_usuario' => $post->usuario->nome_usuario,
            ],
            'criado_em' => $post->created_at->toIso8601String(),
        ];
    }
}