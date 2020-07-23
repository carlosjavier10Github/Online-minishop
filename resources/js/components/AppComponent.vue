<template>
	<div>
<sidebar></sidebar>
<topbar></topbar>
		<main class="py-4">
			<div id="main">

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

