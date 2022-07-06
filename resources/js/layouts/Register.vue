<template>
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
	<h1 @click="register(name, email, password, password_confirmation)">Login</h1>
	{{ asd }}
</template>

<script>
	import { ref, onMounted } from 'vue'
	import auth from "../composables/auth";
	
  export default {
    name: "Register",
		setup() {
      const name = ref('')
      const email = ref('')
      const password = ref('')
      const password_confirmation = ref('')

			const { register } = auth()

      let asd = ref(null)
      const qwe = async () => asd.value = await register(name, email, password, password_confirmation)
      onMounted(qwe)
			setTimeout(async () => {
			  console.log(asd.value)
			  // asd.value = qwe()
      }, 3000)
			
			return {
        name,
				email,
				password,
        password_confirmation,
        register,
        asd
			}
    }
  }
</script>

<style scoped>

</style>