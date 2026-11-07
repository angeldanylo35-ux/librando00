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

    protected $fillable = ['conversa_id', 'user_id', 'client_id', 'texto', 'editada'];

    protected $casts = ['editada' => 'boolean'];

    public function conversa(): BelongsTo
    {
        return $this->belongsTo(Conversa::class);
    }

    public function autor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function leituras(): HasMany
    {
        return $this->hasMany(MensagemLeitura::class);
    }

    /**
     * Formato devolvido ao front.
     * "lida" = null quando o status de leitura está indisponível (RN-10, FA-10).
     */
    public function paraApi(User $user, bool $leituraDisponivel = true): array
    {
        $minha = $this->user_id === $user->id;

        return [
            'id' => $this->id,
            'autor' => $this->autor->nome_usuario,
            'texto' => $this->texto,
            'hora' => $this->created_at->format('H:i'),
            'enviadaPorMim' => $minha,
            'editada' => $this->editada,
            'lida' => $minha && $leituraDisponivel ? $this->leituras->isNotEmpty() : null,
        ];
    }
}