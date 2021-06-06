<template>
	<div>
		<h3 class = "padh">Личный кабинет {{username}}</h3>
		<div class = "wrapper" style = "">
			<div class = "wrapper-container" style = "width: 1000px;">
				<ul class="nav nav-pills nav-justified">
				  <li v-if = "username != 'Гость'" class="nav-item">
				    <a class="nav-link pointer" :class = "{ active: active == 'Мои авто'}" @click.prevent = "setActive('Мои авто')">Мои авто</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link pointer" :class = "{ active: active == 'Мои заявки'}" @click.prevent = "setActive('Мои заявки')">Мои заявки</a>
				  </li>
				  <li v-if = "username != 'Гость'" class="nav-item">
				    <a class="nav-link pointer" :class = "{ active: active == 'Механики'}" @click.prevent = "setActive('Механики')">Механики</a>
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
		...mapGetters(['username'])
	},
	methods: {
		...mapActions(['login']),
		setActive(active){
			this.active = active
		},
		addReq(){
			this.$router.push({name: 'addcar'})
		}
	}
}
</script>