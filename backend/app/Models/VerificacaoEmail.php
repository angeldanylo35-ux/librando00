<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VerificacaoEmail extends Model
{
    protected $table = 'verificacoes_email';

    protected $fillable = [
        'email',
        'token',
        'expira_em',
    ];

    protected $casts = [
        'expira_em' => 'datetime',
    ];
}