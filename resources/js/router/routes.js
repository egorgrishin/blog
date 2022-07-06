export default [
  {
    path: '/',
    component: () => import('../layouts/Home')
  },
  {
    path: '/login',
    component: () => import('../layouts/Login')
  },
  {
    path: '/register',
    component: () => import('../layouts/Register')
  },
  {
    path: '/404',
    component: () => import('../layouts/PageNotFound')
  },
  {
    path: '/:pathMatch(.*)*',
    redirect: '/404'
  },
]