require('./bootstrap');

import { createApp } from 'vue'
import router from './Router'

createApp({})
    .use(router)
    .mount('#app')

