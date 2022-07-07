import { useAuthStore } from '../stores/auth'
import { loginApi, logoutApi, registerApi} from "../api/auth";
import router from "../router";

async function login(email, password) {
  let response = await loginApi(email, password)

  if (response.status === 200 && response.data.status) {
    const authStore = useAuthStore()
    authStore.isLogged = true
    await router.push('/')
  }

  return {
    status: false,
    message: 'Некорректные данные'
  }
}

async function logout() {
  let response = await logoutApi()

  if (response.status === 200 && response.data.status) {
    const authStore = useAuthStore()
    authStore.isLogged = false
    console.log(authStore.isLogged)
  }
}

async function register(name, email, password, password_confirmation) {
  let response = await registerApi(name, email, password, password_confirmation)

  if (response.status === 200 && response.data.status) {
    const authStore = useAuthStore()
    authStore.isLogged = true
    await router.push('/')
  }

  return {
    status: false,
    data: Object.keys(response.data).length
      ? response.data
      : { message: 'Что-то пошло не так. Попробуйте еще раз' }
  }
}

export {
  login,
  logout,
  register
}