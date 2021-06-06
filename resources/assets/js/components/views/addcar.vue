<template>
	<div class = "wrapper" style = "">
		<div class = "wrapper-container" style = "width: 500px;">
			<div class="container-sm">
				<div class = "h1_wrapper"><h1>Добавление автомобиля</h1></div>
				<div class="mb-3">
					<label for="exampleFormControlInput1" class="form-label">Гос. номер:</label>
					<input v-model = "cars_num" type="text" class="form-control" id="exampleFormControlInput1" placeholder="">
					<label for="exampleFormControlInput2" class="form-label">Марка:</label>
					<input v-model = "mark" type="text" id = "exampleFormControlInput2" class="form-control">
					<label for="exampleFormControlInput3" class="form-label">Мощность:</label>
					<input v-model = "power" type="text" id = "exampleFormControlInput3" class="form-control">
					<label for="exampleFormControlInput4" class="form-label">Год:</label>
					<input v-model = "year" type="text" id = "exampleFormControlInput4" class="form-control">
					<label for="exampleFormControlInput5" class="form-label">Цвет:</label>
					<input v-model = "color" type="text" id = "exampleFormControlInput5" class="form-control">
				</div>
				<div class = "h1_wrapper">
					<button type="button" class="btn btn-primary wide">Добавить</button>
					<a class = "nav-link pointer" @click.prevent = "back" >Назад</a>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
import { mapActions, mapGetters} from 'vuex'

export default {
	name: "addcar",
	data(){
		return {
			cars_num: '',
			mark: '',
			power: '',
			year: '',
			color: ''
		}
	},
	methods: {
		...mapActions(['addcar']),
		async add_car(){
			await this.addcar({
				cars_num: this.cars_num,
				mark: this.mark,
				power: this.power,
				year: this.year,
				color: this.color
			})
		},
		back(){
			this.$router.go(-1)
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
    	flex-direction: column;
    	align-items: center;
    	justify-content: center;
    }
    .wrapper-container {
    	margin-top: 10%;
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
    .pointer {
    	cursor: pointer;
    }
</style>