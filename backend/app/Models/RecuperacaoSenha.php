<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RecuperacaoSenha extends Model
{
    protected $table = 'recuperacao_senhas';

    protected $fillable = [
        'email',
        'token',
        'expira_em',
    ];

    protected $hidden = [
        'token',
    ];

    protected $casts = [
        'expira_em' => 'datetime',
    ];
}