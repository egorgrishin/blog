<template>
	<form @submit.prevent="register(name, email, password, password_confirmation)">
		<label>
			Nickname:
			<input type="text" v-model="name">
		</label>
		<label>
			Email:
			<input type="email" v-model="email">
		</label>
		<label>
			Password:
			<input type="password" v-model="password">
		</label>
		<label>
			Confirm password:
			<input type="password" v-model="password_confirmation">
		</label>
		<button type="submit">Register</button>
	</form>
</template>

<script setup>
import { ref } from 'vue'
import { register } from "../composables/auth";

const name = ref('')
const email = ref('')
const password = ref('')
const password_confirmation = ref('')
</script>

<style scoped>

</style>