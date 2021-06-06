import Vue from 'vue';
import App from './Layout.vue'
import store from '../store'
import router from '../router'
import 'bootstrap/dist/css/bootstrap.css'

export default function (selector){
	const el = document.querySelector(selector);
	new Vue({
		el,
		store,
		router,
		render: h => h(App),
	});
}