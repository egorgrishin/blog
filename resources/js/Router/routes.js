const App = () => import('../App')
const Test2 = () => import('../Components/Test2')

export default [
  {
    path: '/',
    component: App,
  },
  {
    path: '/2',
    component: Test2,
  },
]
