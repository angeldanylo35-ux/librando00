<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('password_reset_codes', function (Blueprint $table) {
            $table->id();
            $table->string('email')->index();

            // Nunca guardamos o código em texto puro — só o hash,
            // igual o Laravel faz com o token de reset por link.
            $table->string('code_hash');

            // Quantas tentativas erradas de código já foram feitas.
            // Serve para bloquear brute-force do código de 6 dígitos.
            $table->unsignedTinyInteger('attempts')->default(0);

            $table->timestamp('expires_at');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('password_reset_codes');
    }
};