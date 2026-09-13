<template>
  <div class="page">
    <section class="hero">
      <div class="hero__brand">
        <span class="hero__logo" aria-hidden="true">🤟</span>
        <span class="hero__brand-name">Librando</span>
      </div>

      <h1 class="hero__title">
        Recupere sua
        <span class="hero__title--accent">conta.</span>
      </h1>

      <p class="hero__subtitle">
        Crie uma nova senha para voltar a acessar sua conta no Librando.
      </p>
    </section>

    <section class="auth">
      <div class="auth__card">
        <h2 class="auth__title">Nova senha</h2>

        <p class="auth__subtitle">
          Digite sua nova senha abaixo.
        </p>

        <form class="form" novalidate @submit.prevent="handleRedefinirSenha">

          <div class="field">
            <label for="senha">Nova senha</label>

            <div class="input-wrap">
              <input
                id="senha"
                v-model="senha"
                :type="mostrarSenha ? 'text' : 'password'"
                placeholder="Digite sua nova senha"
                autocomplete="new-password"
                required
              />

              <button
                type="button"
                class="password-toggle"
                @click="mostrarSenha = !mostrarSenha"
                :aria-label="mostrarSenha ? 'Ocultar senha' : 'Mostrar senha'"
              >
                {{ mostrarSenha ? '🙈' : '👁️' }}
              </button>
            </div>
          </div>

          <div class="field">
            <label for="confirmarSenha">Confirmar nova senha</label>

            <div class="input-wrap">
              <input
                id="confirmarSenha"
                v-model="confirmarSenha"
                :type="mostrarConfirmacao ? 'text' : 'password'"
                placeholder="Digite a senha novamente"
                autocomplete="new-password"
                required
              />

              <button
                type="button"
                class="password-toggle"
                @click="mostrarConfirmacao = !mostrarConfirmacao"
                :aria-label="
                  mostrarConfirmacao
                    ? 'Ocultar confirmação'
                    : 'Mostrar confirmação'
                "
              >
                {{ mostrarConfirmacao ? '🙈' : '👁️' }}
              </button>
            </div>
          </div>

          <div
            v-if="mensagem"
            :class="[
              'login-mensagem',
              sucesso
                ? 'login-mensagem--sucesso'
                : 'login-mensagem--erro'
            ]"
          >
            {{ mensagem }}
          </div>

          <button
            type="submit"
            class="btn btn--primary"
            :disabled="carregando"
          >
            {{ carregando ? 'Alterando...' : 'Alterar senha' }}
          </button>

          <p class="auth__footer-text">
            Lembrou da senha?
            <router-link to="/login" class="link link--strong">
              Entrar
            </router-link>
          </p>

        </form>
      </div>
    </section>
  </div>
</template>

<script setup>
import { ref } from 'vue';
import { useRouter, useRoute } from 'vue-router';
import api from '../services/api';

const router = useRouter();
const route = useRoute();

const senha = ref('');
const confirmarSenha = ref('');

const mostrarSenha = ref(false);
const mostrarConfirmacao = ref(false);

const carregando = ref(false);
const mensagem = ref('');
const sucesso = ref(false);

async function handleRedefinirSenha() {
  mensagem.value = '';
  sucesso.value = false;

  const token = route.query.token;

  if (!token) {
    mensagem.value = 'Link de recuperação inválido.';
    return;
  }

  if (senha.value !== confirmarSenha.value) {
    mensagem.value = 'As senhas não coincidem.';
    return;
  }

  carregando.value = true;

  try {
    const { data } = await api.post('/redefinir-senha', {
      token: token,
      senha: senha.value,
      confirmar_senha: confirmarSenha.value,
    });

    sucesso.value = data.sucesso;
    mensagem.value = data.mensagem;

    if (data.sucesso) {
      setTimeout(() => {
        router.push('/login');
      }, 2000);
    }

  } catch (erro) {
    mensagem.value =
      erro.response?.data?.mensagem ??
      'Não foi possível alterar sua senha.';
  } finally {
    carregando.value = false;
  }
}
</script>