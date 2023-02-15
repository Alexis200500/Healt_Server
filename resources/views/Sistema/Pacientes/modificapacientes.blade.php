@extends('plantilla')

@section('contenido')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-11 ml-auto mr-auto">
      <div class="card">
        <div class="card-header card-header-primary">
          <h4 class="card-title">Alta Paciente</h4>
          <p class="card-category">Completa este formulario</p>
        </div>
        <div class="card-body">
          <form action="{{ route ('guardarcambios')}}" method="POST" enctype = 'multipart/form-data'>
            {{csrf_field()}}
            <div class="row">
              <div class="col-md-2">
                <div class="form-group">
                  <label class="bmd-label-floating">Clave paciente</label>
                  <input type="text" class="form-control" value="{{$consulta->idusuario}}" name="idusuario" readonly="readonly">
                </div>
              </div>

            </div>

              <div class="row">

              <div class="col-md-3">
                <div class="form-group">
                  <label class="bmd-label-floating">Nombre</label>
                  <input type="text" class="form-control" value="{{$consulta->nombre}}" name="nombre" readonly="readonly">
                  @if($errors->first('nombre'))
                        <p class="text-danger"> {{$errors->first('nombre')}} </p>
                        @endif
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  <label class="bmd-label-floating">Apellido Paterno</label>
                  <input type="text" class="form-control" value="{{$consulta->apellidop}}" name="apellidop" readonly="readonly">
                  @if($errors->first('apellidop'))
                        <p class="text-danger"> {{$errors->first('apellidop')}} </p>
                        @endif
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  <label class="bmd-label-floating">Apellido Materno</label>
                  <input type="text" class="form-control" value="{{$consulta->apellidom}}" name="apellidom" readonly="readonly">
                  @if($errors->first('apellidom'))
                    <p class="text-danger">{{$errors->first('apellidom')}}</p>
                  @endif
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  <label class="bmd-label">Fecha de nacimiento</label>
                  <input type="date" class="form-control" value="{{$consulta->fechanacimiento}}" name="fechanacimiento" readonly="readonly">
                  @if($errors->first('fecha'))
                    <p class="text-danger">{{$errors->first('fecha')}}</p>
                  @endif
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  <label class="bmd-label-floating">Edad</label>
                  <input type="text" class="form-control" value="{{$consulta->edad}}" name="edad" readonly="readonly">
                  @if($errors->first('edad'))
                    <p class="text-danger">{{$errors->first('edad')}}</p>
                  @endif
                </div>
              </div>
            </div>

            <div class="row">

              <div class="col-md-3">
                <div class="form-group">
                  <label class="">Sexo</label>
                  <div>
                  @if($consulta->sexo=='F')
                      <input type="radio" id="sexo1" name="sexo"  value = "M"> Masculino
                      <input type="radio" id="sexo2" name="sexo"  value = "F" checked=""> Femenino
                  @else
                      <input type="radio" id="sexo1" name="sexo"  value = "M" checked=""> Masculino
                      <input type="radio" id="sexo2" name="sexo"  value = "F"> Femenino
                  @endif
                    </div>
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  <label class="bmd-label-floating">Tipo de Sangre</label>
                  <input type="text" class="form-control" value="{{$consulta->tiposangre}}" name="tiposangre" readonly="readonly">
                  @if($errors->first('tiposangre'))
                    <p class="text-danger">{{$errors->first('tiposangre')}}</p>
                  @endif
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  <label class="bmd-label-floating">Seleccione su municipio</label>
                  <select class="custom-select" name="idmun">
                    <option value="{{$consulta->idmun}}">{{$consulta->m}}</option>
                             @foreach ($municipios as $m)
                             <option value="{{$m->idmun}}">{{$m->nombre}}</option>
                             @endforeach
                    
                  </select>
                </div>
              </div>

            </div>

            <div class="row">

                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">Telefono</label>
                    <input type="text" class="form-control" value="{{$consulta->telefono}}" name="telefono">
                    @if($errors->first('telefono'))
                          <p class="text-danger"> {{$errors->first('telefono')}} </p>
                          @endif
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">Correo electronico</label>
                    <input type="text" class="form-control" value="{{$consulta->email}}" name="email">
                    @if($errors->first('email'))
                          <p class="text-danger"> {{$errors->first('email')}} </p>
                          @endif
                  </div>
                  
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">Contraseña</label>
                    <input class="form-control" type="password" value="{{$consulta->password}}" name="password">
                    @if($errors->first('password'))
                          <p class="text-danger"> {{$errors->first('password')}} </p>
                          @endif
                  </div>
                  
                </div>
            </div>
            


            <button type="submit" class="btn btn-primary pull-right">Guardar paciente</button>
            <a href="{{route('consulta_usuarios')}}"
              <button type="submit" class="btn btn-primary pull-right">Salir</button>
            </a>
            <div class="clearfix"></div>
          </form>
        </div>
      </div>
    </div>

  </div>
</div>


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

@stop
