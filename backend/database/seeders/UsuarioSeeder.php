<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuario;

class UsuarioSeeder extends Seeder
{
    public function run(): void
    {
        Usuario::updateOrCreate(
            ['email' => 'admin@librando.com'],
            [
                'nome' => 'Administrador',
                'data_nascimento' => '2000-01-01',
                'nome_usuario' => 'admin',
                'senha' => Hash::make('123456'),
            ]
        );
    }
}