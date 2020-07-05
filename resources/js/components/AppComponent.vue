<template>
	<div>
<sidebar></sidebar>

		<main class="py-4">
			<div id="main">

				<router-link :to= "{name: 'home'}">Home</router-link>
					<router-view></router-view>



			</div>
		</main>

	</div>
</template>

<script>
export default {

	data() {
		return{

		}
	},

	methods: {

	}

}
</script>

