<template>
	Test Home!!!!!!!!!!!!!!!!!!
	<br>
	<span @click="login">In</span>
	<br>
	<span @click="logout">Out</span>
</template>

<script>
  import { login, logout } from '../api/auth'
  export default {
    name: "Home",
		
  }
</script>

<style scoped>

</style>