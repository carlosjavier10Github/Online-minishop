<template>
	<div>

		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card">
					<div class="card-header"> Mi Perfil </div>

					<div class="card-body">





						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon1">Nombre</span>
							</div>
							<input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1"
							v-model="user.name">
						</div>







					</div>
				</div>
			</div>
		</div>















	</div>
</template>

<script>
export default {

	data() {
		return{
			user: {name:'Carlos Molina'},

		}
	},

	methods: {

	}

}
</script>