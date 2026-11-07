<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mensagem extends Model
{
    use SoftDeletes;

    protected $table = 'mensagens';

    protected $fillable = [
        'conversa_id',
        'user_id',
        'client_id',
        'texto',
        'editada',
    ];

    protected $casts = [
        'editada' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    public function conversa(): BelongsTo
    {
        return $this->belongsTo(Conversa::class);
    }

    public function autor(): BelongsTo
    {
        return $this->belongsTo(Usuario::class, 'user_id');
    }

    public function leituras(): HasMany
    {
        return $this->hasMany(MensagemLeitura::class, 'mensagem_id');
    }

    public function paraApi(?Usuario $usuario = null, bool $leituraOk = true): array
    {
        $souEu = $usuario ? (int) $usuario->id === (int) $this->user_id : false;
        $jaLida = $souEu;

        if ($usuario && ! $souEu) {
            $jaLida = $this->leituras->contains(fn ($leitura) => (int) $leitura->user_id === (int) $usuario->id);
        }

        if ($jaLida === false && $leituraOk && $usuario && ! $souEu) {
            $jaLida = true;
        }

        return [
            'id' => $this->id,
            'conversa_id' => $this->conversa_id,
            'user_id' => $this->user_id,
            'client_id' => $this->client_id,
            'texto' => $this->texto,
            'editada' => (bool) $this->editada,
            'enviadaPorMim' => $souEu,
            'lida' => $jaLida,
            'autor' => $this->autor ? [
                'id' => $this->autor->id,
                'nome_usuario' => $this->autor->nome_usuario,
            ] : null,
            'hora' => $this->created_at?->format('H:i'),
            'created_at' => $this->created_at?->toISOString(),
        ];
    }
}