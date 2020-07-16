<template>
	<div class="modal fade" id="modal-register" tabindex="-1" role="dialog">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title"> {{lang.title}} </h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group row">
						<div class="input-group">
							<label class="col-sm-1 col-form-label"></label>
							<div class="input-group-prepend">
								<span class="input-group-text" > {{lang.email.name}} </span>
							</div>
							<input name="email" type="text" class="col-sm-9 form-control" required :placeholder="lang.email.fullName" v-model="registerDetails.email" :class="{'alert alert-danger': errors.email,'alert alert-danger': Emailused}">
							<small class="pl-5 w-100 text-danger" v-if="errors.email" v-html="lang.email.error"></small>
						</div>
					</div>
					<div class="form-group row">
						<div class="input-group">
							<label class="col-sm-1 col-form-label"></label>
							<div class="input-group-prepend">
								<span class="input-group-text"> {{ lang.password.name}} </span>
							</div>
							<input name="password" type="password" class="col-sm-9 form-control" :placeholder="lang.password.fullName" v-model="registerDetails.password" :class="{'alert alert-danger': errors.password,'alert alert-danger': emptyPassword,'alert alert-danger': lengthPassword}">
							<small class="pl-5 w-100 text-danger" v-if="errors.email" v-html="lang.password.error"></small>
						</div>
					</div>					<div class="form-group row">
						<div class="input-group">
							<label class="col-sm-1 col-form-label"></label>
							<div class="input-group-prepend">
								<span class="input-group-text"> {{ lang.password_confirmation.name}} </span>
							</div>
							<input name="password_confirmation" type="password" class="col-sm-9 form-control" :placeholder="lang.password_confirmation.fullName" v-model="registerDetails.password_confirmation" :class="{'alert alert-danger': errors.password_confirmation,'alert alert-danger': matchPassword }">
							<small class="pl-5 w-100 text-danger" v-if="errors.password_confirmation" v-html="lang.password_confirmation.error"></small>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-12">
							<div class="checkbox">
								<label>
									<input type="checkbox" v-model="privacy_polices"  name="privacy_polices" :class="{'alert alert-danger': errors.privacy_polices}" >
									<a href="#">{{lang.privacy_polices.name}} </a>
								</label>
							</div>
							<small class="pl-5 w-100 text-danger" v-if="errors.privacy_polices" v-html="lang.privacy_polices.error"></small>
						</div>
					</div>
					<div class="form-group row text-ceneter">
						<span v-if="Emailused" class="help-block text-danger">
							<strong v-html="lang.Emailused"></strong>
						</span>
						<span v-if="invalidEmail" class="help-block text-danger">
							<strong v-html="lang.invalidEmail"></strong>
						</span>
						<span v-if="emptyEmail" class="help-block text-danger">
							<strong v-html="lang.emptyEmail"></strong>
						</span>
						<span v-if="emptyPassword" class="help-block text-danger">
							<strong v-html="lang.emptyPassword"></strong>
						</span>
						<span v-if="lengthPassword" class="help-block text-danger">
							<strong v-html="lang.lengthPassword"></strong>
						</span>
						<span v-if="matchPassword" class="help-block text-danger">
							<strong v-html="lang.matchPassword"></strong>
						</span>


					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal"
					:class="{'disabled': awaitingResponse}">Cerrar</button>
					<button type="button" class="btn btn-primary" v-on:click="doRegister()">Registrar</button>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
import { fullPath,language,validateEmail,validatePassword } from '../../utils'

export default {

	data() {
		return{
			registerDetails: {
				email : 'carlosjavier10@gmail.com',
				password:'12345678',
				password_confirmation:'12345678',

			},
			errors: {email: false, password: false, password_confirmation:false, privacy_polices:false},
			privacy_polices: true,
			lang: language.register,

			Emailused : false,
			invalidEmail:false,
			emptyEmail:false,
			emptyPassword:false,
			lengthPassword:false,
			matchPassword:false,

			awaitingResponse: false



		}
	},
	created(){

	},
	methods:{
		doRegister(){

			let vm= this

			if (vm.validate()&& !vm.awaitingResponse ){
				vm.awaitingResponse = true
				let url = fullPath+'/register'
				axios
				.post(url,  vm.registerDetails)
				.then(function(response){
					window.location.href = 'verifyemail'
				})
				.catch(function (data) {
					var errors = data.response.data.errors
					if (errors.email == "El valor del campo email ya está en uso.")
					{
						vm.Emailused = true
					}
					if (errors.email == "El campo email debe ser una dirección de correo válida.")
					{
						vm.invalidEmail = true
					}
					if (errors.email == "El campo email es obligatorio." )
					{
						vm.emptyEmail = true
					}


					if (errors.password != undefined) {
						for (var i = 0; i < errors.password.length; i++)
						{

							if (errors.password[i] == "El campo password es obligatorio." )
							{
								vm.emptyPassword = true
							}
							if (errors.password[i] == "El campo password debe contener al menos 4 caracteres." )
							{
								vm.lengthPassword = true
							}
							if (errors.password[i] == "El campo confirmación de password no coincide." )
							{
								vm.matchPassword = true
							}

						}
					}

					vm.awaitingResponse = false

				});
			}
			else{

			}
		},
		validate(){
			let vm = this
			let pass = true
			if (validateEmail(vm.registerDetails.email)){
				vm.errors.email=false
			}
			else
			{
				vm.errors.email = true
				pass=  false
			}

			if (validatePassword(vm.registerDetails.password)) {
				vm.errors.password = false
			}
			else
			{
				vm.errors.password = true
				pass = false
			}

			if (vm.registerDetails.password === vm.registerDetails.password_confirmation) {
				vm.errors.password_confirmation = false
			}
			else
			{
				vm.errors.password_confirmation = true
				pass = false
			}


			if (vm.privacy_polices) {
				vm.errors.privacy_polices = false
			}
			else
			{
				vm.errors.privacy_polices = true
				pass = false
			}
			return pass
		}

	}

}
</script>