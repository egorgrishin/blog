<template>
	<header>
		<router-link to="/">Блог</router-link>
		<nav>
			<ul>
				<li v-if="isLogged===true">
					<span @click="logout">Выйти</span>
				</li>
				<li v-else-if="isLogged===false">
					<router-link
						to="/login"
					>Войти</router-link>
				</li>
				<li v-if="isLogged===false">
					<router-link
						to="/register"
					>Зарегистрироваться</router-link>
				</li>
			</ul>
		</nav>
	</header>
</template>

<script>
	import { storeToRefs } from 'pinia'
	import { onMounted } from 'vue'
	import { useAuthStore } from '../stores/auth'
  import auth from "../composables/auth";
	
  export default {
    name: "Header",
		setup() {
      const authStore = useAuthStore()
      const { isLogged } = storeToRefs(authStore)

      const { loginCheck, logout } = auth()
      onMounted(loginCheck)
			
			return {
        isLogged,
        logout,
			}
		}
  }
</script>

<style scoped>
	header {
		width: 100%;
		height: 60px;
		display: flex;
		align-items: center;
		justify-content: space-between;
		padding: 0 2rem;
		background: #fff;
		box-shadow: 0 4px 8px rgb(0 0 0 / 8%);
		box-sizing: border-box;
	}
</style>