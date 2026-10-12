<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class Usuario extends Authenticatable
{
    use HasApiTokens;

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

    // Como a coluna da senha se chama "senha" (e não "password"),
    // o Laravel precisa saber onde buscá-la
    public function getAuthPassword()
    {
        return $this->senha;
    }

    public function posts()
    {
        return $this->hasMany(Post::class, 'usuario_id');
    }
}