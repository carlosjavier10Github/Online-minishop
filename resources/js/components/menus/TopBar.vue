<template>
	<div>   <!-- NO ESTA EN USO, PARA FUTURA IMPLEMENTACION -->
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
								<a class="nav-link" href="#"> Login</a>
							</li>
							<!-- @if (Route::has('register')) -->
							<li class="nav-item">
								<a class="nav-link" href="#"> Registrar </a>
							</li>
							<!--    @endif -->
						</div>
						<!--      @else -->
						<li class="nav-item dropdown" v-else>
							<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
								<!-- {{ Auth::user()->name }} --> name <span class="caret"></span>
							</a>

							<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="logout"
								onclick="event.preventDefault();
								document.getElementById('logout-form').submit();">
								<!-- {{ __('Logout') }} --> logout
							</a>

							<form id="logout-form" action="" method="POST" style="display: none;">
								<!-- @csrf -->
							</form>
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
export default {

	data() {
		return{
			guest:true

		}
	},

	methods: {

	}

}
</script>

