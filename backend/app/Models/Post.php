<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['usuario_id', 'tipo', 'conteudo', 'midia_path', 'midia_mime'];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }

    public function opcoes()
    {
        return $this->hasMany(EnqueteOpcao::class, 'post_id');
    }
}