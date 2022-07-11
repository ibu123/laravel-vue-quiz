<template>
<main class="app">
    <h1>Select Topic</h1>
    <section class="quiz">
        <div class="options" >
            <label v-for="(topic, index) in topics"
                :key = "index"
                class="option topic"
            >
                <router-link :to="{ name : 'view-quiz', params: {topic : topic.title}}">{{ topic.title }}</router-link>
            </label>
        </div>
    </section>
</main>
</template>

<script setup>
import { inject, onMounted, ref } from 'vue';
const axios = inject('axios');
const topics = ref(null)

onMounted(() => {
    axios.get('topic')
    .then(response => {
        topics.value = response.data.topics;
    })
});
</script>
<style>
    .option.topic a{
        text-decoration: none;
        color:#fff;
        font-size: 25px;
    }
</style>
