
<template>
	<div ref="button" class="google_login">
	</div>
</template>

<script>

import GoogleAuth from './GoogleAuth';

export default {
	name: 'GoogleLogin',
	props: {
		params: {
			type: Object,
			required: true
		},
		renderParams: {
			type: Object,
			required: false
		}
	},

	mounted() {
		GoogleAuth.load(this.params).then((result) => {
            google.accounts.id.prompt();
            google.accounts.id.renderButton(
                this.$refs.button,
                { theme: 'outline', size: 'large' }
            );
		}).catch(err => {
			console.log(err);
		});
	}
}
</script>

<style>
.google_login{
    height: 100vh !important;
    display: flex;
    align-items: center;
}
</style>
