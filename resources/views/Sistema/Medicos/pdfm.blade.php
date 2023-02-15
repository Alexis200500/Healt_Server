<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>PDF | MEDICOS</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- css estilos -->
	<style>
        table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
        }

        td{
        border: 1px solid #dddddd;
        text-align: left;
        font-size: 11px;
        padding: 8px;
        }

        th {
        border: 1px solid #dddddd;
        text-align: left;
        font-size: 11px;
        padding: 8px;
        }

        tr {

        }

        thead{
            border: 2px solid #dddddd;
            background:#E5E7E9;

        }


        img{
            height: 60px;
            width: 200px;
            float:right;
            margin-right:40px;
        }

        </style>

</head>

<body>
    <div class="container">
        <img src="../public/img/clinicalogo1.png" />
        <h2 class="mb-4"> REGISTRO DE MEDICOS</h2> <hr>
        <table class="table table-striped table-hover" border="1">
            <thead>
                <tr>
                    <th scope="col">N°</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Correo electronico</th>
                    <th scope="col">Especialidad</th>
                    <th scope="col">Horario</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pdfmedicos as $con)
                <tr>
                <td>{{ $con->idmedico}}</td>
                <td>{{ $con->nombre}} {{$con->appaterno}} {{$con->apmaterno}}</td>
                <td>{{ $con->telefono}}</td>
                <td>{{ $con->correo}}</td>
                <td>{{ $con->esp }}</td>
                <td>{{ $con->hora_entrada}} {{$con->hora_salida}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
