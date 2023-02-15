<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>PDF | PACIENTES</title>
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
        <h2 class="mb-4"> REGISTRO DE PACIENTES</h2> <hr>
        <table class="table table-striped table-hover" border="1">
            <thead>
                <tr>
                    <th scope="col">N°</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Sexo</th>
                    <th scope="col">Tipo de sangre</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Correo electronico</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pdfpacientes as $pdfp)
                <tr>
                <td>{{ $pdfp->idpaciente}}</td>
                <td>{{ $pdfp->nombre}} {{$pdfp->apellidop}} {{$pdfp->apellidom}}</td>
                <td>{{ $pdfp->sexo}}</td>
                <td>{{ $pdfp->tiposangre}}</td>
                <td>{{ $pdfp->telefono}}</td>
                <td>{{ $pdfp->correo}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
