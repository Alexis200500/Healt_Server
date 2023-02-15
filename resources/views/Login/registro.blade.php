<!DOCTYPE html>
<html lang="en">
<head>
	<title>Registrate</title>
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
          <br><br><br><br><br>
					<img src="{{ asset ('Login/images/vinicio.png') }}" alt="IMG">
				</div>

				<form action= "{{ route ('guarda_usuarios') }}" method="POST">
          {{csrf_field()}}

					<span class="login100-form-title">
						Crear tu cuenta
					</span>

          <div class="wrap-input100">
						<input class="input100" type="text" name="idusuario" value="{{$idesigue}}" placeholder="ID" disabled>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>
					@if($errors->first('nombre'))
					<p class="text-danger">{{$errors->first('nombre')}}</ide>
					@endif
					<div class="wrap-input100">
						<input class="input100" type="text" name="nombre" placeholder="Nombre">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>

					@if($errors->first('apellidop'))
					<p class="text-danger">{{$errors->first('apellidop')}}</ide>
					@endif
          			<div class="wrap-input100">
						<input class="input100" type="text" name="apellidop" placeholder="Apellido paterno">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>

					@if($errors->first('apellidom'))
					<p class="text-danger">{{$errors->first('apellidom')}}</ide>
					@endif
          			<div class="wrap-input100">
						<input class="input100" type="text" name="apellidom" placeholder="Apellido materno">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>

					@if($errors->first('fecha'))
					<p class="text-danger">{{$errors->first('fecha')}}</ide>
					@endif
          			<div class="wrap-input100">
					  <input type="date" class="input100" id="fechanacimiento" name="fechanacimiento" min="1930-01-01" max="2021-12-31">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>

					@if($errors->first('edad'))
					<p class="text-danger">{{$errors->first('edad')}}</ide>
					@endif
          			<div class="wrap-input100">
						<input class="input100" type="text" name="edad" id="edad" placeholder="Edad" readonly="readonly">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>

					@if($errors->first('sexo'))
					<p class="text-danger">{{$errors->first('sexo')}}</ide>
					@endif
          			<div class="wrap-input100">
						  	<div class="radios">
								<input type="radio" id="sexo1" name="sexo"  value = "M" checked=""> Masculino
								<input type="radio" id="sexo2" name="sexo"  value = "F"> Femenino
							</div>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100">
						<select class="input100" name="tiposangre">
							<option selected="selected" class="txtselect" value=""> Selecciona un tipo de sangre</option>
							<option class="txtselect" value="A positivo (A+)">A positivo (A+)</option>
							<option class="txtselect" value="A negativo (A-)">A negativo (A-)</option>
							<option class="txtselect" value="B positivo (B+)">B positivo (B+)</option>
							<option class="txtselect" value="B negativo (B-)">B negativo (B-)</option>
							<option class="txtselect" value="AB positivo (AB+)">AB positivo (AB+)</option>
							<option class="txtselect" value="AB negativo (AB-)">AB negativo (AB-)</option>
							<option class="txtselect" value="O positivo (O+)">O positivo (O+)</option>
							<option class="txtselect" value="O negativo (O-)">O negativo (O-)</option>
           				</select>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>

					@if($errors->first('telefono'))
					<p class="text-danger">{{$errors->first('telefono')}}</ide>
					@endif
          			<div class="wrap-input100">
						<input class="input100" type="text" name="telefono" placeholder="Ingresa tu telefono.">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-mobile" aria-hidden="true"></i>
							<i class=></i>
						</span>
					</div>



					

					@if($errors->first('email'))
					<p class="text-danger">{{$errors->first('email')}}</ide>
					@endif
					<div class="wrap-input100">
						<input class="input100" type="text" name="email" placeholder="Correo electrónico">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					@if($errors->first('password'))
					<p class="text-danger">{{$errors->first('password')}}</ide>
					@endif
					<div class="wrap-input100">
						<input class="input100" type="password" name="password" placeholder="Contraseña">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100">
						<select class="input100" name="idmun">
              <option selected="selected" class="txtselect"> Selecciona un municipio</option>
              @foreach ($municipios as $mun)
                <option value="{{$mun->idmun}}">{{$mun->nombre}}</option>
              @endforeach
            </select>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-home" aria-hidden="true"></i>
						</span>
					</div>

				<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button type="submit" class="login100-form-btn">
								Registrarte
							</button>
						</div>
					</div>

					<div class="text-center">
						<a class="txt2" href="{{ route('vistalogin') }}">
							Iniciar Sesión
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>




<!--===============================================================================================-->
	<script src="{{ URL::asset ('Login/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ URL::asset ('Login/vendor/bootstrap/js/popper.js') }}"></script>
	<script src="{{ URL::asset ('Login/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
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

	<style>
		.radios{
			margin-left: 60px;
		}
	</style>

	<script type="text/javascript">
		const fechanacimiento=document.getElementById("fechanacimiento");
		const edad=document.getElementById("edad");

		const calcularEdad=(fechanacimiento)=>{
		const fechaActual=new Date();
		const anoActual=parseInt(fechaActual.getFullYear());
		const mesActual=parseInt(fechaActual.getMonth()) + 1;
		const diaActual=parseInt(fechaActual.getDate());

		//Al capturar la fecha de nacimiento se guarda en el siguiente formato 2000-12-26
		//Necesitamos guardar el año, mes y día en varaibles distintas
		const anoNacimiento=parseInt(String(fechanacimiento).substring(0, 4))
		const mesNacimiento=parseInt(String(fechanacimiento).substring(5, 7))
		const diaNacimiento=parseInt(String(fechanacimiento).substring(8, 10))
			let edad = anoActual-anoNacimiento;
			if(mesActual < mesNacimiento) {
				edad--;
			} else if(mesActual === mesNacimiento) {
				if(diaActual < diaNacimiento) {
					edad--;
				}
			}
			document.getElementById("edad").value = edad;
			
			
		};

		window.addEventListener('load', function() {
			fechanacimiento.addEventListener('change', function() {
				if (this.value){
					edad.innerText=`La edad es: ${calcularEdad(this.value)} años`;
				}
				console.log(this.value);
			});
		});
	</script>

</body>
</html>
