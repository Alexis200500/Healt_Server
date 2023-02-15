<table>
    <thead>
        <tr>
            <th>Clave</th>
            <th>Nombre</th>
            <th>Telefono</th>
            <th>Correo electronico</th>
            <th>Especialidad</th>
            <th>Horario</th>
        </tr>
    </thead>
    <tbody>
        @foreach($medicos as $med)
            <tr>
                <td>{{ $med->idmedico}}</td>
                <td>{{ $med->nombre}} {{ $med->appaterno}} {{ $med->apmaterno}}</td>
                <td>{{ $med->telefono}}</td>
                <td>{{ $med->correo}}</td>
                <td>{{ $med->especi}}</td>
                <td>{{ $med->hora_entrada}} {{$med->hora_salida}}</td>

            </tr>
        @endforeach
    </tbody>
</table>
