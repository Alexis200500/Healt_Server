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
          <h4 class="card-title ">Reporte Recetas</h4>
        </div>
        <div>
        </div>
        <div>
        <a href="{{url('exportrecetas')}}">
                        <img src="{{ asset('excel.png') }}" width="55" height="55" style="float: right" />
                    </a>
          <a href="{{url('pdfrecetas')}}">
                          <img src="{{ asset('pdf.png') }}" width="55" height="55" style="float: right" />
                      </a>
          <a href="{{route ('vistareceta')}}">
              <button type="submit" class="btn btn-primary pull-right">Nueva receta</button>
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
                <th> Clave </th>
                <th> Fecha </th>
                <th> Paciente </th>
                <th> Médico </th>
                <th> Medicamento </th>
              
                <th> Periodo </th>
                <th> Total a pagar </th>
                <th> Operaciones </th>
              </thead>

              <tbody class="buscar">
                @foreach($consulta as $c)
                  <tr>
                    <td>{{$c->idreceta}}</td>
                    <td>{{$c->fecha}}</td>
                    <td>{{$c->paciente}}</td>
                    <td>{{$c->medico}}</td>
                    <td>{{$c->medicamento}} </td>
                   
                    <td>{{$c->periodo}} </td>
                    <td>{{$c->totalpagar}}</td>
                    <td>
                              <a href="{{route('unicareceta',['idreceta'=>$c->idreceta])}}">
                              <button type="button" class="btn btn-success btn-sm">Imprimir Receta</button>
                              </a>
                              <a href="{{route('borrarreceta',['idreceta'=>$c->idreceta])}}">
                              <button type="button" class="btn btn-danger btn-sm">Borrar</button>
                              </a>
                              
                              
                              
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
