<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('recuperacao_senhas', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('token', 64)->unique();
            $table->timestamp('expira_em');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('recuperacao_senhas');
    }
};