<table>
    <thead>
        <tr>
            <th>Clave</th>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Area</th>
            <th>Medico</th>
            <th>Estatus</th>
        </tr>
    </thead>
    <tbody>
        @foreach($consultas as $consulta)
            <tr>
                <td>{{ $consulta->idconsulta}}</td>
                <td>{{ $consulta->fecha_consulta}}</td>
                <td>{{ $consulta->hora_consulta}}</td>
                <td>{{ $consulta->esp}}</td>
                <td>{{ $consulta->nombre}} {{ $consulta->appaterno}} {{ $consulta->apmaterno}}</td>
                <td>{{ $consulta->stat}}</td>


            </tr>
        @endforeach
    </tbody>
</table>
