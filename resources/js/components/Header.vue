<template>
	<header>
		<div class="container">
			<router-link to="/">Блог</router-link>
			<nav>
				<ul>
					<li>
						<router-link to="/">Главная</router-link>
					</li>
					<li>
						<router-link to="/">Категории</router-link>
					</li>
					<li>
						<router-link to="/">Полезные ресурсы</router-link>
					</li>
					<li v-if="isLogged===true">
						<span @click="logout">Выйти</span>
					</li>
					<li v-else-if="isLogged===false">
						<router-link to="/login">В</router-link>
					</li>
					<li v-if="isLogged===false">
						<router-link to="/register">З</router-link>
					</li>
				</ul>
			</nav>
		</div>
	</header>
</template>

<script setup>
import { storeToRefs } from 'pinia'
import { useAuthStore } from '../stores/auth'
import { logout } from "../composables/auth";
	
const authStore = useAuthStore()
const { isLogged } = storeToRefs(authStore)
</script>

<style scoped>
header {
	display: flex;
	align-content: center;
	height: 5rem;
	margin-bottom: 2.5rem;
	border-bottom: 1px solid rgb(255 255 255 / 4%);
	box-sizing: border-box;
	box-shadow: 0 4px 8px rgb(0 0 0 / 8%);
}

header .container {
	display: flex;
	align-items: center;
	justify-content: space-between;
}

ul {
	margin: 0;
	padding: 0;
	list-style: none;
	display: flex;
}

li {
	margin-right: 1.5rem
}

li:last-child {
	margin-right: 0
}

a {
	color: rgb(255 255 255 / 64%);
	text-decoration: none
}
</style>