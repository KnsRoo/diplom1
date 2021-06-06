<template>
	<div class = "wrapper" style = "">
		<div class = "wrapper-container" style = "width: 800px;">
			<div class = "h1_wrapper"><h1>Добавление механика</h1></div>
			<div class="container-sm grid2c">
				<div class="mb-3">
					<label for="exampleFormControlInput1" class="form-label">Имя пользователя:</label>
					<input type="text" class="form-control" id="exampleFormControlInput1" placeholder="">
					<label for="exampleFormControlInput2" class="form-label">Пароль:</label>
					<input type="password" id = "exampleFormControlInput2" class="form-control">
					<label for="exampleFormControlInput3" class="form-label">Повторите пароль:</label>
					<input type="password" id = "exampleFormControlInput3" class="form-control">
				</div>
				<div class="mb-3">
					<label for="exampleFormControlInput4" class="form-label">ФИО:</label>
					<input type="text" class="form-control" id="exampleFormControlInput4" placeholder="">
					<label for="exampleFormControlInput5" class="form-label">Адрес:</label>
					<input type="password" id = "exampleFormControlInput5" class="form-control">
					<label for="exampleFormControlInput6" class="form-label">Номер телефона:</label>
					<input type="password" id = "exampleFormControlInput6" class="form-control">
					<label for="exampleFormControlInput7" class="form-label">Квалификация:</label>
					<input type="password" id = "exampleFormControlInput7" class="form-control">
				</div>
			</div>
			<div class = "h1_wrapper">
				<button type="button" class="btn btn-primary wide">Добавить</button>
			</div>
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