<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Cria só o que ainda não existe na tabela usuarios
        Schema::table('usuarios', function (Blueprint $table) {
            if (!Schema::hasColumn('usuarios', 'bio')) {
                $table->string('bio', 300)->nullable();
            }
            if (!Schema::hasColumn('usuarios', 'localizacao')) {
                $table->string('localizacao', 100)->nullable();
            }
            if (!Schema::hasColumn('usuarios', 'foto_perfil_url')) {
                $table->string('foto_perfil_url', 500)->nullable();
            }
            if (!Schema::hasColumn('usuarios', 'foto_capa_url')) {
                $table->string('foto_capa_url', 500)->nullable();
            }
        });

        // Se as colunas de foto já existiam com tamanho curto, aumenta para caber a URL
        DB::statement('ALTER TABLE usuarios MODIFY foto_perfil_url VARCHAR(500) NULL');
        DB::statement('ALTER TABLE usuarios MODIFY foto_capa_url VARCHAR(500) NULL');
    }

    public function down(): void
    {
        // sem reversão: não apaga dados do perfil
    }
};