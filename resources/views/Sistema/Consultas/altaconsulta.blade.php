@extends('plantilla')

@section('contenido')
<?php 
        
        $sessionnombre = session('sessionnombre');
        ?>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-10 ml-auto mr-auto">
      <div class="card">
        <div class="card-header card-header-primary">
          <h4 class="card-title">Alta consulta</h4>
          <p class="card-category">Completa este formulario </p>
        </div>
        <div class="card-body">
          <form action="{{ route ('guardarconsulta')}}" method="POST">
            {{csrf_field()}}
            <div class="row">
              <div class="col-md-5">
                <div class="form-group">
                  <label class="bmd-label-floating">Clave consulta</label>
                  <input type="text" class="form-control" value="{{$idsigue}}" name="idconsulta" readonly="readonly">
                </div>
              </div>
              <?php $sessiontipou = session('sessiontipo'); ?>
              @if($sessiontipou=="administrador")
                <div class="col-md-5">
                  <div class="form-group">
                    <label class="bmd-label-floating">Paciente:</label>
                      <input type="text" class="form-control" value="" name="paciente" id="paciente">
                  </div>
                </div>
              @else
              
                <div class="col-md-5">
                  <div class="form-group">
                    <label class="bmd-label-floating">Paciente:</label>
                      <input type="text" class="form-control" value="<?php echo $sessionnombre?>" name="paciente" id="paciente" readonly="readonly">
                  </div>
                </div>
              @endif
              <div class="col-md-3">
                <div class="form-group">
                  <label class="bmd-label-floating">Área de especialización</label>
                  <select class="custom-select" name="idesp">
                    <option selected="selected" class="txtselect" value="{{old('idesp')}}"> Selecciona un área</option>
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
                  <select class="custom-select" name="idmedico" >
                    <option selected="selected" class="txtselect" value="{{old('idmedico')}}"> Selecciona un médico</option>
                      @foreach($Medico as $med)
                      <option value="{{$med->idmedico}}">{{$med->nombre}} {{$med->appaterno}} {{$med->apmaterno}}</option>
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
                  <input type="date" class="form-control" value="{{old('fecha_consulta')}}" name="fecha_consulta">
                  @if($errors->first('fecha_consulta'))
                    <p class="text-danger">{{$errors->first('fecha_consulta')}}</p>
                  @endif
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  <label class="bmd-label-floating">Hora de consulta</label>
                  <input type="text" class="form-control" value="{{old('hora_consulta')}}" name="hora_consulta">
                  @if($errors->first('hora_consulta'))
                    <p class="text-danger">{{$errors->first('hora_consulta')}}</p>
                  @endif
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label class="bmd-label-floating">Peso aprox</label>
                  <input type="text" class="form-control" value="{{old('peso')}}" name="peso">
                  @if($errors->first('peso'))
                    <p class="text-danger">{{$errors->first('peso')}}</p>
                  @endif
                </div>
              </div>

            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Observaciones</label>
                  <div class="form-group">
                    <label class="bmd-label-floating"> Comentanos algunos de tus sintomas</label>
                    <textarea class="form-control" rows="3" value="{{old('obser')}}" name="obser" id="obser"></textarea>
                     @if($errors->first('obser'))
                    <p class="text-danger">{{$errors->first('obser')}}</p>
                  @endif
                  </div>
                </div>
              </div>
            </div>

            

            <button type="submit" class="btn btn-primary pull-right">Guardar consulta</button>
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
