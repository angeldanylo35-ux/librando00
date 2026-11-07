<?php

namespace Tests\Feature;

use App\Models\Usuario;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class MensagensTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        foreach (['mensagem_leituras', 'mensagens', 'conversa_usuario', 'conversas', 'usuarios'] as $table) {
            Schema::dropIfExists($table);
        }

        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('email')->unique();
            $table->date('data_nascimento')->nullable();
            $table->string('nome_usuario')->unique();
            $table->string('senha');
            $table->timestamps();
        });

        Schema::create('conversas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });

        Schema::create('conversa_usuario', function (Blueprint $table) {
            $table->foreignId('conversa_id');
            $table->foreignId('user_id');
            $table->primary(['conversa_id', 'user_id']);
        });

        Schema::create('mensagens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('conversa_id');
            $table->foreignId('user_id');
            $table->uuid('client_id')->nullable();
            $table->text('texto');
            $table->boolean('editada')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('mensagem_leituras', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mensagem_id');
            $table->foreignId('user_id');
            $table->timestamp('lida_em');
        });
    }

    public function test_users_can_start_a_conversation_and_exchange_persistent_messages(): void
    {
        $remetente = $this->criarUsuario('Ana', 'ana');
        $destinatario = $this->criarUsuario('João Pedro', 'joaopedro');

        $this->actingAs($remetente, 'sanctum')
            ->getJson('/api/usuarios?busca=%40joao')
            ->assertOk()
            ->assertJsonPath('0.nome_usuario', 'joaopedro');

        $respostaConversa = $this->postJson('/api/conversas', [
            'usuario_id' => $destinatario->id,
        ])->assertCreated();

        $conversaId = $respostaConversa->json('id');

        $this->postJson('/api/conversas', [
            'usuario_id' => $destinatario->id,
        ])->assertOk()->assertJsonPath('id', $conversaId);

        $this->postJson('/api/conversas', [
            'usuario_id' => $remetente->id,
        ])->assertUnprocessable();

        $this->getJson('/api/conversas')
            ->assertOk()
            ->assertJsonPath('0.id', $conversaId)
            ->assertJsonPath('0.usuario', 'joaopedro');

        $this->postJson("/api/conversas/{$conversaId}/mensagens", [
            'texto' => 'Oi, vamos conversar em Libras?',
        ])->assertCreated()
            ->assertJsonPath('texto', 'Oi, vamos conversar em Libras?')
            ->assertJsonPath('enviadaPorMim', true);

        $this->actingAs($destinatario, 'sanctum')
            ->getJson("/api/conversas/{$conversaId}/mensagens")
            ->assertOk()
            ->assertJsonPath('0.texto', 'Oi, vamos conversar em Libras?')
            ->assertJsonPath('0.enviadaPorMim', false);
    }

    private function criarUsuario(string $nome, string $nomeUsuario): Usuario
    {
        return Usuario::create([
            'nome' => $nome,
            'email' => "{$nomeUsuario}@example.test",
            'nome_usuario' => $nomeUsuario,
            'senha' => Hash::make('senha-teste'),
        ]);
    }
}
