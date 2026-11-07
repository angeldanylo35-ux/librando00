<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Mensagem;
use Illuminate\Http\Request;

class MensagemController extends Controller
{
    // POST /api/conversas/{conversa}/mensagens  { texto, client_id }
    public function store(Request $request, int $conversa)
    {
        $user = $request->user();
        $conversa = $user->conversas()->findOrFail($conversa);

        $data = $request->validate([
            'texto' => ['required', 'string', 'max:2000'], // TrimStrings barra só-espaços
            'client_id' => ['required', 'uuid'],
        ]);

        // Reenvio com o mesmo client_id devolve a mensagem existente, sem duplicar (FA-05)
        $m = $conversa->mensagens()->firstOrCreate(
            ['user_id' => $user->id, 'client_id' => $data['client_id']],
            ['texto' => $data['texto']]
        );
        $m->load(['autor:id,nome_usuario', 'leituras']);

        return response()->json($m->paraApi($user), $m->wasRecentlyCreated ? 201 : 200);
    }

    // PUT /api/mensagens/{mensagem}  { texto }
    public function update(Request $request, int $mensagem)
    {
        $user = $request->user();
        $m = $this->daConversaDoUsuario($user, $mensagem);

        abort_unless($m->user_id === $user->id, 403, 'Você só pode alterar suas próprias mensagens.');

        $data = $request->validate([
            'texto' => ['required', 'string', 'max:2000'],
        ]);

        $m->update(['texto' => $data['texto'], 'editada' => true]);
        $m->load(['autor:id,nome_usuario', 'leituras']);

        return $m->paraApi($user);
    }

    // DELETE /api/mensagens/{mensagem}
    public function destroy(Request $request, int $mensagem)
    {
        $user = $request->user();
        $m = $this->daConversaDoUsuario($user, $mensagem);

        abort_unless($m->user_id === $user->id, 403, 'Você só pode excluir suas próprias mensagens.');

        $m->delete(); // soft delete: some para todos os participantes (RN-15)

        return response()->noContent();
    }

    private function daConversaDoUsuario($user, int $id): Mensagem
    {
        return Mensagem::whereHas('conversa.participantes', fn ($q) => $q->where('users.id', $user->id))
            ->findOrFail($id);
    }
}