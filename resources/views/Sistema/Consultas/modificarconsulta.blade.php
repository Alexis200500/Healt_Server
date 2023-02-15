@extends('plantilla')

@section('contenido')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-10 ml-auto mr-auto">
      <div class="card">
        <div class="card-header card-header-primary">
          <h4 class="card-title">Modificar Consulta</h4>
          <p class="card-category">Modifica tus datos.</p>
        </div>
        <div class="card-body">
          <form action="{{ route ('guardacambios')}}" method="POST">
            {{csrf_field()}}
            <?php $sessiontipou = session('sessiontipo'); ?>
          
            <div class="row">
              <div class="col-md-5">
                <div class="form-group">
                  <label class="bmd-label-floating">Clave consulta</label>
                  <input type="text" name="idconsulta" class="form-control" id="idconsulta" value="{{$consulta->idconsulta}}" readonly="readonly">

                </div>
              </div>
              <div class="col-md-5">
                <div class="form-group">
                  <label class="bmd-label-floating">Paciente</label>
                  <input type="text" name="paciente" class="form-control" id="paciente" value="{{$consulta->paciente}}" readonly="readonly">

                </div>
              </div>
              
              <div class="col-md-3">
                <div class="form-group">
                  <label class="bmd-label-floating">Área de especialización</label>
                  <select class="form-control" name="idesp">
                     <option selected="selected" class="txtselect"value="{{$consulta->idesp}}">{{$consulta->esp}}</option>
                         @foreach($especialidades as $esp)
                          <option value="{{$esp->idesp}}">{{$esp->especialidad}}</option>
                        @endforeach
                  </select>
                   @if($errors->first('idesp'))
                   <p class='text-danger'>{{$errors->first('idesp')}}</p>
                  @endif
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label class="bmd-label-floating">Médico</label>
                  <select class="form-control" name="idmedico">
                    <option selected="selected" value="{{$consulta->idmedico}}" class="txtselect">{{$consulta->nombre}} {{$consulta->appaterno}} {{$consulta->apmaterno}}</option>
                      @foreach($Medico as $medico)
                      <option value="{{$medico->idmedico}}">{{$medico->nombre}} {{$medico->appaterno}} {{$medico->apmaterno}}</option>
                      @endforeach
                  </select>
                  @if($errors->first('idmedico'))
                   <p class='text-danger'>{{$errors->first('idmedico')}}</p>
                  @endif
                </div>
              </div>

            </div>

            <div class="row">
              <div class="col-md-5">
                <div class="form-group">
                  <label class="">Fecha de consulta</label>
                  <input type="text" name="fecha_consulta" class="form-control" id="fecha_consulta" value="{{$consulta->fecha_consulta}}">
                  @if($errors->first('fecha_consulta'))
                    <p class="text-danger">{{$errors->first('fecha_consulta')}}</p>
                  @endif
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  <label class="bmd-label-floating">Hora de consulta</label>
                  <input type="text" name="hora_consulta" class="form-control" id="hora_consulta" value="{{$consulta->hora_consulta}}">
                  @if($errors->first('hora_consulta'))
                    <p class="text-danger">{{$errors->first('hora_consulta')}}</p>
                  @endif
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label class="bmd-label-floating">Peso aprox</label>
                  <input type="text" class="form-control" name="peso" id="peso" value="{{$consulta->peso}}">
                   @if($errors->first('peso'))
                    <p class="text-danger">{{$errors->first('peso')}}</p>
                  @endif
                </div>
              </div>

            </div>
            @if($sessiontipou=="administrador")
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Observaciones</label>
                  <div class="form-group">
                    <label class="bmd-label-floating"> Comentanos algunos de tus sintomas</label>
                <textarea class="form-control" rows="3" id="obser" name="obser" >{{$consulta->observacion}}</textarea>
                  </div>
                </div>
              </div>
            </div>
          
          
            <div class="col-md-4">
              <div class="form-group">
                <label class="bmd-label-floating">Estatus</label>
                <select class="form-control" name="idstatus">
                    <option selected="selected" class="txtselect"value="{{$consulta->idstatus}}">{{$consulta->stat}}</option>
                        @foreach($statuses as $stat)
                            <option value="{{$stat->idstatus}}">{{$stat->nombre}}</option>
                        @endforeach
                </select>
                @if($errors->first('idstatus'))
                    <p class="text-danger">{{$errors->first('idstatus')}}</p>
                  @endif
              </div>
            </div>
            @endif
            <input type="submit" value="Guardar datos" class="btn btn-primary pull-right" tabindex="7"
                title="Guardar datos ingresados">
                <a href="{{route('reporte_consultas')}}"
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
