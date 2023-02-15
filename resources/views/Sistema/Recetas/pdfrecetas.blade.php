<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>PDF | Recetas</title>
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
        <h2 class="mb-4"> REGISTRO DE RECETAS</h2> <hr>
        <table class="table table-striped table-hover" border="1">
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
                @foreach($pdfrecetas as $pdfr)
                <tr>
                <td>{{ $pdfr->idreceta}}</td>
                <td>{{ $pdfr->fecha}}</td>
                <td>{{ $pdfr->paciente}}</td>
                <td>{{ $pdfr->medico}}</td>
                <td>{{ $pdfr->medicamento}}</td>
                <td>{{ $pdfr->periodo}}</td>
                <td>{{ $pdfr->totalpagar}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
