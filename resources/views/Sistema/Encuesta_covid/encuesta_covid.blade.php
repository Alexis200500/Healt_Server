@extends('plantilla')

@section('contenido')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-11 ml-auto mr-auto">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Encuesta Covid</h4>
                    <p class="card-category">Completa este formulario para tu mayor seguridad durante esta cuarentena.</p>
                </div>

                <table  border="1" class="table table-striped" cellpadding="1" cellspacing="1" style="width:670px;"><thead><tr class="titulos"><th  class="card-title"  colspan="2" scope="col"><strong  class="card-title">Tener uno o más de los siguientes síntomas justifica el retiro inmediato del lugar de trabajo</strong></th>
		</tr></thead><tbody><tr><td>¿Siente fiebre, escalofríos como los de una gripe, o una fiebre con una temperatura tomada por la boca de 38,1°C (100,6°F) o más?</td>
			<td style="width: 250px;" class="radio"><input name="choix1" type="radio" value="si" /> Sí   <input name="choix1" type="radio" value="no" /> No</td>
		</tr><tr><td><em>¿</em>Ha tenido una pérdida repentina del olfato sin congestión nasal (nariz tapada), con o sin pérdida del gusto<em>?</em></td>
			<td style="width: 250px;" class="radio"><input name="choix2" type="radio" value="si" /> Sí   <input name="choix2" type="radio" value="no" /> No</td>
		</tr><tr><td><em>¿</em>Ha desarrollado una tos o su tos crónica ha empeorado recientemente<em>?</em></td>
			<td style="width: 250px;" class="radio"><input name="choix3" type="radio" value="si" /> Sí   <input name="choix3" type="radio" value="no" /> No</td>
		</tr><tr><td><em>¿</em>Tiene problemas al respirar o le falta el aliento<em>?</em></td>
			<td style="width: 230px;" class="radio"><input name="choix4" type="radio" value="si" /> Sí   <input name="choix4" type="radio" value="no" /> No</td>
		</tr><tr><td>¿Tiene dolor de garganta?</td>
			<td style="width: 250px;" class="radio"><input name="choix5" type="radio" value="si" /> Sí   <input name="choix5" type="radio" value="no" /> No</td>
		</tr><tr><td>¿Tiene secreción o congestión nasal de causa desconocida?</td>
			<td style="width: 250px;" class="radio"><input name="choix6" type="radio" value="si" /> Sí   <input name="choix6" type="radio" value="no" /> No</td>
		</tr></tbody></table><table class="table table-striped" border="1" cellpadding="1" cellspacing="1" style="width:670px;"><thead><tr  class="titulos"><th class="card-title" colspan="2" scope="col"><strong>Tener Dos o más de los siguientes síntomas justifica el retiro inmediato del lugar de trabajo</strong></th>
		</tr></thead><tbody><tr><td>Dolor de estómago</td>
			<td style="width: 250px;" class="radio"><input name="choix7" type="radio" value="si" /> Sí   <input name="choix7" type="radio" value="no" /> No</td>
		</tr><tr><td>Náuseas o vómitos</td>
			<td style="width: 250px;" class="radio"><input name="choix8" type="radio" value="si" /> Sí   <input name="choix8" type="radio" value="no" /> No</td>
		</tr><tr><td>Diarrea</td>
			<td style="width: 250px;" class="radio"><input name="choix9" type="radio" value="si" /> Sí   <input name="choix9" type="radio" value="no" /> No</td>
		</tr><tr><td>Fatiga inusualmente intensa sin razón obvia</td>
			<td style="width: 250px;" class="radio"><input name="choix10" type="radio" value="si" /> Sí   <input name="choix10" type="radio" value="no" /> No</td>
		</tr><tr><td>Pérdida significativa de apetito</td>
			<td style="width: 250px;" class="radio"><input name="choix11" type="radio" value="si" /> Sí   <input name="choix11" type="radio" value="no" /> No</td>
		</tr><tr><td>Dolores musculares generalizados inusuales o sin razón obvia (no relacionado con el esfuerzo físico)</td>
			<td style="width: 250px;" class="radio"><input name="choix12" type="radio" value="si" /> Sí   <input name="choix12" type="radio" value="no" /> No</td>
		</tr><tr><td>Dolor de cabeza inhabitual</td>
			<td style="width: 250px;" class="radio"><input name="choix13" type="radio" value="si" /> Sí   <input name="choix13" type="radio" value="no" /> No</td>
		</tr></tbody></table><table class="table table-striped" border="1" cellpadding="1" cellspacing="1" style="width:670px;"><thead><tr><th scope="col">DETALLES</th>
		</tr></thead><tbody><tr><td>
			<p><strong>Fiebre:</strong></p>

			<ul><li>
				<p>Una fiebre intermitente, es decir, que va y vuelve, también cumple con este criterio.</p>
				</li>
				<li>
				<p><span style="font-size: inherit;">Una sola medición oral de la temperatura corporal de 38.1°C o más también cumple este criterio</span><a href="#note" style="font-size: inherit;"><sup>1</sup></a><span style="font-size: inherit;">.</span></p>
				</li>
			</ul></td>
		</tr><tr><td>
			<p><strong>Tos:</strong></p>

			<ul><li>Pocas personas, como los fumadores crónicos, pueden desarrollar tos con regularidad. La tos habitual no cumple este criterio, pero cualquier cambio en la tos, como el aumento de la frecuencia o la aparición de esputo, sí lo cumple.</li>
			</ul></td>
		</tr><tr><td>
			<p><strong>Dificultad para respirar:</strong></p>

			<ul><li>Algunas personas, como los asmáticos, pueden tener razones específicas de su condición que no están relacionadas con la COVID-19 y que explican sus dificultades respiratorias. Cualquier dificultad para respirar que no sea de otras causas obvias cumple con este criterio.</li>
			</ul></td>
		</tr><tr><td>
			<p><strong>Pérdida repentina del olfato:</strong></p>

			<ul><li>La pérdida repentina del sentido del olfato sin congestión nasal, con o sin pérdida del gusto, cumple con este criterio, ya sea sola o en combinación con otros síntomas.<a id="note" name="note"></a></li>
			</ul></td>
		</tr></tbody></table>
               
            </div>
        </div>
    </div>
</div>

<style>
    table {
    align:center;
    margin: 0 0 10px 0;
    padding: 0;
    width: 100%;
    color: black;
}
table, thead, tbody, tr, th, td {
    border-color: #ccc;
    border-radius:10px;
     box-shadow:  0 0 5px #71FB75;
}


tr,table{
    color: black;
    margin-left: 110px;
    margin-top: 25px;
    
    
}
th {
    text-align: center;
    background-color:#71FB75;
    box-shadow: 20px;
    
}
.radio{
    text-align: center;
    font-family: arial;
}



</style>
@stop
