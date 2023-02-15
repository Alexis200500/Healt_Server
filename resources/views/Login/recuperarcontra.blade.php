<!DOCTYPE html>
<html lang="en">
<head>
	<title>Farmicheck</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="{{ URL::asset ('Login/images/icons/favicon.ico') }}"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ URL::asset ('Login/vendor/bootstrap/css/bootstrap.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ URL::asset ('Login/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ URL::asset ('Login/vendor/animate/animate.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ URL::asset ('Login/vendor/css-hamburgers/hamburgers.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ URL::asset ('Login/vendor/select2/select2.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ URL::asset ('Login/css/util.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ URL::asset ('Login/css/main.css') }}">
<!--===============================================================================================-->
</head>
<body>

	<div class="limiter">
		<div class="container-login100" style="background-image: url({{url('Login/images/fondo1.jpg')}}">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<br><br>
					<img src="{{ asset ('Login/images/clinicalogo.png') }}" alt="IMG">
				</div>

				<form action="{{ route ('restaurarc') }}" method="GET">
          {{ csrf_field() }}
					<span class="login100-form-title">
						RESTAURACIÓN DE CONTRASEÑA
					</span>
          <p>
            En este apartado tendras que ingresar tu email,<br>
            al cual se enviara tu nueva contraseña.
          </p>
          <br>


					<div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="email" placeholder="Ingresa tu correo electrónico">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>


					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn col-sm-10">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn">
								Restaurar contraseña
							</button>
						</div>
					</div>
					<br>
					@if (session('estado'))
					<div class="alert alert-danger">
					{{ session('estado') }}
					</div>
					@endif

					<div class="text-center p-t-12">
						<span class="txt1">
							Volver
						</span>
						<a class="txt2" href="{{route('/')}}">
							/ Volver a login
						</a>
					</div>
					<br>
				</form>
			</div>
		</div>
	</div>




<!--===============================================================================================-->
	<script src="{{ URL::asset ('Login/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ URL::asset ('Login/vendor/bootstrap/js/popper.js') }}"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="{{ URL::asset ('Login/vendor/select2/select2.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ URL::asset ('Login/vendor/tilt/tilt.jquery.min.js') }}"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="{{ URL::asset ('Login/js/main.js') }}"></script>

</body>
</html>
