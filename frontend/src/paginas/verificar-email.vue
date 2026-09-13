<template>
  <div class="verificacao">
    <div class="card">
      <h1>{{ titulo }}</h1>

      <p>{{ mensagem }}</p>

      <button v-if="sucesso" @click="irParaLogin">
        Ir para o login
      </button>

      <button v-else @click="irParaCadastro">
        Voltar para o cadastro
      </button>
    </div>
  </div>
</template>

<script setup>
import { onMounted, ref } from 'vue';
import { useRouter, useRoute } from 'vue-router';
import api from '../services/api';

const router = useRouter();
const route = useRoute();

const titulo = ref('Verificando e-mail...');
const mensagem = ref('Aguarde enquanto confirmamos seu cadastro.');
const sucesso = ref(false);

onMounted(async () => {
  const token = route.query.token;

  if (!token) {
    titulo.value = 'Link inválido';
    mensagem.value = 'O link de verificação não possui um token.';
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
  } catch (error) {
    titulo.value = 'Não foi possível confirmar';
    mensagem.value =
      error.response?.data?.mensagem ||
      'O link é inválido ou expirou.';
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
.verificacao {
  min-height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 20px;
}

.card {
  width: 100%;
  max-width: 500px;
  padding: 40px;
  text-align: center;
  border-radius: 16px;
  background: white;
  box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
}

h1 {
  margin-bottom: 15px;
}

p {
  margin-bottom: 25px;
}

button {
  padding: 12px 24px;
  border: none;
  border-radius: 8px;
  cursor: pointer;
}
</style>