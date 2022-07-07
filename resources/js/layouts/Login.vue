<template>
	<form @submit.prevent="login(email, password)">
		<label>
			Email:
			<input type="email" v-model="email">
		</label>
		<label>
			Password:
			<input type="password" v-model="password">
		</label>
		<button type="submit">Login</button>
	</form>
</template>

<script setup>
import { ref } from 'vue'
import { login } from "../composables/auth";

const email = ref('')
const password = ref('')
</script>

<style scoped>

</style>
