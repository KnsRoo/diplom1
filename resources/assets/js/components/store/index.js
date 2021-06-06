import Vue from "vue";
import Vuex from "vuex";
import ky from 'ky'
import Noty from 'noty'

Vue.use(Vuex)

export default new Vuex.Store({
	state: {
		user: null,
		cars: [],
		clients: [],
		mechanics: [],
		requests: [],
		works: [],
		admins: [],

	},
	actions: {
		async signin({commit}, data){
			let response = await ky.post('/api/user/login', { json: data }).json()
			if (response.message){
				new Noty({
					layout: 'topRight',
					type: 'error',
					text: 'Неправильный логин или пароль'
				})
			}
			commit('setUser', response)
		},
		async signup({commit}, data){
			let response = await ky.post('/api/user/register', { json: data }).json()
			if (response.message){
				new Noty({
					layout: 'topRight',
					type: 'error',
					text: 'Ошибка регистрации'
				})
			}
		},
		async get({commit}){
			let response = await ky.get('/api/user/get').json()
			if (!response.message){
				commit('setUser', response)
			}
		}
	},
	mutations: {
		setUser(state, data){
			state.user = data
		}
	},
	getters: {
		username: s => s.user ? s.user.name : 'Гость',
		usertype(state){
			if (state.user.type == 0){
				return 'client'
			} else if (state.user.type == 1){
				return 'mechanic'
			} else {
				return 'admin'
			}
		}
	}
})