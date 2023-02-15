<!DOCTYPE html>
<html lang="en">
<head>
	<title>Clinica San Miguel</title>
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
				<div class="login100-pic js-tilt" data-tilt><br><br><br><br>
					<img src="{{ asset ('Login/images/vinicio.png') }}" alt="IMG">
				</div>

				<form action="{{ route ('valida') }}" method="POST">
          {{ csrf_field() }}
					<span class="login100-form-title">
						Iniciar Sesión
					</span>
					@if (session('mensaje'))
					<div class="alert alert-success">
					{{ session('mensaje') }}
					</div>
					@endif

					<div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="email" placeholder="Correo electrónico">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>
					@if($errors->first('email'))
					<p class="text-danger">{{$errors->first('email')}}</ide>
					@endif


					<div class="wrap-input100 validate-input">
						<input class="input100" type="password" name="password" placeholder="Contraseña">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					@if($errors->first('password'))
					<p class="text-danger">{{$errors->first('password')}}</ide>
					@endif


					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn">
								Ingresar
							</button>
						</div>
					</div>
					<!--<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
					</div>-->

					<div class="text-center p-t-12">
						<span class="txt1">
							¿Olvidaste tu contraseña?
						</span>
						<a class="txt2" href="{{route('restaurar')}}">
							/ Recuperar
						</a>
					</div>
					<br>

					@if (session('status'))
					<div class="alert alert-danger">
					{{ session('status') }}
					</div>
					@endif


					<div class="text-center">

						<a class="txt2" href="{{ route('/') }}">
							<i class="fa fa-long-arrow-left m-l-5" aria-hidden="true"></i>
							Regresar a página principal
						</a>
						<br>
						<a class="txt2" href="{{ route('alta_usuarios') }}">
							Crear cuenta nueva
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
						<br>
						
					</div>
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
