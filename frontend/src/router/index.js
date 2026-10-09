import { createRouter, createWebHistory } from 'vue-router';
import Login from '../paginas/login.vue';
import Cadastro from '../paginas/cadastro.vue';
import VerificarEmail from '../paginas/verificar-email.vue';
import EsqueciSenha from '../paginas/esqueci-senha.vue';
import RedefinirSenha from '../paginas/redefinir-senha.vue';
import Feed from '../paginas/Feed.vue';

const routes = [
  {
    path: '/',
    redirect: '/login', // Redireciona a página inicial para o login
  },
  {
    path: '/login',
    name: 'login',
    component: Login,
  },
  {
    path: '/cadastro',
    name: 'cadastro',
    component: Cadastro,
  },
  {
    path: '/verificar-email',
    name: 'verificar-email',
    component: VerificarEmail,
  },
  {
    path: '/esqueci-senha',
    name: 'esqueci-senha',
    component: EsqueciSenha,
  },
  {
    path: '/redefinir-senha',
    name: 'redefinir-senha',
    component: RedefinirSenha,
  },
  {
    path: '/feed',
    name: 'feed',
    component: Feed,
  },
  // adicione as próximas telas aqui, ex:
  // { path: '/home', name: 'home', component: Home },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;