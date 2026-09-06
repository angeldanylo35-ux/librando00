<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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

        $usuario = Usuario::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'data_nascimento' => $request->data_nascimento,
            'nome_usuario' => $request->nome_usuario,
            'senha' => Hash::make($request->senha),
        ]);

        return response()->json([
            'sucesso' => true,
            'mensagem' => 'Cadastro realizado com sucesso!',
            'nome' => $usuario->nome,
        ], 201);
    }
}