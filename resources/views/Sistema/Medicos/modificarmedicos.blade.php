@extends('plantilla')

@section('contenido')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-11 ml-auto mr-auto">
      <div class="card">
        <div class="card-header card-header-primary">
          <h4 class="card-title">Modificar Medico</h4>
          <p class="card-category">Completa este formulario</p>
        </div>
        <div class="card-body">
          <form action="{{ route ('cambio_medicos')}}" method="POST" enctype = 'multipart/form-data'>
            {{csrf_field()}}
            <div class="row">
              <div class="col-md-2">
                <div class="form-group">
                  <label class="bmd-label-floating">Clave Medico</label>
                 @if($errors->first('idmedico'))
                        <i class="text-danger"> {{$errors->first('idmedico')}} </i>
                        @endif
                <input type="text" class="form-control" value="{{$consulta->idmedico}}"  name="idmedico" readonly="readonly">
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  <label class="bmd-label-floating">Nombre</label>
                    <input type="text" class="form-control" value="{{$consulta->nombre}}" name="nombre">
                  @if($errors->first('nombre'))
                        <p class="text-danger"> {{$errors->first('nombre')}} </p>
                        @endif
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  <label class="bmd-label-floating">Apellido Paterno</label>
                    <input type="text" class="form-control" value="{{$consulta->appaterno}}" name="appaterno">
                  @if($errors->first('appaterno'))
                        <p class="text-danger"> {{$errors->first('appaterno')}} </p>
                        @endif
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  <label class="bmd-label-floating">Apellido Materno</label>
                    <input type="text" class="form-control" value="{{$consulta->apmaterno}}" name="apmaterno">
                  @if($errors->first('apmaterno'))
                    <p class="text-danger">{{$errors->first('apmaterno')}}</p>
                  @endif
                </div>
              </div>
              <div class="col-md-1">
                <div class="form-group">
                  <label class="bmd-label-floating">Edad</label>
                    <input type="text" class="form-control" value="{{$consulta->edad}}" name="edad">
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
                    <input type="text" class="form-control" value="{{$consulta->telefono}}" name="telefono">
                  @if($errors->first('telefono'))
                    <p class="text-danger">{{$errors->first('telefono')}}</p>
                  @endif
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label class="bmd-label-floating">Correo Electronico</label>
                    <input class="form-control" name="correo" value="{{$consulta->correo}}" type="email">
                  @if($errors->first('correo'))
                    <p class="text-danger">{{$errors->first('correo')}}</p>
                  @endif
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label class="bmd-label-floating">Contraseña</label>
                    <input class="form-control" name="password" type="password" value="{{$consulta->password}}">
                  @if($errors->first('password'))
                    <p class="text-danger">{{$errors->first('password')}}</p>
                  @endif
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                   @if($consulta->sexo=='F')
                        <div id="gender" class="btn-group" data-toggle="buttons">
                            <p>Masculino:
                                <input type="radio" class="flat" name="sexo" id="genderM" value="M"
                                    required />
                                Femenino:<input type="radio" class="flat" name="sexo" id="genderF" value="F" checked="" />
                            </p>
                        </div>
                        @else
                        <div id="gender" class="btn-group" data-toggle="buttons">
                            <p>Masculino:
                                <input type="radio" class="flat" name="sexo" id="genderM" value="M" checked=""
                                    required />
                                Femenino:<input type="radio" class="flat" name="sexo" id="genderF" value="F" />
                            </p>
                        </div>
                    @endif
                </div>
              </div>

            </div>

            <div class="row">

                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">Calle</label>
                        <input type="text" class="form-control" value="{{$consulta->calle}}" name="calle">
                    @if($errors->first('calle'))
                          <p class="text-danger"> {{$errors->first('calle')}} </p>
                          @endif
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">Numero Exterior</label>
                        <input type="text" class="form-control" value="{{$consulta->numext}}" name="numext">
                    @if($errors->first('numext'))
                          <p class="text-danger"> {{$errors->first('numext')}} </p>
                          @endif
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">Numero Interior</label>
                        <input type="text" class="form-control" value="{{$consulta->numint}}" name="numint">
                    @if($errors->first('numint'))
                      <p class="text-danger">{{$errors->first('numint')}}</p>
                    @endif
                  </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                      <label class="bmd-label-floating">Municipio</label>
              <select name='idmun' class="custom-select">
                             <option value="{{$consulta->idmun}}">{{$consulta->m}}</option>
                             @foreach ($municipios as $m)
                             <option value="{{$m->idmun}}">{{$m->nombre}}</option>
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
                    <select name='idesp' class="custom-select">
                             <option value="{{$consulta->idesp}}">{{$consulta->especi}}</option>
                             @foreach ($especialidades as $especi)
                             <option value="{{$especi->idesp}}">{{$especi->especialidad}}</option>
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
                        <input type="text" class="form-control" value="{{$consulta->colonia}}" name="colonia">

                    @if($errors->first('colonia'))
                          <p class="text-danger"> {{$errors->first('colonia')}} </p>
                          @endif
                  </div>
                </div>



                <div class="col-md-3">
                  <div class="form-group">
                    <label class="">Hora de entrada</label>
                        <input class="form-control" name="hora_entrada" type="time" value="{{$consulta->hora_entrada}}">
                    @if($errors->first('hora_entrada'))
                          <p class="text-danger"> {{$errors->first('hora_entrada')}} </p>
                          @endif
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="form-group">
                    <label class="">Hora de salidad</label>
                    <input class="form-control" name="hora_salida" type="time" value="{{$consulta->hora_salida}}">
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
                    <img src="{{ asset('archivos/'. $consulta->img)}}" height="150" witd="150">
                        @if($errors->first('img'))
                        <p class="text-danger"> {{$errors->first('img')}} </p>
                        @endif
                        <input type="file" name="img" id="img">
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
            <a href="{{route('reporteconsultas')}}"
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
