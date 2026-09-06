<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuarios';

    protected $fillable = [
        'nome',
        'email',
        'data_nascimento',
        'nome_usuario',
        'senha',
    ];

    // nunca expõe a senha em respostas JSON
    protected $hidden = [
        'senha',
    ];

    protected $casts = [
        'data_nascimento' => 'date',
    ];
}