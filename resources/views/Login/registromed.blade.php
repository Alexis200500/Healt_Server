<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="{{ URL::asset ('Login/css/estilo.css') }}">
    <title>Registro médico</title>
</head>
<body>
    <div class="container">
        <div class="wrapper">
          <ul class="steps">
            <li class="is-active">Paso 1</li>
            <li>Paso 2</li>
            <li>Paso 3</li>
          </ul>
          <form class="form-wrapper" action="{{ route ('guardarmedico')}}" method="POST" enctype = 'multipart/form-data'>
            {{csrf_field()}}

            <fieldset class="section is-active">
              <h3>Información personal</h3>
              <input type ="text" name ="idmedico" id="idmedico" value="{{$idsigue}}" readonly="readonly">
              <input type="text" name="nombre" id="nombre" placeholder="Nombre(s)">


              <input type="text" name="appaterno" id="appaterno" placeholder="Apellido paterno">


              <input type="text" name="apmaterno" id="apmaterno" placeholder="Apellido materno">


              <select name="localidad">
                <option selected="selected"> Selecciona una localidad</option>
                <option value="La concepción">1. La concepción</option>
                <option value="San Francisco">2. San Francisco</option>
                <option value="Barrio de Guadalupe">3. Barrio de Guadalupe</option>
                <option value="San Juan">4. San Juan</option>
                <option value="San Isidro">5. San Isidro</option>
                <option value="San Lucas">6. San Lucas</option>
                <option value="La Magdalena">7. La Magdalena</option>
                <option value="Santa María">8. Santa María</option>
                <option value="San Miguel">9. San Miguel</option>
                <option value="San Nicolás">10. San Nicolás</option>
                <option value="San Pedro y San Pablo">11. San Pedro y San Pablo</option>
                <option value="Santiago">12. Santiago</option>
                <option value="Santa Juanita">13. Santa Juanita</option>
              </select>

            <input type="text" name="telefono" id="telefono" placeholder="Teléfono">


            <select name="sexo">
              <option selected="selected"> Selecciona tu sexo</option>
              <option value="Femenino">Femenino</option>
              <option value="Masculino">Masculino</option>
              <option value="Sinvalor">Prefiero no decirlo</option>
            </select>

              <div class="button">Siguiente</div>
            </fieldset>
            <fieldset class="section">
              <h3>Información profesional</h3>

              <select name="idesp">
                <option selected="selected"> Selecciona tu especialidad</option>
                @foreach($especialidades as $esp)
                <option value="{{$esp->idesp}}">{{$esp->especialidad}}</option>
                @endforeach
              </select>

              <input type="text" name="cedula" id="cedula" placeholder="Número de cédula">

              <p> Hora de inicio de servicio: </p>
              <input type="time" name="horainicio" id="horarioi" >

              <p> Hora de término de servicio: </p>
              <input type="time" name="horafin" id="horariof" >

              <p>Dirección de la clinica</p>
              <input type = text name="direccionclinica" id="direccionclinica">

              <div class="button">Siguiente</div>
            </fieldset>

            <fieldset class="section">
              <h3>Perfil</h3>

              <h5> Foto de peril:</h5>
              <input type="file" name="img" id="img" >

              <input type="text" name="email" id="email" placeholder="Correo electronico">

              <input type="password" name="password" id="password" placeholder="Contraseña">

              <button type="submit"  value="Registrarse">Registro</button>
            </fieldset>
          </form>
        </div>
      </div>
      <script src="{{ URL::asset ('Login/js/app.js') }}"></script>
</body>
</html>
