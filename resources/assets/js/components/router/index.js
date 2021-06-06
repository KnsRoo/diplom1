import Vue from 'vue'
import VueRouter from 'vue-router'

import login from '../views/login.vue'
import register from '../views/registration.vue'
import admin from '../views/admin.vue'
import user from '../views/user.vue'
import request from '../views/request.vue'
import calculator from '../views/calculator.vue'
import addcar from '../views/addcar.vue'
import addmechanic from '../views/addmechanic.vue'

Vue.use(VueRouter)

export default new VueRouter({
    mode: 'history',
    base: process.env.BASE_URL,
    routes: [
	    {
	        path: '/',
	        name: 'login',
	        component: login
	    },
	    {
	        path: '/admin',
	        name: 'admin',
	        component: admin
	    },
	    {
	        path: '/register',
	        name: 'register',
	        component: register
	    },
	    {
	        path: '/user',
	        name: 'user',
	        component: user
	    },
	    {
	        path: '/request',
	        name: 'sesion',
	        component: request
	    },
	   	{
	        path: '/calculator',
	        name: 'calculator',
	        component: calculator
	    },
	    {
	        path: '/addcar',
	        name: 'addcar',
	        component: addcar
	    },
	    {
	        path: '/addmechanic',
	        name: 'addmechanic',
	        component: addmechanic
	    },
    ]
})