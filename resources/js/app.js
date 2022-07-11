require('./bootstrap');

import { createApp } from 'vue';
import 'vue-toast-notification/dist/theme-sugar.css';
import axios from 'axios'
import VueAxios from 'vue-axios'
import App from './quiz/App.vue';

const app = createApp({});
app.use(VueAxios, axios);
app.provide('axios', app.config.globalProperties.axios) // provide 'axios'
app.component('App', App)
app.mount('#app');
