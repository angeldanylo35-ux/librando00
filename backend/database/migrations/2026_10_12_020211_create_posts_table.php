<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('posts', function (Blueprint $table) {
        $table->id();
        $table->foreignId('usuario_id')->constrained('usuarios')->cascadeOnDelete();
        $table->string('tipo', 20); // texto, imagem, gif, video, enquete
        $table->text('conteudo')->nullable();
        $table->string('midia_path')->nullable();
        $table->string('midia_mime', 100)->nullable();
        $table->timestamps();
    });
}

public function down(): void
{
    Schema::dropIfExists('posts');
}
};
