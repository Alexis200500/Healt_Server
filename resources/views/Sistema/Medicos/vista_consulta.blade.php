
<form action="{{ route('buscar')}}" method="GET">
    Dame el criterio de busqueda
    <input type="text" name="criterio">
    <input type="submit" value="Buscar"><br><br>
    </form>
     <table border="1">
      <tr><th>ID</th><th>Nombre</th><th>Ap .Paterno</th><th>Ap .Materno</th><th>Carreras</th><th>Email</th><th>Sexo</th></tr>
      @foreach ($res as $res2)
      <tr>
        <td>{{$res2->idmedico}}</td>
        <td>{{$res2->nombre}}</td>
        <td>{{$res2->appaterno}}</td>
        <td>{{$res2->apmaterno}}</td>
        <td>{{$res2->especialidad}}</td>
        <td>{{$res2->correo}}</td>
        <td>{{$res2->sexo}}</td>
      @endforeach
      </tr>
    </table>
    
