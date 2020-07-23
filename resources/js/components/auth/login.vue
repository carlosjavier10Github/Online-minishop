<template>
	<div class="modal fade" id="modal-login" tabindex="-1" role="dialog">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<form @submit.prevent="doLogin">
					<div class="modal-header">
						<h5 class="modal-title" v-html="lang.title"></h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">


						<div class="form-group row" >
							<div class="input-group">
								<label class="col-sm-3 col-form-label" v-html="lang.email.name"></label>
								<div class="input-group-prepend">
									<span class="input-group-text" > <!-- icons places --> </span>
								</div>
								<input type="text" class="col-sm-9 form-control" :placeholder="lang.email.fullName"
								v-model="login.email" @keyup.enter="doLogin()" :class="{'alert alert-danger': errors.email}">

								<small class="pl-5 w-100 text-danger" v-if="errors.email" v-html="lang.email.error"></small>
							</div>
						</div>


						<div class="form-group row" :class="{'has-danger': errors.password}">
							<div class="input-group">
								<label class="col-sm-3 col-form-label" v-html="lang.password.name"></label>
								<div class="input-group-prepend">
									<span class="input-group-text"><!-- icons places --> </span>
								</div>
								<input type="password" class="col-sm-9 form-control" :placeholder="lang.password.fullName"
								v-model="login.password" @keyup.enter="doLogin()" :class="{'alert alert-danger': errors.password}">
								<small class="pl-5 w-100 text-danger" v-if="errors.password" v-html="lang.password.error"></small>

							</div>
						</div>



						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<div class="checkbox">
									<input type="checkbox" v-model="login.remember" name="remember">
									<label  v-html="lang.remember"></label>


								</div>
							</div>
						</div>
						<div class="form-group row text-ceneter">

							<span v-if="errorsEmailEmpty" class="help-block text-danger">
								<strong> {{ lang.errorsEmailEmpty}}</strong>
							</span>

							<span v-if="errorsPasswordEmpty" class="help-block text-danger">
								<strong> {{ lang.errorsPasswordEmpty}} </strong>
							</span>

							<span v-if="errorsNoMAtch" class="help-block text-danger">
								<strong> {{ lang.errorsNoMAtch}} </strong>
							</span>

							<span v-if="tooManyAttempts" class="help-block text-danger">
								<strong> {{ lang.tooManyAttempts}} </strong>
							</span>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">{{ lang.buttons.close}}</button>
						<button type="submit" class="btn btn-primary" v-on:click="doLogin()">{{ lang.buttons.send}}</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</template>

<script>
import { fullPath,language,validateEmail,validatePassword } from '../../utils'
export default {

	data() {
		return{

			errorsEmailEmpty: false,
			errorsPasswordEmpty: false,
			errorsNoMAtch: false,
			errorsPassword: false,
			tooManyAttempts: false,

			login:{
				email:'carlosjavier10@gmail.com',
				password: '12345678',
				remember:false
			},
			lang: language.login,
			errors: {email: false, password: false}

		}
	},
	created(){
		let vm =this
	},
	methods: {
		doLogin(){
			let vm =this

			if ( vm.validate() ) {
				let url = fullPath + '/login'
				axios
				.post(url, vm.login)
				.then(function(response){

					location.reload()

				})
				.catch(function (data) {


					if (data.response!= undefined) {


						const errorcode = data.response.status
						const errordetail = data.response.data
						if(errorcode === 429){
							vm.errorsEmailEmpty = false
							vm.errorsPasswordEmpty = false
							vm.errorsNoMAtch = false
							vm.errorsPassword = false
							vm.tooManyAttempts = true
						}
						if(errorcode === 422){

							if(errordetail.errors.email == 'El campo email es obligatorio.'){
								vm.errorsEmailEmpty = true
								vm.errorsPasswordEmpty = false
								vm.errorsNoMAtch = false
								vm.errorsPassword = false
								vm.tooManyAttempts = false
							}
							if(errordetail.errors.password == 'El campo password es obligatorio.'){
								vm.errorsPasswordEmpty = true
								vm.errorsEmailEmpty = false
								vm.errorsNoMAtch = false
								vm.errorsPassword = false
								vm.tooManyAttempts = false
							}
							if(errordetail.errors.email == 'Estas credenciales no coinciden con nuestros registros.'){
								vm.errorsNoMAtch = true
								vm.errorsEmailEmpty = false
								vm.errorsPasswordEmpty = false
								vm.errorsPassword = false
								vm.tooManyAttempts = false
							}
						}
						var errors = data.response
						if(errors.statusText === 'Unprocessable Entity'){
							if(errors.data){
								vm.messageError = errors.data.email
								if(errors.data.email){
									vm.errorsEmail = true
									vm.emailError = errors.data.email
								}
							}
						}
					}
				});
			}
		},
		validate()
		{

			let vm = this

			if (!validateEmail(vm.login.email))
			{
				vm.errors.email = true
				return false
			}
			else
			{
				vm.errors.email= false
			}

			if (!validatePassword(vm.login.password))
			{
				vm.errors.password= true
				return false
			}
			else
			{
				vm.errors.password = false
			}
			return true
		}
	}
}
</script>