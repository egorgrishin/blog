async function setCsrfCookie() {
  await axios.get('/sanctum/csrf-cookie')
}

async function loginCheckApi() {
  await setCsrfCookie()
  return await axios.post('/api/auth/check')
    .then(response => response.data)
}

async function loginApi(email, password) {
  await setCsrfCookie()
  return await axios.post('/api/auth/login', {
    email: email,
    password: password,
  })
    .then(response => response)
    .catch(error => error.response)
}

async function logoutApi() {
  await setCsrfCookie()
  return await axios.post('/api/auth/logout')
    .then(response => response)
    .catch(error => error.response)
}

async function registerApi(name, email, password, password_confirmation) {
  await setCsrfCookie()
  return await axios.post('/api/auth/register', {
    name: name,
    email: email,
    password: password,
    password_confirmation: password_confirmation,
  })
    .then(response => response)
    .catch(error => error.response)
}

export {
  loginApi,
  logoutApi,
  registerApi,
  loginCheckApi,
}