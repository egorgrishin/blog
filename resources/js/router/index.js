import { createRouter, createWebHistory } from 'vue-router'
import routes from "./routes";
import { loginCheckApi } from '../api/auth'
import { useAuthStore } from '../stores/auth'

const router = createRouter({
  history: createWebHistory(),
  routes
})

router.beforeEach(async (to) => {
  const authStore = useAuthStore()
  if (authStore.isLogged === null)
    authStore.isLogged = (await loginCheckApi()).status

  if (to.path !== '/login' && to.path !== '/register')
    return true

  return authStore.isLogged ? '/' : true
})

export default router