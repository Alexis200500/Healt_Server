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

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=Exo&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<!-- Site Icons -->
<link rel="shortcut icon" href="{{ URL::asset ('Pagina/images/favicon.ico') }}" type="image/x-icon">
<link rel="apple-touch-icon" href="{{ URL::asset ('Pagina/images/apple-touch-icon.png') }}">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="{{ URL::asset ('Pagina/css/bootstrap.min.css') }}">
<!-- Pogo Slider CSS -->
<link rel="stylesheet" href="{{ URL::asset ('Pagina/css/pogo-slider.min.css') }}">
<!-- Site CSS -->
<link rel="stylesheet" href="{{ URL::asset ('Pagina/css/style.css') }}">
<!-- Responsive CSS -->
<link rel="stylesheet" href=" {{ URL::asset ('Pagina/css/responsive.css') }}">
<!-- Custom CSS -->
<link rel="stylesheet" href="{{ URL::asset ('Pagina/css/custom.css') }}">


<div class="container-fluid">
    <div class="row">
        <div class="col-md-9 ml-auto mr-auto">
            <div class="card">
                <div class="card-header card-header-primary">
                <?php 
                    $sessionmedico=session('sessionmedico');
                ?>
                    <h4 class="card-title">
                        <center>
                        Perfil del Medico <?php echo $sessionmedico?>
                        </center>
                    </h4>
                </div>
                <div class="card-body">
                    @foreach($res as $c)

                    <div id="team" class="team-box">
            <div class="container">
                <div class="row">
                    
                    <div class="col-md-4 col-sm-6">
                        <div class="our-team">
                            <div class="pic">
                            <img src="{{ asset('archivos/'. $c->img)}}"  height="350" witd="150">
                            </div>
                        </div>
                        </div>
                    <div class="col-md-6 col-sm-6">                    
                        <div class="informacion">
                        Nombre: <input type="text" name="nombre" value="{{$c->nombre}}" class="form-control" readonly> 
                        Apellido paterno: <input type="text" name="nombre" value="{{$c->appaterno}}"  class="form-control" readonly> 
                        Apellido materno: <input type="text" name="nombre" value="{{$c->apmaterno}}"  class="form-control" readonly> 
                        Telefono: <input type="text" name="nombre" value="{{$c->telefono}}"  class="form-control" readonly> 
                        Correo electronico: <input type="text" name="nombre" value="{{$c->email}}"  class="form-control" readonly> 
                        Especialidad: <input type="text" name="nombre" value="{{$c->especialidad}}"  class="form-control" readonly> 
                    </div>
                    </div>
                    
                </col-sm-6>
                </div>
            </div>
        </div>

        <!-- reportes -->
        
</div>
        
<!-- perfil -->
                    

                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

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
                    <a href="{{route('reporte_recetas')}}">
                        <button type="submit" class="btn btn-primary pull-right">Recetas</button>
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
                                @foreach($resu as $u)

                                <tr>
                                    <td>{{$u->idusuario}}</td>
                                    <td>{{$u->apellidop}} {{$u->apellidom}} {{$u->nombre}}</td>
                                    <td>{{$u->edad}}</td>
                                    <td>{{$u->sexo}}</td>
                                    <td>{{$u->tiposangre}}</td>
                                    <td>{{$u->telefono}}</td>
                                    <td>{{$u->email}}</td>

                                    <td>
                                        <a href="{{route('modificausuarios',['idusuario'=>$u->idusuario])}}">
                                            <button type="button" class="btn btn-info btn-sm">Modificar</button>
                                        </a>
                                        @if($u->deleted_at)
                                        <a href="{{route('activausuario',['idusuario'=>$u->idusuario])}}">
                                            <button type="button" class="btn btn-success btn-sm">Activar</button>
                                        </a>
                                        <a href="{{route('borrarusuario',['idusuario'=>$u->idusuario])}}">
                                            <button type="button" class="btn btn-danger btn-sm">Eliminar</button>
                                        </a>
                                        @else
                                        <a href="{{route('desactivausuario',['idusuario'=>$u->idusuario])}}">
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

<!-- ALL PLUGINS -->
<script src="{{ URL::asset ('Pagina/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ URL::asset ('Pagina/js/jquery.pogo-slider.min.js') }}"></script>
<script src="{{ URL::asset ('Pagina/js/slider-index.js') }}"></script>
<script src="{{ URL::asset ('Pagina/js/smoothscroll.js') }}"></script>
<script src="{{ URL::asset ('Pagina/js/TweenMax.min.js') }}"></script>
<script src="{{ URL::asset ('Pagina/js/main.js') }}"></script>
<script src="{{ URL::asset ('Pagina/js/owl.carousel.min.js') }}"></script>
<script src="{{ URL::asset ('Pagina/js/form-validator.min.js') }}"></script>
<script src="{{ URL::asset ('Pagina/js/contact-form-script.js') }}"></script>
<script src="{{ URL::asset ('Pagina/js/isotope.min.js') }}"></script>
<script src="{{ URL::asset ('Pagina/js/images-loded.min.js') }}"></script>
<script src="{{ URL::asset ('Pagina/js/custom.js') }}"></script>

<style>


    .img2 {
        background-color: red;
        padding: 5px;
        width: 400px;
        text-align: center;
        margin-bottom: 2px;
        margin-left: 30px;
        float: left;
    }

    .informacion {
        /* background-color: blue; */
        padding: 3px;
        margin-right: 150px;
        float: right;
        margin-top:10px;
        /* text-align:right; */
    }

    .team-box {
        margin-top: -50px;
    }

    .our-team .pic {
        margin: 30px;
        position: relative;
        border: 3px solid #00cb86;
       
    }

    .fa {
        display: inline-block;
        font: normal normal normal 14px/1 FontAwesome;
        font-size: inherit;
        text-rendering: auto;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        width: 30px;
    }
    .our-team .pic:after{
    content: "";
    width: 100%;
    height: 0;
    
    position: absolute;
    bottom: 0;
    left: 0;
    opacity: 0;
    transform-origin: 0 0 0;
  
}

    .team-content {
        margin-top: 10px;
    }

</style>

@stop
