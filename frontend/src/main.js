import { createApp } from 'vue';
import App from './App.vue'; // App.vue está direto em src/
import router from './router';
import './style.css';
import './assets/estetico.css';

createApp(App)
  .use(router)
  .mount('#app');