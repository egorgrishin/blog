<template>
  <Header />
  <router-view></router-view>
</template>

<script>
	import Header from "./layouts/Header";
  export default {
    name: "App",
    components: {
      Header,
    },
    setup() {
    
    }
  }
</script>

<style>
  body {
    margin: 0;
    font-family: sans-serif;
  }
</style>