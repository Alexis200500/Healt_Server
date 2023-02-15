<table>
    <thead>
        <tr>
            <th scope="col">N°</th>
            <th scope="col">Fecha</th>
            <th scope="col">Paciente</th>
            <th scope="col">Medico</th>
            <th scope="col">Medicamento</th>
            <th scope="col">Periodo</th>
            <th scope="col">Total Pagar</th>
        </tr>
    </thead>
    <tbody>
        @foreach($recetas as $rec)
            <tr>
                <td>{{ $rec->idreceta}}</td>
                <td>{{ $rec->fecha}}</td>
                <td>{{ $rec->paciente}}</td>
                <td>{{ $rec->medico}}</td>
                <td>{{ $rec->medicamento}}</td>
                <td>{{ $rec->periodo}}</td>
                <td>{{ $rec->totalpagar}}</td>
            </tr>
        @endforeach
    </tbody>
</table>
