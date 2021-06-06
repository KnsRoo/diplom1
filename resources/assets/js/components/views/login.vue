<template>
	<div class = "wrapper" style = "">
		<div class = "wrapper-container" style = "width: 500px;">
			<div class="container-sm">
				<div class = "h1_wrapper"><h1>Авторизация</h1></div>
				<div class="mb-3">
					<label for="exampleFormControlInput1" class="form-label">Имя пользователя:</label>
					<input v-model = "login" type="text" class="form-control" id="exampleFormControlInput1" placeholder="">
					<label for="exampleFormControlInput2" class="form-label">Пароль:</label>
					<input v-model = "password" type="password" id = "exampleFormControlInput2" class="form-control">
				</div>
				<div class = "h1_wrapper">
					<button @click = "log_in" type="button" class="btn btn-primary wide">Войти</button>
				</div>
				<div class = "pad_wrapper"><router-link to="/register" class = "nav-link">Регистрация</router-link>
					<router-link to = "/user" class = "nav-link">Гостевой вход</router-link></div>
			</div>
			<p class="lead center small">
			  Если Вы наш новый клиент рекомендуем вам зарегистрироваться - Вы получите возможность добавлять зявки на ремонт автомобилей в режиме онлайн. Или можете воспользоваться гостевым входом для просмотра списка механиков с номерами телефонов и квалификацией
			</p>
		</div>
	</div>
</template>

<script>
import { mapActions, mapGetters} from 'vuex'

export default {
	name: "login_form",
	data(){
		return {
			login: '',
			password: ''
		}
	},
	computed: {
		...mapGetters(['username', 'usertype'])
	},
	methods: {
		...mapActions(['signin', 'get']),
		async log_in(){
			await this.signin({login: this.login, password: this.password})
			this.$router.push({name: 'user'})
		},
	},
	async created(){
		await this.get();
		if (this.username){
			if (this.usertype == 'client')
				this.$router.push({name: 'user'})
			else
				this.$router.push({name: 'admin'})
		}
	}
}
</script>

<style>
    .wrapper {
        width: 96%;
        display: grid;
        justify-content: center;
    }
    .h1_wrapper {
        display: flex;
        justify-content: center;
    }
    .wrapper-container {
        margin-top: 40%;
    }
    .wide {
        width: 220px;
    }
    .center {
        text-align: center;
        margin-top: 10px;
    }
    .pad_wrapper {
        padding: 10px 0px;
        display: flex;
        justify-content: space-between;
    }
    .small {
        font-size: 14px;
    }
</style>