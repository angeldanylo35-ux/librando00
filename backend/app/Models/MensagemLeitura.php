<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MensagemLeitura extends Model
{
    public $timestamps = false;

    protected $table = 'mensagem_leituras';

    protected $fillable = ['mensagem_id', 'user_id', 'lida_em'];
}