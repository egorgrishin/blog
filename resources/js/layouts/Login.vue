<template>
	<label>
		Email:
		<input type="email" v-model="email">
	</label>
	<label>
		Password:
		<input type="password" v-model="password">
	</label>
	<h1 @click="login(email, password)">Login</h1>
</template>

<script>
	import { ref, onMounted } from 'vue'
  import auth from "../composables/auth";
	
  export default {
    name: "Login",
		setup() {
      const { loginCheck, login } = auth()
      onMounted(loginCheck)
      
      let email = ref('')
      let password = ref('')

			return {
        email,
        password,
        login,
			}
		}
  }
</script>

<style scoped>

</style>