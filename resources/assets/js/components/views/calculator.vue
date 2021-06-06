<template>
	<div class = "wrapper" style = "">
		<div class = "wrapper-container" style = "width: 500px;">
			<div class = "h1_wrapper"><h1>Кальулятор подбора поршней к цилиндрам</h1></div>
			<div class="container-sm">
				<div class="mb-3">
					<label for="exampleFormControlInput1" class="form-label">Диаметр поршня (мм):</label>
					<input v-model = "d1" type="text" class="form-control" id="exampleFormControlInput1" va placeholder="">
					<label for="exampleFormControlInput2" class="form-label">Диаметр цилиндра (мм):</label>
					<input v-model = "d2" type="text" id = "exampleFormControlInput2" class="form-control">
				</div>
			</div>
			<p class = "lead center" :class = "classname">{{z}}</p>
			<p class="lead center small">
			  Форма позволяет выполнять расчёт подбора поршней к цилиндрам, вычисляя зазор между ними. Номинальный зазор равен 0,025-0,045 мм (зеленый цвет), предельно допустимый - 0,15 мм (желтый цвет). Недопустимый зазор подсвечивается красным цветом 
			</p>
			<div class = "h1_wrapper">
				<router-link to="/user" class = "nav-link">Назад</router-link>
			</div>
		</div>
	</div>
</template>

<script>
export default {
	data(){
		return {
			d1: 0,
			d2: 0
		}
	},
	computed: {
		z(){ 
			let d = this.d2-this.d1
			if (d < 0) return "Некорректное выражение"
			return `Зазор: ${d} мм`
		},
		classname(){
			let d = this.d2-this.d1
			if ((d > 0.025) && (d < 0.045)) return "green"
			else if (d < 0.15) return "yellow"
			else return "red"
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
      text-align: center;
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
    .red {
      border: 1px solid red;
      border-radius: 10px;
    }
    .green {
      border: 1px solid green;
      border-radius: 10px;
    }
    .yellow {
      border: 1px solid yellow;
      border-radius: 10px;
    }
</style>