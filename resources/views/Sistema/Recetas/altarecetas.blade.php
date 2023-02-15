@extends('plantilla')

@section('contenido')
<?php 
        
        $sessionnombre = session('sessionnombre');
        ?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-11 ml-auto mr-auto">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Recetas</h4>
                    <p class="card-category">Completa este formulario </p>
                </div>

                
             <form action="{{ route ('guardar_receta')}}" method="POST"> 
             {{csrf_field()}}
                <div class="card-body">
                    <div class="row">
                    <div class="col-md-5">
                            <div class="form-group">
                                <label class="bmd-label-floating">Numero de receta:</label>
                                <input type="text" class="form-control" value="{{$idreceta}}" name="idreceta" id="idreceta" readonly>
                            </div>
                        </div>
                        <div class="col-md-5">
                                <div class="form-group">
                                    <label class="bmd-label-">Fecha:</label> 
                                    <input type="date" id="txtfecha" name="txtfecha" class="form-control" value="<?php echo date("Y-n-j"); ?>" />
                                    @if($errors->first('txtfecha'))
                                        <p class="text-danger"> {{$errors->first('txtfecha')}} </p>
                                    @endif 
                                </div>  
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="bmd-label-floating">Paciente</label>
                                <input type="text" class="form-control" name="paciente" id="paciente">
                                @if($errors->first('paciente'))
                                    <p class="text-danger"> {{$errors->first('paciente')}} </p>
                                @endif 
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="bmd-label-floating">Medico:</label>
                                
                                <input type="text" class="form-control" value="<?php echo $sessionnombre?>" name="medico" id="medico" readonly="readonly">

                            </div>
                        </div>
                        <div class="col-md-3">  
                                <div class="form-group">
                                    <label class="bmd-label-floating">Tipo medicamento</label>
                                    <select class="custom-select" name="tipom" id="tipom" onchange="cargarMedicamentos();">
                                        <option value="">Seleccione un medicamento</option>
                                    </select>
                                    @if($errors->first('tipom'))
                                        <p class="text-danger"> {{$errors->first('tipom')}} </p>
                                    @endif 
                                </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="bmd-label-floating">Medicamento</label>
                                <select class="custom-select" name="medicamento" id="medicamento" >
                                    <option value="">Selecciona un medicamento</option>
                                </select>
                            </div>
                                @if($errors->first('medicamento'))
                                    <p class="text-danger"> {{$errors->first('medicamento')}} </p>
                                @endif 
                        </div>   
                    </div>
                    <div class="row">
                    <div class="row parteinfo" id="parteinfo">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="bmd-label-floating">Información:</label>
                                <input type="text" name="informacion" id="informacion" class="form-control" value="">
                                @if($errors->first('informacion'))
                                    <p class="text-danger"> {{$errors->first('informacion')}} </p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="bmd-label-floating">Dosis</label>
                                <input type="text" class="form-control" name="dosis" id="dosis">
                                @if($errors->first('dosis'))
                                    <p class="text-danger"> {{$errors->first('dosis')}} </p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="bmd-label-floating">Periodo</label>
                                <input type="text" class="form-control" name="periodo" id="periodo">
                                @if($errors->first('periodo'))
                                    <p class="text-danger"> {{$errors->first('periodo')}} </p>
                                @endif
                            </div>
                        </div> 
                        <div class="col-md-12">
                            <div class="form-group">
                            <label>Observaciones</label>
                            <div class="form-group">  
                                <textarea class="form-control" rows="3" value="" name="observaciones"></textarea>
                        
                            </div>
                            </div>
                            @if($errors->first('observaciones'))
                                    <p class="text-danger"> {{$errors->first('observaciones')}} </p>
                            @endif
                        </div>  
                    </div>
                    <div class="row">   
                    </div>
                    <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="bmd-label-">Precio consulta</label>
                                    <input type="text" class="form-control" name="totalSum" id="totalSum"
                                        onkeyup="Suma()" step="0.001" oninput="calcular()">
                                        @if($errors->first('totalSum'))
                                          <p class="text-danger"> {{$errors->first('totalSum')}} </p>
                                        @endif
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="bmd-label-">Costo adicional</label>
                                    <input type="text" class="form-control" name="ingreso1" id="valor1" step="0.001" oninput="calcular()">
                                    
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="bmd-label-">Precio del medicamento</label>
                                    <input type="text" class="form-control" name="ingreso2" id="valor2" step="0.001" oninput="calcular()">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="bmd-label-">Total a pagar</label>
                                    <input type="text" class="form-control" name="resultado" id="total" step="0.001">
                                </div>
                            </div>
                        </div>
            <button type="submit" class="btn btn-primary pull-rightid=" name="boton" >Guardar Receta </button>
        </form>  
            <div class="clearfix">
            </div>
           <!-- <table class="table" id="table">
                <thead>
                    <tr>
                        <th>Clave</th>
                        <th>Fecha</th>
                        <th>Paciente</th>
                        <th>Medico</th>
                        <th>Medicamento</th>
                        <th>Pedido</th>
                        <th>Total a pagar</th>
                        <th>Operaciones</th>
                    </tr>
                </thead> 
            </table> -->
              
        </div>
    </div>
</div>

</div>
</div>

    <script type="text/javascript">
  function startTime(){ today=new Date(); h=today.getHours(); m=today.getMinutes(); 
        s=today.getSeconds(); m=checkTime(m); s=checkTime(s);
        document.getElementById('reloj').innerHTML=h+":"+m+":"+s; t=setTimeout('startTime()',500);} 
     function checkTime(i) {if (i<10) {i="0" + i;}return i;}
      window.onload=function(){startTime();} 
  
      function cargarMedicamento() {
    var array = ["Desinflamatorios", "Antibiotico", "Analgesicos", "Antipireptico", "Antisepticos"];
    array.sort();
    addOptions("tipom", array);
}


//Función para agregar opciones a un <select>.
function addOptions(domElement, array) {
    var selector = document.getElementsByName(domElement)[0];
    for (tipom in array) {
        var opcion = document.createElement("option");
        opcion.text = array[tipom];
        // Añadimos un value a los option para hacer mas facil escoger los medica
        opcion.value = array[tipom].toLowerCase()
        selector.add(opcion);
    }
}



function cargarMedicamentos() {
    // Objeto de tipom con medica
    var listamedicamentos = {
      desinflamatorios: ["Flurbiprofeno","Ketoprofeno","Tolmetín","Naproxeno","Aspirina"],
      antibiotico: ["Ibuprofeno", "Ketorolaco", "Piroxicam", "Diclofenaco", "Meloxicam"],
      analgesicos: ["Etodolaco", "Sulindaco", "Naproxeno", "Fentanilo", "Metadona"],
      antipireptico: ["Paraminofenol", "Tempra", "Propinio", "Difunisal", "XL3"],
      antisepticos: ["Venofer", "Azatriopina", "Duodart", "Paracetamol", "Aspirinas"]
    }
    
    var tipom = document.getElementById('tipom')
    var medica = document.getElementById('medicamento')
    var medicamentoselect = tipom.value
    
    // Se limpian los medica
    medica.innerHTML = '<option value="">Seleccione un medicamento...</option>'
    
    if(medicamentoselect !== ''){
      // Se seleccionan los medica y se ordenan
      medicamentoselect = listamedicamentos[medicamentoselect]
      medicamentoselect.sort()
    
      // Insertamos los medica
      medicamentoselect.forEach(function(medicamento){
        let opcion = document.createElement('option')
        opcion.value = medicamento
        opcion.text = medicamento
        medica.add(opcion)
      });
    }
    
  }
  
 // Iniciar la carga de tipom solo para comprobar que funciona
cargarMedicamento();



  $('#info').change(function (){
      var formu = $('#info option:selected').val();
      if(formu!=7) {
          $('#parteinfo').removeAttr('hidden');
      }
      else{
          $('#parteinfo').hide();
      }
  });
  
  function DisplayPrice(price)
  {
      var val1 = 0;
      for (i = 0; i < document.form1.price.length; i++) {
          if (document.form1.price[i].checked == true) {
              val1 = document.form1.price[i].value;
          }
      }
      var sum = parseInt(val1) + 200;
      document.getElementById('totalSum').value = sum;
  }
  function calcular(){
        try {
            var a = parseFloat(document.getElementById("valor1").value) || 0,
             b = parseFloat(document.getElementById("valor2").value) || 0,
             c = parseFloat(document.getElementById("totalSum").value) || 0;
            document.getElementById("total").value = a + b + c;
        } catch(e){}
    }
  $("#boton").on({
      'mouseover': function () {
          $(this).text("Registrar receta en la tabla");
      },
      'mouseout': function () {
          $(this).text("Guardar receta")
      }
  })
  $("#enviar").click(function () {
      alert("Datos guardados correctamente");
  })
  
  function capturar()
  {
      function Receta(paciente,odontologo, fecha, medicamento, periodo, total) {
          this.paciente = paciente;
          this.fecha = fecha;
          this. odontologo = odontologo;
          this.medicamento = medicamento;
          this.periodo = periodo;
          this.total = total; 
      }
      var i = 0;
      var pacienteCapturar = document.getElementById("paciente").value;
      var odontologoCapturar = document.getElementById("odontologo").value;
      var medicamentoCapturar = document.getElementById("medicamento").value;
      var fechaCapturar = document.getElementById("f1t1").value;
      var periodoCapturar = document.getElementById("periodo").value;
      var totalCapturar = document.getElementById("resultado").value;
      nuevaReceta = new Receta(pacienteCapturar,odontologoCapturar,medicamentoCapturar,fechaCapturar,periodoCapturar,totalCapturar);
      console.log(nuevaReceta);
      agregar(); 
  }
  var baseDatos = [];
  function agregar() {
      baseDatos.push(nuevaReceta);
      console.log(baseDatos);
      i++;
      document.getElementById("table").innerHTML += '<tbody></td><td>' + i + 
      '</td><td>' + nuevaReceta.medicamento + '</td><td>' + nuevaReceta.paciente + 
      '</td><td>' + nuevaReceta.odontologo + '</td><td>' + nuevaReceta.fecha + 
      '</td><td>' + nuevaReceta.periodo + '</td><td>' + nuevaReceta.total +
      '</td><td><button type="button" name="remove" id="" class="btn btn-danger btn_remove">Quitar</button></td></tr></tbody>';
  };
 
</script>

@stop
