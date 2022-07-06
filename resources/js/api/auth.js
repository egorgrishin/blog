export default () => {
  const loginCheckApi = async () => {
    return await axios.get('/sanctum/csrf-cookie').then(async () => {
      return await axios.post('/api/auth/check').then(response => response.data)
    })
  }

  const loginApi = async (email, password) => {
    let response = await axios.post('/api/auth/login', {
      email: email,
      password: password,
    })
    return response.data
  }

  const logoutApi = async () => {
    let response = await axios.post('/api/auth/logout')
    return response.data
  }

  const registerApi = async (name, email, password, password_confirmation) => {
    return await axios.post('/api/auth/register', {
      name: name,
      email: email,
      password: password,
      password_confirmation: password_confirmation,
    })
      .then(response => response)
      .catch(error => error.response)
  }

  return {
    loginApi,
    logoutApi,
    registerApi,
    loginCheckApi,
  }
}