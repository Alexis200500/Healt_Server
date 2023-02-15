<table>
    <thead>
        <tr>
            <th>Clave</th>
            <th>Nombre</th>
            <th>Sexo</th>
            <th>Tipo sangre</th>
            <th>Telefono</th>
            <th>Correo electronico</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pacientes as $pac)
            <tr>
                <td>{{ $pac->idpaciente}}</td>
                <td>{{ $pac->nombre}} {{ $pac->apellidop}} {{ $pac->apellidom}}</td>
                <td>{{ $pac->sexo}}</td>
                <td>{{ $pac->tiposangre}}</td>
                <td>{{ $pac->telefono}}</td>
                <td>{{ $pac->correo}}</td>
            </tr>
        @endforeach
    </tbody>
</table>
