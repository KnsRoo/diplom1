<template>
	<div>
		<h3 class = "padh">Личный кабинет {{username || "Гость"}}</h3>
		<a @click.prevent = "logout" class = "nav-link">Выйти</a>
		<div class = "wrapper" style = "">
			<div class = "wrapper-container" style = "width: 1000px;">
				<ul class="nav nav-pills nav-justified">
				  <li v-if = "username" class="nav-item">
				    <a class="nav-link pointer" :class = "{ active: active == 'Мои авто'}" @click.prevent = "setActive('Мои авто')">Мои авто</a>
				  </li>
				  <li v-if = "username" class="nav-item">
				    <a class="nav-link pointer" :class = "{ active: active == 'Мои заявки'}" @click.prevent = "setActive('Мои заявки')">Мои заявки</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link pointer" :class = "{ active: active == 'Механики'}" @click.prevent = "setActive('Механики')">Механики</a>
				  </li>
				</ul>
				<table class="table margin">
					<thead>
					    <tr v-if = "active == 'Мои авто'">
					    	<th scope="col">#</th>
					    	<th scope="col">Гос. номер</th>
					    	<th scope="col">Марка</th>
					    	<th scope="col">Мощность</th>
					    	<th scope="col">Год выпуска</th>
					    	<th scope="col">Цвет</th>
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
					    <tr v-if = "active == 'Мои заявки'">
					    	<th scope="col">#</th>
					    	<th scope="col">Дата</th>
					    	<th scope="col">Работа</th>
					    	<th scope="col">Гос. номер</th>
					    </tr>
					</thead>
					<tbody>
					    <tr v-if = "active == 'Мои авто'" v-for = "(field, index) in data">
					    	<th scope="row">{{ index+1 }}</th>
					    	<td>{{field.num}}</td>
					    	<td>{{field.mark}}</td>
					    	<td>{{field.power}}</td>
					    	<td>{{field.year}}</td>
					    	<td>{{field.color}}</td>
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
					    <tr v-if = "active == 'Мои заявки'" v-for = "(field, index) in data">
					    	<th scope="row">{{index+1}}</th>
					    	<td>{{field.date}}</td>
					    	<td>{{field.category}}</td>
					    	<td>{{field.cars_num}}</td>
					    </tr>
					</tbody>
				</table>
				<div class = "pad_wrapper" v-if = "active != 'Механики'">
				    <div>
				        <button @click = "addReq" type="button" class="btn btn-primary wide">Добавить</button>
				        <button type="button" class="btn btn-primary wide">Удалить</button>
				    </div>
				</div>
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
			active: "Мои авто"
		}
	},
	computed: {
		...mapGetters(['username', 'data'])
	},
	methods: {
		...mapActions(['logout', 'fetchAuto', 'fetchRequests', 'fetchMechanics']),
		setActive(active){
			this.active = active
			switch (this.active){
				case "Мои авто": this.fetchAuto(); break;
				case "Мои заявки": this.fetchRequests(); break;
				case "Механики": this.fetchMechanics(); break;
			}
		},
		addReq(){
			this.$router.push({name: 'addcar'})
		}
	},
	async created(){
		this.fetchAuto();
	}
}
</script>