<template>
	<div class = "wrapper" style = "">
		<div class = "wrapper-container" style = "width: 800px;">
			<div class = "h1_wrapper"><h1>Регистрация</h1></div>
			<div class="container-sm grid2c">
				<div class="mb-3">
					<label for="exampleFormControlInput1" class="form-label">Имя пользователя:</label>
					<input v-model = "login" type="text" class="form-control" id="exampleFormControlInput1" placeholder="">
					<label for="exampleFormControlInput2" class="form-label">Пароль:</label>
					<input v-model = "password" type="password" id = "exampleFormControlInput2" class="form-control">
					<label for="exampleFormControlInput3" class="form-label">Повторите пароль:</label>
					<input v-model = "verify" type="password" id = "exampleFormControlInput3" class="form-control">
				</div>
				<div class="mb-3">
					<label for="exampleFormControlInput4" class="form-label">Номер удостоверения:</label>
					<input v-model="unumber" type="text" class="form-control" id="exampleFormControlInput4" placeholder="">
					<label for="exampleFormControlInput5" class="form-label">ФИО:</label>
					<input v-model="name" type="text" id = "exampleFormControlInput5" class="form-control">
					<label for="exampleFormControlInput6" class="form-label">Адрес:</label>
					<input v-model="address" type="text" id = "exampleFormControlInput6" class="form-control">
					<label for="exampleFormControlInput7" class="form-label">Номер телефона:</label>
					<input v-model="phone" type="text" id = "exampleFormControlInput7" class="form-control">
				</div>
			</div>
			<div class = "h1_wrapper">
				<button :disabled = "!verified" @click = "signup" type="button" class="btn btn-primary wide">Зарегистрироваться</button>
				<router-link to="/" class = "nav-link">Назад</router-link>
			</div>
			<p class="lead center small">
			  Нажимая кнопку зарегистрироваться вы соглашаетесь с политикой конфиденциальности
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
			password: '',
			verify: '',
			login: '',
			unumber: '',
			address: '',
			phone: ''
		}
	},
	computed: {
		verified(){
			return ((this.login > 0) && (this.password == this.verify) && (this.password.length != 0))
		}
	},
	methods: {
		...mapActions(['register']),
		async signup(){
			await this.register({
				name: this.name, 
				password: this.password,
				phio: this.phio,
				unumber: this.unumber,
				address: this.address,
				phone: this.phone
			})
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
    	margin-top: 20%;
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
    .grid2c {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 30px;
    }
</style>