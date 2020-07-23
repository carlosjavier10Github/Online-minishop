<template>
	<div>   <!-- NO ESTA EN USO, PARA FUTURA IMPLEMENTACION -->
		<register></register>
		<login></login>
		<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
			<div class="container">
				<a class="navbar-brand" href="#">
					BackStore
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<!-- Left Side Of Navbar -->
					<ul class="navbar-nav mr-auto">
						<li class="nav-item">

						</li>
					</ul>

					<!-- Right Side Of Navbar -->
					<ul class="navbar-nav ml-auto">
						<!-- Authentication Links -->
						<!--  @guest -->
						<div v-if="guest">

							<li class="nav-item">
								<a class="nav-link" href="#" data-toggle="modal" data-target="#modal-login" v-html="lang.login"> </a>
							</li>
							<!-- @if (Route::has('register')) -->
							<li class="nav-item">
								<a href='#' class="nav-link text-dark" data-toggle="modal" data-target="#modal-register">
									{{ lang.register }}
								</a>
							</li>
							<!--    @endif -->
						</div>
						<!--      @else -->
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								{{user.name}}
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
								<!-- 	<a class="dropdown-item" href="#">Action</a> -->
								<router-link :to= "{name: 'profile'}"> {{ lang.profile}} </router-link>

								<a class="dropdown-item" href="#"
								onclick="event.preventDefault();document.getElementById('logout-form').submit();">
								{{ lang.logout}}

								<form id="logout-form" action="" method="POST" style="display: none;">
									@csrf
								</form>
							</a>
						</div>
					</li>
					<!-- @endguest -->
				</ul>
			</div>
		</div>
	</nav>
</div>
</template>
<script>
import  {fullPath} from '../../utils'
import { language } from '../../utils'
export default {

	data() {
		return{
			guest: true,
			user:{},
			lang: language.topbar
		}
	},

	created(){
		let vm= this

		const checkAuth = async function(){
			const respon = await vm.getSession()
		}
		checkAuth().then((mensage) => {
			if (vm.user.email_verified_at == null && vm.user.id != undefined) {
				this.$router.push({ name: 'verifyemail',params: { lasted_email_sent: vm.user.lasted_email_sent }})
			}
			else
				 {
				 	if (this.$route.fullPath !='/') {
					this.$router.push({ name: 'vitrina'})

				 	}

				 }

		})
	},
	methods: {

		getSession: async function() {
			let vm = this
			let url=fullPath+'/user-id'

			const resp = await axios.get(url).then(function(response){
				if(response.data.user){
					vm.guest=false
					vm.user = response.data.user
					if (vm.user.name == null || vm.user.name=="")
					{
						vm.user.name=vm.user.email

					}
					if(typeof resp != 'undefined'){
						console.log('Ocurrio un error: ' + resp.message, 'error')
					}
					return true
				}
				else{ return false}


			})
			.catch(function(err){

				console.log('Error Desconocido en TopBar')
				console.log(err)
				return false
			});
		},

	},


}


</script>

