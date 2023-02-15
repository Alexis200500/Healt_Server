@extends('plantilla')
@section('contenido')
 <div class="right_col" role="main">
            <nav class="navbar navbar-expand-lg navbar-dark ">
  <a class="navbar-brand" href="#"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">
          <span class="sr-only"></span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"></a>
      </li>
     
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Buscar">
      <button class="btn btn-primary my-2 my-sm-0" type="submit">Buscar</button>
    </form>
  </div>
</nav>

                <div class="x_panel">
                    <h1>REPORTE TIPO SANGRE</h1>
                     <br>
                  <div align="left">
                    <a href="{{route('altatiposangre')}}"><button type="button" class="btn btn-success" >Nuevo tipo sangre</button></a>
                 
                  
                  @if (Session::has('mensaje'))
                 <div class="alert alert-success">
                  {{Session::get('mensaje')}}
                  @endif
                   @if (Session::has('mensaje2'))
                 <div class="alert alert-danger">
                  {{Session::get('mensaje2')}}
                  @endif
                 </div>
                 
                    
                    <table class="table table-dark">
                      <thead>
                        <tr>
                             <th scope="col">clave</th>
                             <th scope="col">Tipo</th>
                             <th scope="col">Operaciones</th>
                             
                        </tr>
                      </thead>
                      <tbody>
                          @foreach($consulta as $c)
            
             <tr>
               <th scope="row">{{$c->idtipossan}}</th>
                <td>{{$c->tipo}}</td>

               <td>
                <a href="{{route('modificatiposangre',['idtipossan'=>$c->idtipossan])}}"> 
                  <button type="button" class="btn btn-info">Modificar</button>
                </a>
                 @if($c->deleted_at)
                <a href="{{route('activatiposangre',['idtipossan'=>$c->idtipossan])}}"> 
                  <button type="button" class="btn btn-warning">Activar</button>
                </a>
                <a href="{{route('borrartiposangre',['idtipossan'=>$c->idtipossan])}}"> 
                  <button type="button" class="btn btn-danger">Borrar</button>
                </a>
                @else
                <a href="{{route('desactivatiposangre',['idtipossan'=>$c->idtipossan])}}"> 
                  <button type="button" class="btn btn-danger">Desactivar</button>
                </a>
                @endif
             </tr>
           @endforeach
                        </tbody>
                    </table>
                        
                    <section class="paginacion">
                        <ul>
                            <li class="page-item ">
      <a class="page-link" href="#">&laquo;</a>
    </li>
    <li class="page-item active">
      <a class="page-link" href="#">1</a>
    </li>
    <li class="page-item">
      <a class="page-link" href="#">2</a>
    </li>
    <li class="page-item">
      <a class="page-link" href="#">3</a>
    </li>
    <li class="page-item">
      <a class="page-link" href="#">4</a>
    </li>
    <li class="page-item">
      <a class="page-link" href="#">5</a>
    </li>
    <li class="page-item">
      <a class="page-link" href="#">&raquo;</a>
    </li>
                        </ul>
                    </section>
                     

                        
<!--
                      <table>
                        <thead>
                          <tr>
                              <th>ID</th>
                              <th>Nombre</th>
                              <th>Ap. Paterno</th>
                              <th>Ap. Materno</th>
                              <th>Edad</th>
                              <th>Sexo</th>
                              <th>Correo</th>
                              <th>Operaciones</th>                    
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                              <td data-titulo="id">1</td>
                              <td data-titulo="Nombre">Alexis</td>
                              <td data-titulo="Ap .Paterno">Morales</td>
                              <td data-titulo="Ap. Materno">Gómez</td>
                              <td data-titulo="Edad">20</td>
                              <td data-titulo="Sexo">Masculino</td>
                              <td data-titulo="Correo" colspan="2">al221811729@gmail.com</td>
                              <td>Editar Eliminar</td>                        
                          </tr>
                        </tbody>
                      </table>
-->
              </div>
                </div>
        </div>
<style>
  .boton{
    text-align:right;
  }
  </style>
@endsection