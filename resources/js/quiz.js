require('./bootstrap');

import { createApp } from 'vue';

import axios from 'axios'
import VueAxios from 'vue-axios'
import { createRouter, createWebHistory} from 'vue-router';
import Topic from './quiz//Topic.vue';
import Question from './quiz//Question.vue';
import Quiz from './quiz/Quiz.vue';

const routes = [
  { path: '/quiz', component: Topic },
  { path: '/quiz/:topic', component: Question , name: 'view-quiz'},
]
const router = createRouter({
  history: createWebHistory("/laravel-vue-quiz/"),
  routes
})


const app = createApp(Quiz);
app.use(router);
app.use(VueAxios, axios);
app.provide('axios', app.config.globalProperties.axios) // provide 'axios'
app.mount('#app');
