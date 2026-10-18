<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EnqueteOpcao extends Model
{
    protected $table = 'enquete_opcoes';

    protected $fillable = ['post_id', 'texto', 'votos'];
}