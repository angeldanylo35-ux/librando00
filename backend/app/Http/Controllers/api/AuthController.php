<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\VerificacaoCadastro;
use App\Models\CadastroPendente;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'senha' => 'required|string',
        ], [
            'required' => 'Preencha todos os campos.',
            'email' => 'E-mail ou senha inválidos.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'sucesso' => false,
                'mensagem' => $validator->errors()->first(),
            ], 400);
        }

        $usuario = Usuario::where('email', $request->email)->first();

        if (! $usuario || ! Hash::check($request->senha, $usuario->senha)) {
            return response()->json([
                'sucesso' => false,
                'mensagem' => 'E-mail ou senha inválidos.',
            ], 401);
        }

        return response()->json([
            'sucesso' => true,
            'mensagem' => 'Login efetuado com sucesso!',
            'nome' => $usuario->nome,
        ], 200);
    }

    public function cadastro(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required|string|max:100',
            'email' => 'required|email|max:150|unique:usuarios,email',
            'data_nascimento' => 'required|date',
            'nome_usuario' => 'required|string|max:50|unique:usuarios,nome_usuario',
            'senha' => 'required|string|min:6',
            'confirmar_senha' => 'required|same:senha',
        ], [
            'required' => 'Preencha todos os campos.',
            'email.email' => 'Informe um e-mail válido.',
            'email.unique' => 'Este e-mail já está cadastrado.',
            'nome_usuario.unique' => 'Este nome de usuário já está em uso.',
            'senha.min' => 'A senha precisa ter ao menos 6 caracteres.',
            'confirmar_senha.same' => 'As senhas não coincidem.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'sucesso' => false,
                'mensagem' => $validator->errors()->first(),
            ], 400);
        }

       
        CadastroPendente::where('email', $request->email)->delete();

        // Gera um token aleatório para confirmar o e-mail
        $token = Str::random(64);

        // Cria o cadastro pendente
        CadastroPendente::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'data_nascimento' => $request->data_nascimento,
            'nome_usuario' => $request->nome_usuario,

            'senha' => Hash::make($request->senha),

            // Guardamos o hash do token, não o token original
            'token' => hash('sha256', $token),

            // O token expira em 5 minutos
            'expira_em' => now()->addMinutes(5),
        ]);

        // Link que será enviado para o e-mail
        $link = 'http://localhost:5173/verificar-email?token=' . $token;

        // Envia o e-mail
        Mail::to($request->email)->send(
            new VerificacaoCadastro($link)
        );

        return response()->json([
            'sucesso' => true,
            'mensagem' => 'Um link de confirmação foi enviado para seu e-mail. O link é válido por 5 minutos.',
        ], 201);
    }

    public function verificarEmail(Request $request)
    {
        // Verifica se o token foi enviado
        if (!$request->token) {
            return response()->json([
                'sucesso' => false,
                'mensagem' => 'Token de verificação não informado.',
            ], 400);
        }

        // Procura o cadastro usando o hash do token
        $cadastro = CadastroPendente::where(
            'token',
            hash('sha256', $request->token)
        )
        ->where('expira_em', '>', now())
        ->first();

        // Token inexistente ou expirado
        if (!$cadastro) {
            return response()->json([
                'sucesso' => false,
                'mensagem' => 'O link de verificação é inválido ou expirou.',
            ], 400);
        }

        // Cria o usuário somente depois da confirmação do e-mail
        $usuario = Usuario::create([
            'nome' => $cadastro->nome,
            'email' => $cadastro->email,
            'data_nascimento' => $cadastro->data_nascimento,
            'nome_usuario' => $cadastro->nome_usuario,
            'senha' => $cadastro->senha,
        ]);

        // Remove o cadastro pendente
        $cadastro->delete();

        return response()->json([
            'sucesso' => true,
            'mensagem' => 'E-mail confirmado! Cadastro realizado com sucesso.',
            'nome' => $usuario->nome,
        ], 200);
    }
}