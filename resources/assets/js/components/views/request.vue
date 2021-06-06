<template>
	<div class = "wrapper" style = "">
		<div class = "wrapper-container" style = "width: 500px;">
			<div class="container-sm">
				<div class = "h1_wrapper"><h1>Авторизация</h1></div>
				<div class="mb-3">
					<label for="exampleFormControlInput1" class="form-label">Имя пользователя:</label>
					<input v-model = "name" type="text" class="form-control" id="exampleFormControlInput1" placeholder="">
					<label for="exampleFormControlInput2" class="form-label">Пароль:</label>
					<input v-model = "password" type="password" id = "exampleFormControlInput2" class="form-control">
				</div>
				<div class = "h1_wrapper">
					<button @click = "log_in" type="button" class="btn btn-primary wide">Войти</button>
				</div>
				<div class = "pad_wrapper"><a class = "nav-link">Регистрация</a><a class = "nav-link">Гостевой вход</a></div>
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
	name: "login",
	data(){
		return {
			name: '',
			password: ''
		}
	},
	methods: {
		...mapActions(['login']),
		async log_in(){
			await this.login({name: this.name, password: this.password})
		}
	}
}
</script>