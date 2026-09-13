<template>
  <div class="page">

    <!-- Lado esquerdo -->
    <section class="hero">

      <div class="hero__brand">
        <span class="hero__logo" aria-hidden="true">🤟</span>
        <span class="hero__brand-name">Librando</span>
      </div>

      <h1 class="hero__title">
        Recupere sua
        <span class="hero__title--accent">
          conta<br />Librando.
        </span>
      </h1>

      <p class="hero__subtitle">
        Não se preocupe. Informe seu e-mail e enviaremos um
        link para você criar uma nova senha.
      </p>

    </section>

    <!-- Lado direito -->
    <section class="auth">

      <div class="auth__card">

        <h2 class="auth__title">
          Esqueci minha senha
        </h2>

        <p class="auth__subtitle">
          Digite seu e-mail para receber o link de recuperação.
        </p>

        <form
          class="form"
          novalidate
          @submit.prevent="enviarEmail"
        >

          <div class="field">

            <label for="email">
              E-mail
            </label>

            <div class="input-wrap">

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
            {{ carregando ? 'Enviando...' : 'Enviar link' }}
          </button>

          <p class="auth__footer-text">

            Lembrou sua senha?

            <router-link
              to="/login"
              class="link link--strong"
            >
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
import api from '../services/api';

const email = ref('');
const mensagem = ref('');
const sucesso = ref(false);
const carregando = ref(false);

async function enviarEmail() {

  mensagem.value = '';
  sucesso.value = false;

  carregando.value = true;

  try {

    const { data } = await api.post('/esqueci-senha', {
      email: email.value
    });

    sucesso.value = data.sucesso;
    mensagem.value = data.mensagem;

  } catch (erro) {

    sucesso.value = false;

    mensagem.value =
      erro.response?.data?.mensagem ??
      'Não foi possível conectar ao servidor.';

  } finally {

    carregando.value = false;

  }
}

</script>

<style scoped>

/* =========================
   PÁGINA
========================= */

.page {
  min-height: 100vh;
  display: grid;
  grid-template-columns: 1fr 1fr;
  background: #ffffff;
}


/* =========================
   HERO
========================= */

.hero {
  display: flex;
  flex-direction: column;
  justify-content: center;
  padding: 80px;
  background: #f8f7ff;
}

.hero__brand {
  display: flex;
  align-items: center;
  gap: 10px;
  margin-bottom: 70px;
}

.hero__logo {
  font-size: 34px;
}

.hero__brand-name {
  font-size: 24px;
  font-weight: 700;
  color: #4f46e5;
}

.hero__title {
  margin: 0;
  font-size: 52px;
  line-height: 1.1;
  font-weight: 700;
  color: #171717;
}

.hero__title--accent {
  color: #5b52f0;
}

.hero__subtitle {
  max-width: 500px;
  margin-top: 25px;
  font-size: 17px;
  line-height: 1.6;
  color: #666666;
}


/* =========================
   AUTENTICAÇÃO
========================= */

.auth {
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 40px;
}

.auth__card {
  width: 100%;
  max-width: 470px;
}

.auth__title {
  margin: 0;
  font-size: 32px;
  font-weight: 700;
  color: #171717;
}

.auth__subtitle {
  margin-top: 10px;
  margin-bottom: 35px;
  color: #777777;
  font-size: 15px;
}


/* =========================
   FORMULÁRIO
========================= */

.form {
  display: flex;
  flex-direction: column;
  gap: 20px;
}

.field {
  display: flex;
  flex-direction: column;
  gap: 8px;
}

.field label {
  font-size: 14px;
  font-weight: 600;
  color: #333333;
}

.input-wrap {
  position: relative;
}

.input-wrap input {
  width: 100%;
  box-sizing: border-box;
  padding: 14px 16px;
  border: 1px solid #dddddd;
  border-radius: 10px;
  outline: none;
  font-size: 15px;
  font-family: inherit;
  transition: 0.2s;
}

.input-wrap input:focus {
  border-color: #5b52f0;
  box-shadow: 0 0 0 3px rgba(91, 82, 240, 0.1);
}


/* =========================
   BOTÃO
========================= */

.btn {
  width: 100%;
  padding: 14px;
  border: none;
  border-radius: 10px;
  font-size: 15px;
  font-weight: 600;
  cursor: pointer;
  transition: 0.2s;
}

.btn--primary {
  background: #5b52f0;
  color: white;
}

.btn--primary:hover {
  background: #4f46e5;
}

.btn:disabled {
  opacity: 0.7;
  cursor: not-allowed;
}


/* =========================
   MENSAGENS
========================= */

.login-mensagem {
  padding: 12px 14px;
  border-radius: 8px;
  font-size: 14px;
}

.login-mensagem--sucesso {
  background: #ecfdf3;
  color: #16803c;
}

.login-mensagem--erro {
  background: #fef2f2;
  color: #c62828;
}


/* =========================
   RODAPÉ
========================= */

.auth__footer-text {
  text-align: center;
  margin-top: 5px;
  font-size: 14px;
  color: #666666;
}

.link {
  color: #5b52f0;
  text-decoration: none;
}

.link--strong {
  font-weight: 600;
}

.link:hover {
  text-decoration: underline;
}


/* =========================
   RESPONSIVIDADE
========================= */

@media (max-width: 900px) {

  .page {
    grid-template-columns: 1fr;
  }

  .hero {
    padding: 50px 30px;
  }

  .hero__brand {
    margin-bottom: 40px;
  }

  .hero__title {
    font-size: 42px;
  }

  .auth {
    padding: 40px 30px;
  }

}

@media (max-width: 500px) {

  .hero {
    padding: 35px 20px;
  }

  .hero__title {
    font-size: 36px;
  }

  .auth {
    padding: 30px 20px;
  }

  .auth__title {
    font-size: 28px;
  }

}

</style>