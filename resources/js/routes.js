import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router)


export default new Router({

	routes:[
	{
		path:'/',
		name:'vitrina',
		component:require('./views/vitrina').default
	},

	{
		path:'/home',
		name:'home',
		component:require('./views/home').default
	},

	{
		path:'*',
		component:require('./views/404').default
	},


	],
	mode: 'history'
})