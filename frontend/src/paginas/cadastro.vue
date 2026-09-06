<template>
  <div class="page">
    <section class="hero">
      <div class="hero__brand">
        <span class="hero__logo" aria-hidden="true">🤟</span>
        <span class="hero__brand-name">Librando</span>
      </div>

      <h1 class="hero__title">
        Faça parte da
        <span class="hero__title--accent">comunidade<br />Librando.</span>
      </h1>

      <p class="hero__subtitle">
        Crie sua conta e comece a contribuir com conteúdo em Libras
        e aprendizado compartilhado.
      </p>
    </section>

    <section class="auth">
      <div class="auth__card">
        <h2 class="auth__title">Criar conta</h2>
        <p class="auth__subtitle">Preencha os dados abaixo para se cadastrar.</p>

        <form class="form" novalidate @submit.prevent="handleCadastro">
          <div class="field">
            <label for="nome">Nome completo</label>
            <div class="input-wrap">
              <input id="nome" v-model="nome" type="text" placeholder="Digite seu nome" required />
            </div>
          </div>

          <div class="field">
            <label for="email">E-mail</label>
            <div class="input-wrap">
              <input id="email" v-model="email" type="email" placeholder="Digite seu e-mail" autocomplete="email" required />
            </div>
          </div>

          <div class="field">
            <label for="nomeUsuario">Nome de usuário</label>
            <div class="input-wrap">
              <input id="nomeUsuario" v-model="nomeUsuario" type="text" placeholder="Escolha um nome de usuário" required />
            </div>
          </div>

          <div class="field">
            <label for="dataNascimento">Data de nascimento</label>
            <div class="input-wrap">
              <input id="dataNascimento" v-model="dataNascimento" type="date" required />
            </div>
          </div>

          <div class="field">
            <label for="senha">Senha</label>
            <div class="input-wrap">
              <input
                id="senha"
                v-model="senha"
                :type="mostrarSenha ? 'text' : 'password'"
                placeholder="Crie uma senha"
                autocomplete="new-password"
                minlength="6"
                required
              />
            </div>
            <p class="hint">A senha precisa ter ao menos 6 caracteres.</p>
          </div>

          <div class="field">
            <label for="confirmarSenha">Confirmar senha</label>
            <div class="input-wrap">
              <input
                id="confirmarSenha"
                v-model="confirmarSenha"
                :type="mostrarSenha ? 'text' : 'password'"
                placeholder="Repita a senha"
                autocomplete="new-password"
                minlength="6"
                required
              />
              <label class="toggle-pass">
                <input v-model="mostrarSenha" type="checkbox" class="checkbox-olho" />
                {{ mostrarSenha ? 'Ocultar' : 'Mostrar' }}
              </label>
            </div>
          </div>

          <div
            v-if="mensagem"
            :class="['login-mensagem', sucesso ? 'login-mensagem--sucesso' : 'login-mensagem--erro']"
          >
            {{ mensagem }}
          </div>

          <button type="submit" class="btn btn--primary" :disabled="carregando">
            {{ carregando ? 'Cadastrando...' : 'Cadastrar' }}
          </button>

          <p class="auth__footer-text">
            Já possui uma conta?
            <router-link to="/login" class="link link--strong">Entrar</router-link>
          </p>
        </form>
      </div>
    </section>
  </div>
</template>

<script setup>
import { ref } from 'vue';
import { useRouter } from 'vue-router';
import api from '../services/api';

const router = useRouter();

const nome = ref('');
const email = ref('');
const nomeUsuario = ref('');
const dataNascimento = ref('');
const senha = ref('');
const confirmarSenha = ref('');
const mostrarSenha = ref(false);
const carregando = ref(false);
const mensagem = ref('');
const sucesso = ref(false);

async function handleCadastro() {
  mensagem.value = '';

  // RN-05: confere no cliente antes de gastar uma requisição
  if (senha.value !== confirmarSenha.value) {
    sucesso.value = false;
    mensagem.value = 'As senhas não coincidem.';
    return;
  }

  carregando.value = true;

  try {
    const { data } = await api.post('/cadastro', {
      nome: nome.value,
      email: email.value,
      nome_usuario: nomeUsuario.value,
      data_nascimento: dataNascimento.value,
      senha: senha.value,
      confirmar_senha: confirmarSenha.value,
    });

    sucesso.value = data.sucesso;
    mensagem.value = data.mensagem;

    if (data.sucesso) {
      setTimeout(() => router.push('/login'), 1200); // RN-11: manda pro login
    }
  } catch (erro) {
    sucesso.value = false;
    mensagem.value =
      erro.response?.data?.mensagem ?? 'Não foi possível conectar ao servidor.';
  } finally {
    carregando.value = false;
  }
}
</script>