<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RECETAS</title>
    <style> 
    *{
        padding:0px;
        margin: 0px; 
    }
.encabezado {
    /* background-color: blue; */
    height: auto;
    width: auto;
    margin-top:10px;
}

.imagen {
    float: left;

    /* background-color: red; */
}

.informacionmedico {
    text-align: center;
    margin-left: auto;
    margin-right: 50px;
    padding: 20px;
    /* color: white; */
}

.linea {
    margin-top: 1px;
    color: black;
    height: 3px;
}
.linea2 {
    margin-top: 1px;
    border: 1px;
    opacity: 0.3;
    border-top: 1px solid black;
    height: 2px;
    padding: 0;
    margin: 20px auto 0 auto;

}

.linea3{
    border-top: 1px solid black;
    height: 2px;
    width: 200px;
    padding: 0;
    margin-top: 30px;
    margin: 20px auto 0 auto;
    margin-right: 10px ;
}

.firma{
    float: right;
    margin-top: 650px;
    margin-right: 100px;

}


.informacionpaciente {
    /* background-color: red; */
    margin-top: 20px;
    margin-left: 20px;
    text-decoration-line: underline;

}

.fecha {
    float: right;
    margin-right: 20px;
    text-decoration-line: underline;
}

.fondo {
    margin-top: 20px;
    opacity: 0.3;
    text-align: center;
    margin-left: auto;
    margin-right: 50px;
    margin-left: 5px;
}

.detalle {
    /* background-color: brown; */
    float: center;
    float: right;
    width: 600px;
    height: 100px;
    margin-left: 20px;
    margin-top: 10px;
}

.padre {
    position: relative;
    /* background-color: green; */
    margin-top: 10px;
    text-align: center;


}

.tel{
    float: right;
    opacity: 0.5;
}

.direccion{
    float:left;
    opacity: 0.5;
}
.hijo {
    position: absolute;
    /* background-color: transparent; */
    top: 0;
    left: 0;
    right: 0;
    margin: 0 auto;
    width: 100%;
    margin-top: 50px;
    margin-left: 20px;
    text-align: justify;
}

.medicamento{
    float: left;
}

.dosis{
    float: right;
    margin-right: 20px;
}
.periodo{
    float:left;
}

.observaciones{
    float: left;
}
p{
    font-family: 'Courier New', Courier, monospace;
    font-size: 18px;
}
    </style>
</head>

<body>
    @foreach($receta as $c)
    <div>
    <div class="encabezado">
        <div class="imagen">
            <img src="../public/img/clinicalogo.png"  alt="img" height="80" width="150">
        </div>
        <div class="informacionmedico">
            <h1>Clinica San Miguel</h1>
            <h4>Medico: {{$c->medico}}
            </h4>
        </div>
    </div> <br><br><br><br><br><br>

    <!-- INFORMACION DEL PACIENTE -->
    <hr color="black" class="linea">

    <div class="informacionpaciente">
        <p class="fecha">Fecha: {{$c->fecha}}</p>
        <p>Paciente: {{$c->paciente}}</p>
    </div>

    <div class="padre">
        <img src="../public/img/clinicalogo.png" height="250" class="fondo">
        <div class="hijo">
            <p class="medicamento">Medicamento: {{$c->medicamento}}</p>
            <p class="dosis">Dosis:{{$c->dosis}}</p> <br> <br>
            <p class="periodo">Periodo: {{$c->periodo}}</p> <br> <br>
            <p class="observaciones">Observaciones:<br><br> {{$c->observacion}}</p> <br>
        </div> 
        <br><br><br>

        
        <div class="linea3"><p>Firma</p></div>


    </div> 
    <br>
    <div class="linea2"></div> <br><br>

    <div class="pie">
        <div class="direccion">
            <h4>Dirección: Calle Vicente Guerrero No.200 Bis <br>
            Barrio de San Miguel, San Mateo Atenco, Edo. Mex.</h4>    
        </div>
        <div class="tel">
            <h4>Tel. 7228032683</h4>
        </div>
    </div>
    @endforeach
</body>

</html>



