@extends('plantilla')

@section('contenido')

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Exo&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
    body{
      font-family: 'Exo', sans-serif;
    }
    .header-col{
      background: #E3E9E5;
      color:#536170;
      text-align: center;
      font-size: 20px;
      font-weight: bold;
    }
    .header-calendar{
      background: #EE192D;color:white;
    }
    .box-day{
      border:1px solid #E3E9E5;
      height:150px;
    }
    .box-dayoff{
      border:1px solid #E3E9E5;
      height:150px;
      background-color: #ccd1ce;
    }
    </style>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-11">
      <div class="card">
        <div class="card-header card-header-primary">
          <h4 class="card-title ">Reporte Consultas</h4>
        </div>
        <br>
        <div class="formulario">
    
          @if (count($errors) > 0)
            <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <ul>
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
            </div>
          @endif
          @if ($message = Session::get('success'))
          <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
              <strong>{{ $message }}</strong>
          </div>
          @endif


          <div class="col-md-8">
            <form action="#" method="post">
              @csrf
              <div class="fomr-group">
                <label>Titulo de la consulta:</label>
                <input type="text" class="form-control" value="{{ $event->paciente }}" name="titulo" readonly="readonly">
              </div>
              <div class="fomr-group">
                <label>Descripcion de la consulta:</label>
                <input type="text" class="form-control" value=" {{ $event->observacion }}" name="descripcion" readonly="readonly">
              </div>
              <div class="fomr-group">
                <label>Fecha que se realizara la consulta?</label>
                <input type="date" class="form-control" value="{{ $event->fecha_consulta }}" name="fecha" readonly="readonly">
              </div>
              <br>
              
              <div class="fomr-group">
                <label>Hora de consulta</label>
                <input type="text" class="form-control" value="{{ $event->hora_consulta }}" name="hora" readonly="readonly">
              </div><br>
              
              <a class="btn btn-info"  href="{{ asset('/Evento/index') }}">Atras</a>
            </form>
          </div>
    </div>
        <div>
        </div>
        <div>

  <style>
    .formulario{
      margin-left: 40px;
    }
  </style>
@stop