<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Conversa;
use App\Models\MensagemLeitura;
use Illuminate\Http\Request;

class ConversaController extends Controller
{
    // GET /api/conversas?busca=
    public function index(Request $request)
    {
        $user = $request->user();
        $busca = trim((string) $request->query('busca', ''));

        return $user->conversas()
            ->with(['participantes:id,name,nome_usuario', 'ultimaMensagem'])
            ->withCount(['mensagens as nao_lidas' => fn ($q) => $q
                ->where('user_id', '!=', $user->id)
                ->whereDoesntHave('leituras', fn ($l) => $l->where('user_id', $user->id))])
            ->when($busca !== '', function ($q) use ($busca, $user) {
                // termo tratado como dado: binding do Eloquent + escape de curingas do LIKE
                $like = '%' . addcslashes($busca, '%_\\') . '%';
                $q->whereHas('participantes', fn ($p) => $p
                    ->where('users.id', '!=', $user->id)
                    ->where(fn ($w) => $w->where('users.name', 'like', $like)
                        ->orWhere('users.nome_usuario', 'like', $like)));
            })
            ->get()
            ->map(function ($c) use ($user) {
                $outro = $c->participantes->firstWhere('id', '!=', $user->id);
                $ultima = $c->ultimaMensagem;

                return [
                    'id' => $c->id,
                    'nome' => $outro?->name,
                    'usuario' => $outro?->nome_usuario,
                    'naoLidas' => $c->nao_lidas,
                    'ultimaMensagem' => $ultima?->texto,
                    'tempo' => $ultima?->created_at->diffForHumans(short: true),
                    'ordem' => ($ultima?->created_at ?? $c->created_at)->timestamp,
                ];
            })
            ->sortByDesc('ordem')
            ->values();
    }

    // POST /api/conversas  { usuario_id }
    public function store(Request $request)
    {
        $user = $request->user();

        $data = $request->validate([
            'usuario_id' => ['required', 'integer', 'exists:users,id', 'not_in:' . $user->id],
        ]);

        $existente = $user->conversas()
            ->whereHas('participantes', fn ($q) => $q->where('users.id', $data['usuario_id']))
            ->first();

        if ($existente) {
            return response()->json(['id' => $existente->id]);
        }

        $conversa = Conversa::create();
        $conversa->participantes()->attach([$user->id, $data['usuario_id']]);

        return response()->json(['id' => $conversa->id], 201);
    }

    // GET /api/conversas/{conversa}/mensagens
    public function mensagens(Request $request, int $conversa)
    {
        $user = $request->user();

        // 404 igual para inexistente e não autorizada (FA-02, RN-14)
        $conversa = $user->conversas()->findOrFail($conversa);

        $leituraOk = true;
        try {
            $agora = now();
            $linhas = $conversa->mensagens()
                ->where('user_id', '!=', $user->id)
                ->whereDoesntHave('leituras', fn ($q) => $q->where('user_id', $user->id))
                ->pluck('id')
                ->map(fn ($id) => ['mensagem_id' => $id, 'user_id' => $user->id, 'lida_em' => $agora])
                ->all();

            if ($linhas) {
                MensagemLeitura::insertOrIgnore($linhas);
            }
        } catch (\Throwable $e) {
            report($e);
            $leituraOk = false; // FA-10: não afirmar leitura sem confirmação
        }

        return $conversa->mensagens()
            ->with(['autor:id,nome_usuario', 'leituras'])
            ->orderBy('created_at')
            ->get()
            ->map(fn ($m) => $m->paraApi($user, $leituraOk));
    }
}