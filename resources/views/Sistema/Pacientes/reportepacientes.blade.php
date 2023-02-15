@extends('plantilla')

@section('contenido')
<style>
  table th{
    text-align:center;
  }
  table tr{
    text-align:center;
  }
  .busqueda{
    margin-top: -10px;
    margin-left:20px;
    display: block;
    
  }
</style>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title ">Reporte pacientes</h4>
                </div>
                <div>
                    <a href="{{url('exportpacientes')}}">
                        <img src="{{ asset('excel.png') }}" width="55" height="55" style="float: right" />
                    </a>
                    <a href="{{url('pdfpacientes')}}">
                        <img src="{{ asset('pdf.png') }}" width="55" height="55" style="float: right" />
                    </a>
                    <a href="#">
                        <button type="submit" class="btn btn-primary pull-right">Nuevo paciente</button>
                    </a>
                </div>

                <div class="col-md-8">
                    <div class="busqueda">
                        <input id="filtrar" type="text" class="form-control" placeholder="BUSCAR ...">
                    </div>
                </div>                
                <!--Sesiones Flash -->
                <div class="mensaje" name="mensaje" id="mensaje">
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
                </div>
    
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                                <th>Clave</th>
                                <th>Nombre</th>
                                <th>Edad</th>
                                <th>Sexo</th>
                                <th>Tipo de sangre</th>
                                <th>Telefono</th>
                                <th>Correo electronico</th>
                                <th>Operaciones</th>
                            </thead>

                            <tbody class="buscar">
                                @foreach($res as $c)

                                <tr>
                                    <td>{{$c->idusuario}}</td>
                                    <td>{{$c->apellidop}} {{$c->apellidom}} {{$c->nombre}}</td>
                                    <td>{{$c->edad}}</td>
                                    <td>{{$c->sexo}}</td>
                                    <td>{{$c->tiposangre}}</td>
                                    <td>{{$c->telefono}}</td>
                                    <td>{{$c->email}}</td>

                                    <td>
                                        <a href="{{route('modificausuarios',['idusuario'=>$c->idusuario])}}">
                                            <button type="button" class="btn btn-info btn-sm">Modificar</button>
                                        </a>
                                        @if($c->deleted_at)
                                        <a href="{{route('activausuario',['idusuario'=>$c->idusuario])}}">
                                            <button type="button" class="btn btn-success btn-sm">Activar</button>
                                        </a>
                                        <a href="{{route('borrarusuario',['idusuario'=>$c->idusuario])}}">
                                            <button type="button" class="btn btn-danger btn-sm">Eliminar</button>
                                        </a>
                                        @else
                                        <a href="{{route('desactivausuario',['idusuario'=>$c->idusuario])}}">
                                            <button type="button" class="btn btn-warning btn-sm">Desactivar</button>
                                        </a>
                                        @endif
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

<head>
<script src="http://code.jquery.com/jquery-2.1.4.min.js" type="text/javascript"></script>
      <script type="text/javascript">
        $(document).ready(function () {
            (function ($) {
                $('#filtrar').keyup(function () {
                    var rex = new RegExp($(this).val(), 'i');
                    $('.buscar tr').hide();
                    $('.buscar tr').filter(function () {
                        return rex.test($(this).text());
                    }).show();
                })
            }(jQuery));
        });
        $("document").ready(function(){
          setTimeout(function(){
          $("#mensaje").remove();
        }, 2000 );
        });
      </script>
</head>
@stop
