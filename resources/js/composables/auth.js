import { useAuthStore } from '../stores/auth'
import auth from "../api/auth";
import router from "../router";

export default () => {
  const loginCheck = async () => {
    const { loginCheckApi } = auth()
    const authStore = useAuthStore()
    authStore.isLogged = (await loginCheckApi()).status
  }

  const login = async (email, password) => {
    const { loginApi } = auth()
    let response = await loginApi(email, password)

    if (response.status) {
      const authStore = useAuthStore()
      authStore.isLogged = true
      await router.push('/')
    }
  }

  const logout = async () => {
    const { logoutApi } = auth()
    let response = await logoutApi()

    if (response.status) {
      const authStore = useAuthStore()
      authStore.isLogged = false
    }
  }

  const register = async (name, email, password, password_confirmation) => {
    const { registerApi } = auth()
    let response = await registerApi(name, email, password, password_confirmation)

    console.log(response.status)

    if (response.status === 200) {
      if (response.data.status) {
        const authStore = useAuthStore()
        authStore.isLogged = true
        await router.push('/')
      }
    }

    return {
      status: false,
      data: Object.keys(response.data).length
        ? response.data
        : { message: 'Что-то пошло не так. Попробуйте еще раз' }
    }
  }

  return {
    loginCheck,
    login,
    logout,
    register
  }
}