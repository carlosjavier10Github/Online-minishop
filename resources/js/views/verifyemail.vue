<template>
	<div>

		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card">
					<div class="card-header"> {{lang.title}}  </div>
					<div class="card-body">
						{{lang.message}}
						{{lang.resend_message}}
						<a href='#'   v-on:click.stop.prevent="resendMail()">
							{{lang.button_text}}
						</a>

						<div class="card-text alert alert-success" v-if="sent" v-text="lang.sent">

						</div>

						<div class="card-text alert alert-danger" v-if="errors.recently_sent" v-text="lang.error_recently_sent">

						</div>

					</div>
				</div>
			</div>
		</div>

	</div>
</template>

<script>
import { fullPath,language} from '../utils'
export default {
	props:  ['lasted_email_sent'],

	data() {
		return{
			lang: language.verifyemail,
			sent: false,
			errors:{recently_sent : false},
			sending: false,
		}
	},
	created(){
		let vm = this
		let now = moment(moment(), "America/Caracas")
		let datemailsent = moment(vm.lasted_email_sent)
		if (vm.lasted_email_sent != null) {

			let duration = now.diff(datemailsent,'hours')
			if (duration < 30 ) {
				vm.errors.recently_sent = true
			}
		}
	},
	methods: {
		resendMail:function(){
			let vm = this
			if (vm.sent)
			{
				vm.errors.recently_sent== true

			}
			if (vm.errors.recently_sent == false)
			{
				if (!vm.sending)
				{
					vm.sending=true
					let url = fullPath+"/email/resend"

					axios.post(url).then(function(response)
					{
						if (response.status != undefined)
						{
							if (response.status == 202)
							{
								vm.sent=true
							}
						}
						if (response.data.message == 'recently sent')
						{
							vm.errors.recently_sent = true
						}
					})
					.catch(function(err){
						console.log(err)
					});
				}
				else
				{
					vm.errors.recently_sent = true

				}
			}
		}
	}
}
</script>