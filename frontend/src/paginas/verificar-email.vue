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

      <!-- Ilustração -->
      <div class="hero__illustration" aria-hidden="true">
        <svg
          viewBox="0 0 400 380"
          class="hero__svg"
          xmlns="http://www.w3.org/2000/svg"
        >
          <defs>
            <linearGradient
              id="bubbleGrad"
              x1="0"
              y1="0"
              x2="1"
              y2="1"
            >
              <stop offset="0%" stop-color="#EEF0FF" />
              <stop offset="100%" stop-color="#DDE3FF" />
            </linearGradient>
          </defs>

          <g
            stroke="#C9CFF7"
            stroke-width="1.5"
            fill="none"
            opacity="0.9"
          >
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

          <g>
            <circle
              cx="95"
              cy="90"
              r="46"
              fill="url(#bubbleGrad)"
            />
            <text
              x="95"
              y="105"
              font-size="40"
              text-anchor="middle"
            >
              🧏‍♀️
            </text>
          </g>

          <g>
            <circle
              cx="200"
              cy="70"
              r="40"
              fill="url(#bubbleGrad)"
            />
            <text
              x="200"
              y="84"
              font-size="34"
              text-anchor="middle"
            >
              🧑‍🦱
            </text>
          </g>

          <g>
            <circle
              cx="305"
              cy="100"
              r="46"
              fill="url(#bubbleGrad)"
            />
            <text
              x="305"
              y="115"
              font-size="40"
              text-anchor="middle"
            >
              👩🏾‍🦱
            </text>
          </g>

          <g>
            <circle
              cx="100"
              cy="195"
              r="44"
              fill="url(#bubbleGrad)"
            />
            <text
              x="100"
              y="209"
              font-size="38"
              text-anchor="middle"
            >
              👨‍🦲
            </text>
          </g>

          <g>
            <circle
              cx="200"
              cy="190"
              r="36"
              fill="url(#bubbleGrad)"
            />
            <text
              x="200"
              y="203"
              font-size="30"
              text-anchor="middle"
            >
              👩
            </text>
          </g>

          <g>
            <circle
              cx="300"
              cy="195"
              r="44"
              fill="url(#bubbleGrad)"
            />
            <text
              x="300"
              y="209"
              font-size="38"
              text-anchor="middle"
            >
              🧓
            </text>
          </g>

          <g>
            <circle
              cx="95"
              cy="300"
              r="44"
              fill="url(#bubbleGrad)"
            />
            <text
              x="95"
              y="314"
              font-size="38"
              text-anchor="middle"
            >
              🧕
            </text>
          </g>

          <g>
            <circle
              cx="200"
              cy="320"
              r="40"
              fill="url(#bubbleGrad)"
            />
            <text
              x="200"
              y="334"
              font-size="34"
              text-anchor="middle"
            >
              👦🏽
            </text>
          </g>

          <g>
            <circle
              cx="305"
              cy="300"
              r="44"
              fill="url(#bubbleGrad)"
            />
            <text
              x="305"
              y="314"
              font-size="38"
              text-anchor="middle"
            >
              🧑🏿
            </text>
          </g>
        </svg>
      </div>
    </section>

    <!-- ===================== LADO DIREITO ===================== -->
    <section class="auth">

      <div class="auth__card">

        <!-- Ícone de status -->
        <div
          class="status-icon"
          :class="{ 'status-icon--error': !sucesso && !verificando }"
          aria-hidden="true"
        >
          <svg
            v-if="sucesso"
            width="34"
            height="34"
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="2.5"
            stroke-linecap="round"
            stroke-linejoin="round"
          >
            <path d="M20 6L9 17l-5-5" />
          </svg>

          <svg
            v-else-if="!verificando"
            width="34"
            height="34"
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="2"
            stroke-linecap="round"
          >
            <circle cx="12" cy="12" r="9" />
            <path d="M12 8v5" />
            <path d="M12 16h.01" />
          </svg>

          <svg
            v-else
            class="spinner"
            width="34"
            height="34"
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="2"
          >
            <circle
              cx="12"
              cy="12"
              r="9"
              stroke-opacity="0.25"
            />
            <path d="M21 12a9 9 0 0 1-9 9" />
          </svg>
        </div>

        <h2 class="auth__title">
          {{ titulo }}
        </h2>

        <p class="auth__subtitle">
          {{ mensagem }}
        </p>

        <!-- Mensagem complementar quando confirmou -->
        <p v-if="sucesso" class="confirmation-text">
          Sua conta está pronta. Agora você já pode acessar o Librando
          utilizando seu e-mail e senha.
        </p>

        <button
          v-if="sucesso"
          type="button"
          class="btn btn--primary"
          @click="irParaLogin"
        >
          Ir para o login
        </button>

        <button
          v-else-if="!verificando"
          type="button"
          class="btn btn--primary"
          @click="irParaCadastro"
        >
          Voltar para o cadastro
        </button>

        <p v-if="sucesso" class="auth__footer-text">
          Já confirmou seu e-mail?
          <router-link to="/login" class="link link--strong">
            Entrar na conta
          </router-link>
        </p>

      </div>

    </section>
  </div>
</template>

<script setup>
import { onMounted, ref } from 'vue';
import { useRouter, useRoute } from 'vue-router';
import api from '../services/api';
import '../assets/estetico.css';

const router = useRouter();
const route = useRoute();

const titulo = ref('Verificando e-mail...');
const mensagem = ref(
  'Aguarde enquanto confirmamos seu cadastro.'
);

const sucesso = ref(false);
const verificando = ref(true);

onMounted(async () => {
  const token = route.query.token;

  if (!token) {
    titulo.value = 'Link inválido';
    mensagem.value =
      'O link de verificação não possui um token.';
    sucesso.value = false;
    verificando.value = false;
    return;
  }

  try {
    const { data } = await api.get('/verificar-email', {
      params: {
        token: token,
      },
    });

    titulo.value = 'E-mail confirmado!';
    mensagem.value = data.mensagem;
    sucesso.value = true;
    verificando.value = false;
  } catch (error) {
    titulo.value = 'Não foi possível confirmar';
    mensagem.value =
      error.response?.data?.mensagem ||
      'O link é inválido ou expirou.';
    sucesso.value = false;
    verificando.value = false;
  }
});

function irParaLogin() {
  router.push('/login');
}

function irParaCadastro() {
  router.push('/cadastro');
}
</script>

<style scoped>
/* =========================
   CARD DE CONFIRMAÇÃO
   ========================= */

.auth__card {
  text-align: center;
}

/* =========================
   ÍCONE DE STATUS
   ========================= */

.status-icon {
  width: 72px;
  height: 72px;
  margin: 0 auto 24px;

  display: flex;
  align-items: center;
  justify-content: center;

  border-radius: 50%;

  color: #4f46e5;
  background: #eef0ff;
}

.status-icon--error {
  color: #dc2626;
  background: #fef2f2;
}

/* =========================
   TEXTO
   ========================= */

.confirmation-text {
  margin: -4px auto 28px;

  max-width: 400px;

  font-size: 14px;
  line-height: 1.6;
  color: #6b7280;
}

/* =========================
   BOTÃO
   ========================= */

.btn {
  width: 100%;
  min-height: 48px;

  border: none;
  border-radius: 10px;

  font-size: 15px;
  font-weight: 600;

  cursor: pointer;

  transition:
    transform 0.15s ease,
    box-shadow 0.15s ease;
}

.btn--primary {
  color: white;
  background: #4f46e5;
  box-shadow: 0 4px 12px rgba(79, 70, 229, 0.18);
}

.btn--primary:hover {
  transform: translateY(-1px);
  box-shadow: 0 6px 16px rgba(79, 70, 229, 0.25);
}

/* =========================
   ANIMAÇÃO
   ========================= */

.spinner {
  animation: girar 0.9s linear infinite;
}

@keyframes girar {
  to {
    transform: rotate(360deg);
  }
}

/* =========================
   RESPONSIVIDADE
   ========================= */

@media (max-width: 980px) {
  .auth__card {
    width: 100%;
  }
}

@media (max-width: 600px) {
  .status-icon {
    width: 64px;
    height: 64px;
    margin-bottom: 20px;
  }

  .confirmation-text {
    font-size: 13px;
  }
}
</style>
