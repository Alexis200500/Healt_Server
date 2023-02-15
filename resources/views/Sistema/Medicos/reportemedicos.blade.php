@extends('plantilla')

@section('contenido')
<style>
  table th{
    text-align:center;
  }
  table tr{
    text-align:center;
  }
  



  .field {
    display:flex;
    position:realtive;
    margin:1em auto;
    width:70%;
    flex-direction:row;
    box-shadow:
    1px 1px 0 rgb(22, 160, 133),
    2px 2px 0 rgb(22, 160, 133),
    3px 3px 0 rgb(22, 160, 133),
    4px 4px 0 rgb(22, 160, 133),
    5px 5px 0 rgb(22, 160, 133),
    6px 6px 0 rgb(22, 160, 133),
    7px 7px 0 rgb(22, 160, 133)
    ;
  }

  .field>input[type=text],
  .field>button {
    display:block;
    font:1.2em 'Montserrat Alternates';
  }

  .field>input[type=text] {
    flex:1;
    padding:0.6em;
    border:0.2em solid rgb(26, 188, 156);
  }

  .field>button {
    padding:0.6em 0.8em;
    background-color:rgb(26, 188, 156);
    color:white;
    border:none;
  }
    
</style>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header card-header-primary">
          <h4 class="card-title ">Médicos y Consultorios ¡Encuentra la mejor opción para tu consulta!</h4>
        </div>
        

        <div>
          <a href="{{url('exportmedicos')}}">
            <img src="{{ asset('excel.png') }}" width="55" height="55" style="float: right"/>
          </a>
          <a href="{{url('pdfmedicos')}}">
            <img src="{{ asset('pdf.png') }}" width="55" height="55" style="float: right"/>
          </a>
          <a href="{{route('alta_medicos')}}">
            <button type="submit" class="btn btn-primary pull-right">Nuevo medico</button>
          </a>
        </div>
        <div>

        
        <form action="{{route('reportemedicos')}}" method="GET">
          <div class="field" id="searchform">
                  <input type="text" id="searchterm" name="criterio" placeholder="Ingresa tu localidad" />
                  <button type="submit" id="search">Buscar!</button>
          </div>

        </form>    
                

                <script class="cssdeck" src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>


                </div>
        {{-- Guardar --}}
        @if(Session::has('mensaje'))
        <div class="alert alert-success">{{Session::get('mensaje')}}</div>
        @endif

        {{-- Modificar --}}
        @if(Session::has('mensajemodifica'))
        <div class="alert alert-info">{{Session::get('mensajemodifica')}}</div>
        @endif

        {{-- Desactivar --}}
        @if(Session::has('mensajedesactiva'))
        <div class="alert alert-warning">{{Session::get('mensajedesactiva')}}</div>
        @endif

        {{-- Borrar --}}
        @if(Session::has('mensajeerror'))
        <div class="alert alert-danger">{{Session::get('mensajeerror')}}</div>
        @endif

        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead class=" text-primary">
                <th>Foto</th>
                <th>Nombre</th>
                <th>Localidad</th>
                <th>Dirección</th>
                <th>Telefono</th>
                <th>Horario</th>             
                <th>Especialidad</th>
                <th>Operaciones</th>
              </thead>

              <tbody>
                @foreach($res as $c)
                  <tr>
                        <td> <img src="{{ asset('archivos/'. $c->img)}}" height="70" witd="70">

                            </td>
                        <td>{{$c->appaterno}} {{$c->apmaterno}} {{$c->nombre}}</td>
                        <td>{{$c->localidad}}</td>
                        <td>{{$c->direccionclinica}}</td>
                        <td>{{$c->telefono}}</td>
                        <td>{{$c->horainicio}} - {{$c->horafin}}</td>        
                        <td>{{$c->especialidad}}</td>


                    <td>
                             <a href="{{route('altaconmedico',['idmedico'=>$c->idmedico])}}">
                                <button type="button"  class="btn btn-info btn-sm">Crear cita</button>
                            </a>
                          <!--
                            <a href="">
                                <button type="button" class="btn btn-success btn-sm">Activar</button>
                            </a>
                            <a href="">
                                <button type="button" class="btn btn-danger btn-sm">Eliminar</button>
                            </a>

                            <a href="">
                                <button type="button" class="btn btn-warning btn-sm">Desactivar</button>
                            </a>-->

                        </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@stop
