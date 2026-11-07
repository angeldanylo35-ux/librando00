<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('conversas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });

        Schema::create('conversa_usuario', function (Blueprint $table) {
            $table->id();
            $table->foreignId('conversa_id')->constrained('conversas')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->unique(['conversa_id', 'user_id']);
        });

        Schema::create('mensagens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('conversa_id')->constrained('conversas')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->uuid('client_id')->nullable();
            $table->text('texto');
            $table->boolean('editada')->default(false);
            $table->timestamps();
            $table->softDeletes();
            $table->unique(['conversa_id', 'user_id', 'client_id']);
            $table->index(['conversa_id', 'created_at']);
        });

        Schema::create('mensagem_leituras', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mensagem_id')->constrained('mensagens')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->timestamp('lida_em');
            $table->unique(['mensagem_id', 'user_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mensagem_leituras');
        Schema::dropIfExists('mensagens');
        Schema::dropIfExists('conversa_usuario');
        Schema::dropIfExists('conversas');
    }
};