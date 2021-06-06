<template>
	<div>
		<h3 v-if = "usertype == 'admin'" class = "padh">Администратор</h3>
		<h3 v-else class = "padh">Механик {{username}}</h3>
		<div class = "wrapper" style = "">
			<div class = "wrapper-container" style = "width: 1000px;">
				<ul class="nav nav-pills nav-justified">
				  <li class="nav-item">
				    <a class="nav-link pointer" :class = "{ active: active == 'Клиенты'}" @click.prevent = "setActive('Клиенты')">Клиенты</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link pointer" :class = "{ active: active == 'Механики'}" @click.prevent = "setActive('Механики')">Механики</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link pointer" :class = "{ active: active == 'Заявки'}" @click.prevent = "setActive('Заявки')">Автомобили</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link pointer" :class = "{ active: active == 'Работы'}" @click.prevent = "setActive('Работы')">Работы</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link pointer" :class = "{ active: active == 'Автомобили'}" @click.prevent = "setActive('Автомобили')">Автомобили</a>
				  </li>
				  <li v-if = "usertype == 'admin'" class="nav-item">
				    <a class="nav-link pointer" :class = "{ active: active == 'Администраторы'}" @click.prevent = "setActive('Администраторы')">Администраторы</a>
				  </li>
				</ul>
				<table class="table margin">
					<thead>
					    <tr>
					    	<th scope="col">#</th>
					    	<th scope="col">Фамилия</th>
					    	<th scope="col">Имя</th>
					    	<th scope="col">e-mail</th>
					    </tr>
					</thead>
					<tbody>
					    <tr>
					    	<th scope="row">1</th>
					    	<td>Попов</td>
					    	<td>Андрей</td>
					    	<td>and.popov@rosauto.ru</td>
					    </tr>
					    <tr>
					    	<th scope="row">2</th>
					    	<td>Петров</td>
					    	<td>Василий</td>
					    	<td>vas.petrov@rosauto.ru</td>
					    </tr>
					    <tr>
					    	<th scope="row">3</th>
					    	<td>Сидоров</td>
					    	<td>Алексей</td>
					    	<td>ale.sidorov@rosauto.ru</td>
					    </tr>
					</tbody>
				</table>
				<div class = "pad_wrapper">
				    <div>
				        <button type="button" class="btn btn-primary wide">Экспорт в CSV</button>
				    </div>
				    <div>
				        <button type="button" class="btn btn-primary wide">Добавить</button>
				        <button type="button" class="btn btn-primary wide">Удалить</button>
				    </div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
import { mapActions, mapGetters } from 'vuex'

export default {
	data(){
		return {
			active: "Клиенты"
		}
	},
	computed: {
		...mapGetters(['usertype'])
	},
	methods: {
		setActive(active){
			this.active = active
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
    	margin-top: 5%;
    }
    .wide {
    	width: 220px;
    }
    .margin {
        margin-top: 30px;
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
    .padh {
        padding: 10px;
    }
    .pointer {
    	cursor: pointer;
    }
</style>