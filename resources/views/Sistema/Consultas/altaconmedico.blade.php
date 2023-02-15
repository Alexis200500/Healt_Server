@extends('plantilla')

@section('contenido')
<?php 
        
        $sessionnombre = session('sessionnombre');
        ?>
<style>
    .imagen{
        margin-left: 310px;
    }
</style>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-11 ml-auto mr-auto">
      <div class="card">
        <div class="card-header card-header-primary">
          <h4 class="card-title">Alta consulta</h4>
          <p class="card-category">Completa este formulario</p>
        </div>
        <div class="card-body">
          <form action="{{ route ('guardar_conmedico')}}" method="POST" enctype = 'multipart/form-data'>
            {{csrf_field()}}
            <div class="col-md-4">
                  <div class="form-group">

                      <div class="imagen">
                        <img src="{{ asset('archivos/'. $consulta->img)}}" height="250" width="250">
                      </div>
                        
                  </div>
                </div>
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



            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                      <label class="bmd-label-floating">Especialidad</label>
                        <select class="custom-select" name="idesp" >
                            <option selected="selected" class="txtselect"value="{{$consulta->idesp}}">{{$consulta->especi}}</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-4">
                    
                    <div class="form-group">
                    <label class="bmd-label-floating">Médico</label>
                        <select class="custom-select" name="idmedico" >
                            <option selected="true" value="{{$consulta->idmedico}}">{{$consulta->nombre}} {{$consulta->appaterno}} {{$consulta->apmaterno}}</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <br>
                <div class="form-group">
                    <label class="bmd-label-floating">Telefono</label>
                        <input type="text" class="form-control" value="{{$consulta->telefono}}" name="telefono" readonly="readonly">
                </div>
              </div>

            </div>

            <div class="row">

                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">Direccion</label>
                        <input type="text" class="form-control" value="{{$consulta->direccionclinica}}" name="direccion" readonly="readonly">
                        @if($errors->first('direccionclinica'))
                          <p class="text-danger"> {{$errors->first('direccionclinica')}} </p>
                          @endif
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                  <label class="">Fecha de consulta</label>
                  <input type="date" class="form-control" value="{{old('fecha_consulta')}}" name="fecha_consulta">
                  @if($errors->first('fecha_consulta'))
                    <p class="text-danger">{{$errors->first('fecha_consulta')}}</p>
                  @endif
                    
                  </div>
                </div>

                <?php

                $horarios = array(
                '06:00 - 07:00',
                '07:00 - 08:00',
                '08:00 - 09:00',
                '09:00 - 10:00',
                '10:00 - 11:00',
                '11:00 - 12:00'
              );
                $horarioActual  = '11:00 - 12:00';
?>
               
              
              <div class="col-md-4">
                <div class="form-group">
                <label class="bmd-label-floating">Seleccione la hora.</label>
                  <select class="custom-select" name="hora_consulta">
                    <option selected="selected" class="txtselect" value=""> Selecciona una hora</option>
                    <?php
                        for ($i=0; $i<count($horarios); $i++) { 
                          if($horarioActual == $horarios[$i]){
                          echo '<option value="' . $i .'">Horario Ocupado</option>';
                            }else{
                              echo '<option value="' . $i . '">' . $horarios[$i] . '</option>';
                            }
                        }
                    ?>
                  </select>
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
