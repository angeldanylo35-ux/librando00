<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CadastroPendente extends Model
{
    protected $table = 'cadastros_pendentes';

    protected $fillable = [
        'nome',
        'email',
        'data_nascimento',
        'nome_usuario',
        'senha',
        'token',
        'expira_em',
    ];

    protected $hidden = [
        'senha',
        'token',
    ];

    protected $casts = [
        'data_nascimento' => 'date',
        'expira_em' => 'datetime',
    ];
}