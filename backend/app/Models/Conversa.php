<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Conversa extends Model
{
    public function participantes(): BelongsToMany
    {
        return $this->belongsToMany(Usuario::class, 'conversa_usuario', 'conversa_id', 'user_id');
    }

    public function mensagens(): HasMany
    {
        return $this->hasMany(Mensagem::class);
    }

    public function ultimaMensagem(): HasOne
    {
        return $this->hasOne(Mensagem::class)->latestOfMany();
    }
}