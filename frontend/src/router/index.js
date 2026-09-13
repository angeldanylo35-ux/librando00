import { createRouter, createWebHistory } from 'vue-router';
import Login from '../paginas/login.vue';
import Cadastro from '../paginas/cadastro.vue';
import VerificarEmail from '../paginas/verificar-email.vue';

const routes = [
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
  // adicione as próximas telas aqui, ex:
  // { path: '/', name: 'home', component: Home },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;