export default [

	{
		path: '/404',
		component: () => import('../components/PageNotFound')
	},
	{
		path: '/:pathMatch(.*)*',
		redirect: '/404'
	}
]