
<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\RecuperacaoSenha;
use App\Mail\VerificacaoCadastro;
use App\Models\CadastroPendente;
use App\Models\RecuperacaoSenha as RecuperacaoSenhaModel;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
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

        $token = $usuario->createToken('librando')->plainTextToken;

        return response()->json([
            'sucesso' => true,
            'mensagem' => 'Login efetuado com sucesso!',
            'nome' => $usuario->nome,
            'nome_usuario' => $usuario->nome_usuario,
            'token' => $token,
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

        $token = Str::random(64);

        CadastroPendente::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'data_nascimento' => $request->data_nascimento,
            'nome_usuario' => $request->nome_usuario,
            'senha' => Hash::make($request->senha),
            'token' => hash('sha256', $token),
            'expira_em' => now()->addMinutes(5),
        ]);

        $link = rtrim(config('services.frontend.url'), '/')
            . '/verificar-email?token=' . $token;

        $email = new VerificacaoCadastro($link);

        $this->enviarEmailBrevo(
            $request->email,
            'Verificação de cadastro - Librando',
            $email->render()
        );

        return response()->json([
            'sucesso' => true,
            'mensagem' => 'Um link de confirmação foi enviado para seu e-mail. O link é válido por 5 minutos.',
        ], 201);
    }

    public function esqueciSenha(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
        ], [
            'required' => 'Informe seu e-mail.',
            'email' => 'Informe um e-mail válido.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'sucesso' => false,
                'mensagem' => $validator->errors()->first(),
            ], 400);
        }

        $usuario = Usuario::where('email', $request->email)->first();

        if (! $usuario) {
            return response()->json([
                'sucesso' => false,
                'mensagem' => 'Não encontramos uma conta com esse e-mail.',
            ], 404);
        }

        RecuperacaoSenhaModel::where('email', $request->email)->delete();

        $token = Str::random(64);

        RecuperacaoSenhaModel::create([
            'email' => $request->email,
            'token' => hash('sha256', $token),
            'expira_em' => now()->addMinutes(5),
        ]);

        $link = rtrim(config('services.frontend.url'), '/')
            . '/redefinir-senha?token=' . $token;

        $email = new RecuperacaoSenha($link);

        $this->enviarEmailBrevo(
            $request->email,
            'Recuperação de senha - Librando',
            $email->render()
        );

        return response()->json([
            'sucesso' => true,
            'mensagem' => 'Um link para redefinir sua senha foi enviado para seu e-mail.',
        ], 200);
    }

    public function redefinirSenha(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'token' => 'required|string',
            'senha' => 'required|string|min:6',
            'confirmar_senha' => 'required|same:senha',
        ], [
            'required' => 'Preencha todos os campos.',
            'senha.min' => 'A senha precisa ter ao menos 6 caracteres.',
            'confirmar_senha.same' => 'As senhas não coincidem.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'sucesso' => false,
                'mensagem' => $validator->errors()->first(),
            ], 400);
        }

        $recuperacao = RecuperacaoSenhaModel::where(
            'token',
            hash('sha256', $request->token)
        )
            ->where('expira_em', '>', now())
            ->first();

        if (! $recuperacao) {
            return response()->json([
                'sucesso' => false,
                'mensagem' => 'O link de recuperação é inválido ou expirou.',
            ], 400);
        }

        $usuario = Usuario::where('email', $recuperacao->email)->first();

        if (! $usuario) {
            return response()->json([
                'sucesso' => false,
                'mensagem' => 'Usuário não encontrado.',
            ], 404);
        }

        $usuario->update([
            'senha' => Hash::make($request->senha),
        ]);

        $recuperacao->delete();

        return response()->json([
            'sucesso' => true,
            'mensagem' => 'Senha alterada com sucesso!',
        ], 200);
    }

    public function verificarEmail(Request $request)
    {
        if (! $request->token) {
            return response()->json([
                'sucesso' => false,
                'mensagem' => 'Token de verificação não informado.',
            ], 400);
        }

        $cadastro = CadastroPendente::where(
            'token',
            hash('sha256', $request->token)
        )
            ->where('expira_em', '>', now())
            ->first();

        if (! $cadastro) {
            return response()->json([
                'sucesso' => false,
                'mensagem' => 'O link de verificação é inválido ou expirou.',
            ], 400);
        }

        $usuario = Usuario::create([
            'nome' => $cadastro->nome,
            'email' => $cadastro->email,
            'data_nascimento' => $cadastro->data_nascimento,
            'nome_usuario' => $cadastro->nome_usuario,
            'senha' => $cadastro->senha,
        ]);

        $cadastro->delete();

        return response()->json([
            'sucesso' => true,
            'mensagem' => 'E-mail confirmado! Cadastro realizado com sucesso.',
            'nome' => $usuario->nome,
        ], 200);
    }

    private function enviarEmailBrevo(
        string $destinatario,
        string $assunto,
        string $html
    ): void {
        $resposta = Http::withHeaders([
            'api-key' => config('services.brevo.key'),
            'accept' => 'application/json',
        ])->post('https://api.brevo.com/v3/smtp/email', [
            'sender' => [
                'name' => config('mail.from.name'),
                'email' => config('mail.from.address'),
            ],
            'to' => [
                ['email' => $destinatario],
            ],
            'subject' => $assunto,
            'htmlContent' => $html,
        ]);

        $resposta->throw();
    }
}
