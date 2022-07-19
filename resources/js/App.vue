<template>
	<component :is="layout">
		<router-view />
	</component>
</template>

<script setup>
import { computed } from 'vue'
import { useRoute } from 'vue-router'

const router = useRoute()
const layout = computed(() => router.meta.layout || 'main-layout')
</script>

<!--suppress CssUnusedSymbol -->
<style>
@import url('https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

body {
	margin: 0;
	background: #1B1B1F;
	font-family: 'Noto Sans', sans-serif;
	font-size: 16px;
	color: rgb(255 255 255 / 64%);
}

.container {
	width: 100%;
	max-width: 845px;
	margin: 0 auto;
	padding: 0 15px;
	box-sizing: border-box;
}
</style>