<template>
    <div class="col-md-12 d-flex justify-content-center h-100 align-items-center" id="yes">
            <GoogleLogin :params="params" ></GoogleLogin>

    </div>
</template>

<script setup>
import GoogleLogin from '../google-login/GoogleLogin.vue';
import { inject } from 'vue';
import {useToast} from 'vue-toast-notification';
const props = defineProps(['clientId']);
const axios = inject('axios')
const toast = useToast();
const onSuccess = (result) => {
    axios
    .post('login', result )
    .then(response => {
        response = response.data;
        toast.success('Loging Success');
        if (response.success) {
            window.location.href = response.redirect_url
        }
    })
    .catch(error  => {
        error = error.response.data;
        toast.error(error.message);
    });

}
const params = {
    client_id : props.clientId,
    callback : onSuccess
}

const renderParams = {
                    width: 250,
                    height: 50,
                    longtitle: true
                }

// Button to login
</script>
