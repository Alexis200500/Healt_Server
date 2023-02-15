@extends('plantilla')

@section('contenido')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-11 ml-auto mr-auto">
      <div class="card">
        <div class="card-header card-header-primary">
          <h4 class="card-title">Alta Medico</h4>
          <p class="card-category">Completa este formulario</p>
        </div>
        <div class="card-body">
          <form action="{{ route ('guardar_medicos')}}" method="POST" enctype = 'multipart/form-data'>
            {{csrf_field()}}
            <div class="row">
              <div class="col-md-2">
                <div class="form-group">
                  <label class="bmd-label-floating">Clave Medico</label>
                  <input type="text" class="form-control" value="{{$idesigue}}"  name="idmedico" disabled>
                </div>
              </div>

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
                  <input type="text" class="form-control" value="{{old('appaterno')}}" name="appaterno">
                  @if($errors->first('appaterno'))
                        <p class="text-danger"> {{$errors->first('appaterno')}} </p>
                        @endif
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  <label class="bmd-label-floating">Apellido Materno</label>
                  <input type="text" class="form-control" value="{{old('apmaterno')}}" name="apmaterno">
                  @if($errors->first('apmaterno'))
                    <p class="text-danger">{{$errors->first('apmaterno')}}</p>
                  @endif
                </div>
              </div>
              <div class="col-md-1">
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

              <div class="col-md-4">
                <div class="form-group">
                  <label class="bmd-label-floating">Telefono</label>
                  <input type="text" class="form-control" value="{{old('telefono')}}" name="telefono">
                  @if($errors->first('telefono'))
                    <p class="text-danger">{{$errors->first('telefono')}}</p>
                  @endif
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label class="bmd-label-floating">Correo Electronico</label>
                  <input type="text" class="form-control" value="{{old('correo')}}" name="correo">
                  @if($errors->first('correo'))
                    <p class="text-danger">{{$errors->first('correo')}}</p>
                  @endif
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label class="bmd-label-floating">Contraseña</label>
                  <input type="password" class="form-control" value="{{old('password')}}" name="password">
                  @if($errors->first('password'))
                    <p class="text-danger">{{$errors->first('password')}}</p>
                  @endif
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  <label class="">Sexo</label>
                  <div>
                      <input type="radio" id="sexo1" name="sexo"  value = "M" checked=""> Masculino
                      <input type="radio" id="sexo2" name="sexo"  value = "F"> Femenino
                    </div>
                </div>
              </div>

            </div>

            <div class="row">

                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">Calle</label>
                    <input type="text" class="form-control" value="{{old('calle')}}" name="calle">
                    @if($errors->first('calle'))
                          <p class="text-danger"> {{$errors->first('calle')}} </p>
                          @endif
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">Numero Exterior</label>
                    <input type="text" class="form-control" value="{{old('numext')}}" name="numext">
                    @if($errors->first('numext'))
                          <p class="text-danger"> {{$errors->first('numext')}} </p>
                          @endif
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">Numero Interior</label>
                    <input type="text" class="form-control" value="{{old('numint')}}" name="numint">
                    @if($errors->first('numint'))
                      <p class="text-danger">{{$errors->first('numint')}}</p>
                    @endif
                  </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                      <label class="bmd-label-floating">Municipio</label>
                      <select class="custom-select" name="idmun" >
                        <option selected="selected" class="txtselect" value="{{old('idmun')}}"> Selecciona un municipio</option>
                          @foreach($municipios as $mun)
                          <option value="{{$mun->idmun}}">{{$mun->nombre}}</option>
                          @endforeach
                      </select>
                      @if($errors->first('idmun'))
                       <p class='text-danger'>{{$errors->first('idmun')}}</p>
                      @endif
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label class="bmd-label-floating">Especialidad</label>
                      <select class="custom-select" name="idesp" >
                        <option selected="selected" class="txtselect" value="{{old('idesp')}}"> Selecciona una especialidad</option>
                          @foreach($especialidades as $esp)
                          <option value="{{$esp->idesp}}">{{$esp->especialidad}}</option>
                          @endforeach
                      </select>
                      @if($errors->first('idesp'))
                       <p class='text-danger'>{{$errors->first('idesp')}}</p>
                      @endif
                    </div>
                  </div>

            </div>

            <div class="row">

                <div class="col-md-5">
                  <div class="form-group">
                    <label class="bmd-label-floating">Colonia</label>
                    <input type="text" class="form-control" value="{{old('colonia')}}" name="colonia">
                    @if($errors->first('colonia'))
                          <p class="text-danger"> {{$errors->first('colonia')}} </p>
                          @endif
                  </div>
                </div>



                <div class="col-md-3">
                  <div class="form-group">
                    <label class="">Hora de entrada</label>
                    <input type="time" class="form-control" value="{{old('hora_entrada')}}" name="hora_entrada">
                    @if($errors->first('hora_entrada'))
                          <p class="text-danger"> {{$errors->first('hora_entrada')}} </p>
                          @endif
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="form-group">
                    <label class="">Hora de salidad</label>
                    <input type="time" class="form-control" value="{{old('hora_salida')}}" name="hora_salida">
                    @if($errors->first('hora_salida'))
                      <p class="text-danger">{{$errors->first('hora_salida')}}</p>
                    @endif
                  </div>
                </div>
            </div>

            <div class="row">

                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">Foto de perfil</label>
                    <input type="file" name="img" id="img"  tabindex="6">
                    @if($errors->first('img'))
                          <p class="text-danger"> {{$errors->first('img')}} </p>
                          @endif
                  </div>
                </div>
            </div>


            {{-- <div class="col-md-4">
              <div class="form-group">
                <label class="bmd-label-floating">Estatus</label>
                <select class="form-control" name="idstatus" >
                  <option selected="selected" class="txtselect" value="{{old('idstatus')}}">Estatus de tu consulta</option>
                    @foreach($statuses as $stat)
                    <option value="{{$stat->idstatus}}">{{$stat->nombre}}</option>
                    @endforeach
                </select>
                @if($errors->first('idstatus'))
                    <p class="text-danger">{{$errors->first('idstatus')}}</p>
                  @endif
              </div>
            </div> --}}

            <button type="submit" class="btn btn-primary pull-right">Guardar medico</button>
            <a href="{{route('consulta_medicos')}}"
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
