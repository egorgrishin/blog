require('./bootstrap');

import App from "./App";
import { createApp } from 'vue'
import { createPinia } from 'pinia'
import router from './router'

import MainLayout from './layouts/MainLayout'
import AdminLayout from './layouts/AdminLayout'

const pinia = createPinia()

const app = createApp(App)
app.use(pinia)
app.use(router)
app.component('MainLayout', MainLayout)
app.component('AdminLayout', AdminLayout)
app.mount('#app');