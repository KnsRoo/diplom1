<template>
	<div>
		<h3 v-if = "usertype == 'admin'" class = "padh">Администратор</h3>
		<h3 v-else class = "padh">Механик {{username}}</h3>
		<a @click.prevent = "logout" class = "nav-link">Выйти</a>
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
				    <a class="nav-link pointer" :class = "{ active: active == 'Заявки'}" @click.prevent = "setActive('Заявки')">Заявки</a>
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
					    <tr v-if = "active == 'Клиенты'">
					    	<th scope="col">#</th>
					    	<th scope="col">Имя</th>
					    	<th scope="col">Логин</th>
					    	<th scope="col">Номер удостоверения</th>
					    	<th scope="col">Адрес</th>
					    	<th scope="col">Номер телефона</th>
					    </tr>
					    <tr v-if = "active == 'Механики'">
					    	<th scope="col">#</th>
					    	<th scope="col">Имя</th>
					    	<th scope="col">Логин</th>
					    	<th scope="col">Адрес</th>
					    	<th scope="col">Номер удостоверения</th>
					    	<th scope="col">Квалификация</th>
					    	<th scope="col">Номер телефона</th>
					    </tr>
					    <tr v-if = "active == 'Заявки'">
					    	<th scope="col">#</th>
					    	<th scope="col">Дата</th>
					    	<th scope="col">Работа</th>
					    	<th scope="col">Гос. номер</th>
					    	<th scope="col">Заявитель</th>
					    </tr>
					    <tr v-if = "active == 'Администраторы'">
					    	<th scope="col">#</th>
					    	<th scope="col">Логин</th>
					    </tr>
					    <tr v-if = "active == 'Автомобили'">
					    	<th scope="col">#</th>
					    	<th scope="col">Гос. номер</th>
					    	<th scope="col">Марка</th>
					    	<th scope="col">Мощность</th>
					    	<th scope="col">Год выпуска</th>
					    	<th scope="col">Цвет</th>
					    </tr>
					    <tr v-if = "active == 'Работы'">
					    	<th scope="col">#</th>
					    	<th scope="col">Работа</th>
					    	<th scope="col">Начало</th>
					    	<th scope="col">Стоимость</th>
					    	<th scope="col">Окончание план</th>
					    	<th scope="col">Окончание факт</th>
					    	<th scope="col">Механик</th>
					    </tr>
					</thead>
					<tbody>
					    <tr v-if = "active == 'Администраторы'" v-for = "(field, index) in data">
					    	<th scope="row">{{index+1}}</th>
					    	<td>{{field.login}}</td>
					    </tr>
					    <tr v-if = "active == 'Клиенты'" v-for = "(field, index) in data">
					    	<th scope="row">{{index+1}}</th>
					    	<td>{{field.name}}</td>
					    	<td>{{field.user_login}}</td>
					    	<td>{{field.license_num}}</td>
					    	<td>{{field.address}}</td>
					    	<td>{{field.tel_num}}</td>
					    </tr>
					    <tr v-if = "active == 'Механики'" v-for = "(field, index) in data">
					    	<th scope="row">{{index+1}}</th>
					    	<td>{{field.name}}</td>
					    	<td>{{field.user_login}}</td>
					    	<td>{{field.license_num}}</td>
					    	<td>{{field.address}}</td>
					    	<td>{{field.qualification}}</td>
					    	<td>{{field.tel_num}}</td>
					    </tr>
					    <tr v-if = "active == 'Заявки'" v-for = "(field, index) in data">
					    	<th scope="row">{{index+1}}</th>
					    	<td>{{field.date}}</td>
					    	<td>{{field.category}}</td>
					    	<td>{{field.cars_num}}</td>
					    	<td>{{field.user_login}}</td>
					    </tr>
					    <tr v-if = "active == 'Работы'" v-for = "(field, index) in data">
					    	<th scope="row">{{index+1}}</th>
					    	<td>{{field.category}}</td>
					    	<td>{{field.start_date}}</td>
					    	<td>{{field.cost}}</td>
					    	<td>{{field.end_plan}}</td>
					    	<td>{{field.end_fact}}</td>
					    	<td>{{field.mechanic}}</td>
					    </tr>
					    <tr v-if = "active == 'Автомобили'" v-for = "(field, index) in data">
					    	<th scope="row">{{ index+1 }}</th>
					    	<td>{{field.num}}</td>
					    	<td>{{field.mark}}</td>
					    	<td>{{field.power}}</td>
					    	<td>{{field.year}}</td>
					    	<td>{{field.color}}</td>
					    </tr>
					</tbody>
				</table>
				<div class = "pad_wrapper">
				    <div>
				        <button type="button" class="btn btn-primary wide">Экспорт в CSV</button>
				    </div>
				    <div v-if = "active == 'Механики'">
				        <button @click = "toMechanic" type="button" class="btn btn-primary wide">Добавить</button>
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
		...mapGetters(['username','usertype', 'data'])
	},
	methods: {
		...mapActions(['logout', 'get','fetchClients', 'fetchMechanics', 'fetchAdmins', 'fetchAllRequests', 'fetchAllAuto', 'fetchAdmins', 'fetchWorks']),
		async setActive(active){
			this.active = active
			switch (this.active){
				case "Клиенты": await this.fetchClients(); break;
				case "Механики": await this.fetchMechanics(); break;
				case "Заявки": await this.fetchAllRequests(); break;
				case "Автомобили": await this.fetchAllAuto(); break;
				case "Работы": await this.fetchWorks(); break;
				case "Администраторы": await this.fetchAdmins(); break;
			}
		},
		toMechanic(){
			this.$router.push({name: 'addmechanic'})
		}
	},
	async created(){
		await this.get()
		if (!this.username){
			this.$router.push({'name': login})
		}
		if (this.usertype == 0){
			this.$router.push({'name': user})
		}
		this.fetchClients()
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