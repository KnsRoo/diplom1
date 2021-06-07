import Vue from "vue";
import Vuex from "vuex";
import ky from 'ky'
import Noty from 'noty'

Vue.use(Vuex)

export default new Vuex.Store({
	state: {
		user: null,
		data: []

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
		async logout({commit}){
			await ky.post('/api/user/logout')
			commit('logoutUser')
		},
		async get({commit}){
			let response = await ky.get('/api/user/get').json()
			if (!response.message){
				commit('setUser', response)
			}
		},
		async fetchRequests({commit}){
			let response = await ky.get('/api/requests/user').json()
			if (!response.message){
				commit('setData', response)
			}			
		},
		async fetchAllRequests({commit}){
			let response = await ky.get('/api/requests/all').json()
			if (!response.message){
				commit('setData', response)
			}			
		},
		async fetchClients({commit}){
			let response = await ky.get('/api/user/clients').json()
			if (!response.message){
				commit('setData', response)
			}			
		},
		async fetchAllAuto({commit}){
			let response = await ky.get('/api/cars/all').json()
			if (!response.message){
				commit('setData', response)
			}			
		},
		async fetchAuto({commit}){
			let response = await ky.get('/api/cars/user').json()
			if (!response.message){
				commit('setData', response)
			}			
		},
		async fetchWorks({commit}){
			let response = await ky.get('/api/works/get').json()
			if (!response.message){
				commit('setData', response)
			}			
		},
		async fetchAllRequests({commit}){
			let response = await ky.get('/api/requests/all').json()
			if (!response.message){
				commit('setData', response)
			}			
		},
		async fetchRequests({commit}){
			let response = await ky.get('/api/requests/user').json()
			if (!response.message){
				commit('setData', response)
			}			
		},
		async fetchMechanics({commit}){
			let response = await ky.get('/api/user/mechanics').json()
			if (!response.message){
				commit('setData', response)
			}			
		},
		async fetchAdmins({commit}){
			let response = await ky.get('/api/user/admins').json()
			if (!response.message){
				commit('setData', response)
			}			
		}
	},
	mutations: {
		setUser(state, data){
			state.user = data
		},
		setData(state, data){
			state.data = data
		},
		logoutUser(state){
			state.user = null
		}
	},
	getters: {
		username: s => s.user ? s.user.name : null,
		usertype(state){
			if (!state.user) return null
			if (state.user.type == 0){
				return 'client'
			} else if (state.user.type == 1){
				return 'mechanic'
			} else {
				return 'admin'
			}
		},
		data: s => s.data
	}
})