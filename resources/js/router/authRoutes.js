export default [
	{
		path: '/login',
		component: () => import('../components/Login')
	},
	{
		path: '/register',
		component: () => import('../components/Register')
	},
]