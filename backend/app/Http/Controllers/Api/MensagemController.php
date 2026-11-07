<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Mensagem;
use Illuminate\Http\Request;

class MensagemController extends Controller
{
    public function store(Request $request, int $conversa)
    {
        $usuario = $request->user();
        $conversaAutorizada = $usuario->conversas()->findOrFail($conversa);

        $dados = $request->validate([
            'texto' => ['required', 'string', 'max:5000'],
            'client_id' => ['nullable', 'uuid'],
        ]);

        $mensagem = $conversaAutorizada->mensagens()->create([
            'user_id' => $usuario->id,
            'texto' => $dados['texto'],
            'client_id' => $dados['client_id'] ?? null,
        ]);

        return response()->json(
            $mensagem->load(['autor:id,nome_usuario', 'leituras'])->paraApi($usuario),
            201
        );
    }

    public function update(Request $request, int $mensagem)
    {
        $usuario = $request->user();
        $mensagem = Mensagem::query()
            ->where('user_id', $usuario->id)
            ->findOrFail($mensagem);

        $dados = $request->validate([
            'texto' => ['required', 'string', 'max:5000'],
        ]);

        $mensagem->update([
            'texto' => $dados['texto'],
            'editada' => true,
        ]);

        return response()->json(
            $mensagem->fresh()->load(['autor:id,nome_usuario', 'leituras'])->paraApi($usuario)
        );
    }

    public function destroy(Request $request, int $mensagem)
    {
        Mensagem::query()
            ->where('user_id', $request->user()->id)
            ->findOrFail($mensagem)
            ->delete();

        return response()->json(['sucesso' => true]);
    }
}
