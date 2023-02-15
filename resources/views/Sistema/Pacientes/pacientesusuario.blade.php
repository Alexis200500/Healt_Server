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
          <form action="{{ route ('guardarpacientes')}}" method="POST" enctype = 'multipart/form-data'>
            {{csrf_field()}}
            <div class="row">
              <div class="col-md-2">
                <div class="form-group">
                  <label class="bmd-label-floating">Clave paciente</label>
                  <input type="text" class="form-control" value="{{$idesigue}}"   name="idpaciente" disabled>
                </div>
              </div>

            </div>

              <div class="row">

              <div class="col-md-3">
                <div class="form-group">
                  <label class="bmd-label-floating">Nombre</label>
                  <input type="text" class="form-control" value="{{old('nombre')}}" name="nombre">
                  @if($errors->first('nombre'))
                        <p class="text-danger"> {{$errors->first('nombre')}} </p>
                        @endif
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  <label class="bmd-label-floating">Apellido Paterno</label>
                  <input type="text" class="form-control" value="{{old('apellidop')}}" name="apellidop">
                  @if($errors->first('apellidop'))
                        <p class="text-danger"> {{$errors->first('apellidop')}} </p>
                        @endif
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  <label class="bmd-label-floating">Apellido Materno</label>
                  <input type="text" class="form-control" value="{{old('apellidom')}}" name="apellidom">
                  @if($errors->first('apellidom'))
                    <p class="text-danger">{{$errors->first('apellidom')}}</p>
                  @endif
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label class="bmd-label-floating">Edad</label>
                  <input type="text" class="form-control" value="{{old('edad')}}" name="edad">
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
                      <input type="radio" id="sexo1" name="sexo"  value = "M" checked=""> Masculino
                      <input type="radio" id="sexo2" name="sexo"  value = "F"> Femenino
                    </div>
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  <label class="bmd-label-floating">Tipo de sangre</label>
                  <select class="custom-select" name="tiposangre">
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

                </div>
              </div>

            </div>

            <div class="row">

                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">Telefono</label>
                    <input type="text" class="form-control" value="{{old('telefono')}}" name="telefono">
                    @if($errors->first('telefono'))
                          <p class="text-danger"> {{$errors->first('telefono')}} </p>
                          @endif
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">Correo electronico</label>
                    <input type="text" class="form-control" value="{{old('correo')}}" name="correo">
                    @if($errors->first('correo'))
                          <p class="text-danger"> {{$errors->first('correo')}} </p>
                          @endif
                  </div>
                </div>
            </div>


            <button type="submit" class="btn btn-primary pull-right">Guardar paciente</button>
            <a href="{{route('valida')}}"
              <button type="submit" class="btn btn-primary pull-right">Salir</button>
            </a>
            <div class="clearfix"></div>
          </form>
        </div>
      </div>
    </div>

  </div>
</div>
@stop
