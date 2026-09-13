<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cadastros_pendentes', function (Blueprint $table) {
            $table->id();

            $table->string('nome');
            $table->string('email');
            $table->date('data_nascimento');
            $table->string('nome_usuario');
            $table->string('senha');

            $table->string('token', 64)->unique();
            $table->timestamp('expira_em');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cadastros_pendentes');
    }
};