require('./bootstrap');

import App from "./App";
import { createApp } from 'vue'
import { createPinia } from 'pinia'
import router from './router'

const pinia = createPinia()

const app = createApp(App)
app.use(pinia)
app.use(router)
app.mount('#app');