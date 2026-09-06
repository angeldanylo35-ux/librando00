<template>
  <div class="page">
    <!-- ===================== LADO ESQUERDO ===================== -->
    <section class="hero">
      <div class="hero__brand">
        <span class="hero__logo" aria-hidden="true">🤟</span>
        <span class="hero__brand-name">Librando</span>
      </div>

      <h1 class="hero__title">
        Conectando pessoas,
        <span class="hero__title--accent">
          compartilhando<br />
          conhecimento.
        </span>
      </h1>

      <p class="hero__subtitle">
        Uma plataforma feita com e para a comunidade surda:
        comunicação acessível, conteúdo em Libras e aprendizado compartilhado.
      </p>

      <div class="hero__illustration" aria-hidden="true">
        <svg viewBox="0 0 400 380" class="hero__svg" xmlns="http://www.w3.org/2000/svg">
          <defs>
            <linearGradient id="bubbleGrad" x1="0" y1="0" x2="1" y2="1">
              <stop offset="0%" stop-color="#EEF0FF" />
              <stop offset="100%" stop-color="#DDE3FF" />
            </linearGradient>
          </defs>

          <g stroke="#C9CFF7" stroke-width="1.5" fill="none" opacity="0.9">
            <path d="M95 90 L200 70 L305 100" />
            <path d="M95 90 L100 195 L95 300" />
            <path d="M305 100 L300 195 L305 300" />
            <path d="M100 195 L200 190 L300 195" />
            <path d="M95 300 L200 320 L305 300" />
          </g>

          <circle cx="150" cy="60" r="5" fill="#B8C0F5" />
          <circle cx="60" cy="150" r="4" fill="#C9CFF7" />
          <circle cx="345" cy="150" r="6" fill="#B8C0F5" />
          <circle cx="200" cy="350" r="5" fill="#C9CFF7" />
          <circle cx="60" cy="330" r="4" fill="#B8C0F5" />

          <g><circle cx="95" cy="90" r="46" fill="url(#bubbleGrad)" /><text x="95" y="105" font-size="40" text-anchor="middle">🧏‍♀️</text></g>
          <g><circle cx="200" cy="70" r="40" fill="url(#bubbleGrad)" /><text x="200" y="84" font-size="34" text-anchor="middle">🧑‍🦱</text></g>
          <g><circle cx="305" cy="100" r="46" fill="url(#bubbleGrad)" /><text x="305" y="115" font-size="40" text-anchor="middle">👩🏾‍🦱</text></g>
          <g><circle cx="100" cy="195" r="44" fill="url(#bubbleGrad)" /><text x="100" y="209" font-size="38" text-anchor="middle">👨‍🦲</text></g>
          <g><circle cx="200" cy="190" r="36" fill="url(#bubbleGrad)" /><text x="200" y="203" font-size="30" text-anchor="middle">👩</text></g>
          <g><circle cx="300" cy="195" r="44" fill="url(#bubbleGrad)" /><text x="300" y="209" font-size="38" text-anchor="middle">🧓</text></g>
          <g><circle cx="95" cy="300" r="44" fill="url(#bubbleGrad)" /><text x="95" y="314" font-size="38" text-anchor="middle">🧕</text></g>
          <g><circle cx="200" cy="320" r="40" fill="url(#bubbleGrad)" /><text x="200" y="334" font-size="34" text-anchor="middle">👦🏽</text></g>
          <g><circle cx="305" cy="300" r="44" fill="url(#bubbleGrad)" /><text x="305" y="314" font-size="38" text-anchor="middle">🧑🏿</text></g>
        </svg>
      </div>
    </section>

    <!-- ===================== LADO DIREITO ===================== -->
    <section class="auth">
      <div class="auth__card">
        <h2 class="auth__title">Bem-vindo(a)!</h2>
        <p class="auth__subtitle">Entre na sua conta para continuar.</p>

        <form class="form" novalidate @submit.prevent="handleLogin">
          <div class="field">
            <label for="email">E-mail</label>
            <div class="input-wrap">
              <svg class="input-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M22 6l-10 7L2 6" />
                <path d="M2 6h20v12H2z" />
              </svg>
              <input
                id="email"
                v-model="email"
                type="email"
                placeholder="Digite seu e-mail"
                autocomplete="email"
                required
              />
            </div>
          </div>

          <div class="field">
            <label for="senha">Senha</label>
            <div class="input-wrap toggle-senha">
              <svg class="input-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <rect x="4" y="10" width="16" height="10" rx="2" />
                <path d="M8 10V7a4 4 0 0 1 8 0v3" />
              </svg>
              <input
                id="senha"
                v-model="senha"
                class="campo-senha"
                :type="mostrarSenha ? 'text' : 'password'"
                placeholder="Digite sua senha"
                autocomplete="current-password"
                minlength="6"
                required
              />
              <input
                id="mostrarSenha"
                v-model="mostrarSenha"
                type="checkbox"
                class="checkbox-olho"
              />
              <label for="mostrarSenha" class="toggle-pass" aria-label="Mostrar ou ocultar senha">
                <svg v-if="mostrarSenha" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <path d="M1 12s4-7 11-7 11 7 11 7-4 7-11 7-11-7-11-7z" />
                  <circle cx="12" cy="12" r="3" />
                </svg>
                <svg v-else width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <path d="M17 3.5C15.5 2.5 13.8 2 12 2 5 2 1 9 1 9a20.6 20.6 0 0 0 5 5.6M9.9 4.2A9.6 9.6 0 0 1 12 4c7 0 11 7 11 7a20.6 20.6 0 0 1-4 4.9M14.1 14.1a3 3 0 1 1-4.2-4.2" />
                  <path d="M1 1l22 22" />
                </svg>
              </label>
            </div>
            <p class="hint">A senha precisa ter ao menos 6 caracteres.</p>
          </div>

          <div class="field-inline">
            <router-link to="/esqueci-senha" class="link">Esqueci minha senha</router-link>
          </div>

          <div
            v-if="mensagem"
            id="loginMensagem"
            :class="['login-mensagem', sucesso ? 'login-mensagem--sucesso' : 'login-mensagem--erro']"
          >
            {{ mensagem }}
          </div>

          <button type="submit" class="btn btn--primary" :disabled="carregando">
            {{ carregando ? 'Entrando...' : 'Entrar' }}
          </button>

          <p class="auth__footer-text">
            Não possui uma conta?
            <router-link to="/cadastro" class="link link--strong">Criar uma conta</router-link>
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
import '../assets/estetico.css';

const router = useRouter();

const email = ref('');
const senha = ref('');
const mostrarSenha = ref(false);
const carregando = ref(false);
const mensagem = ref('');
const sucesso = ref(false);

async function handleLogin() {
  mensagem.value = '';
  carregando.value = true;

  try {
    const { data } = await api.post('/login', {
      email: email.value,
      senha: senha.value,
    });

    sucesso.value = data.sucesso;
    mensagem.value = data.mensagem;

    if (data.sucesso) {
      router.push('/');
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