<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Softdeletes;

class consultas extends Model
{
    use Softdeletes;
    use HasFactory;
    protected $primaryKey='idconsulta';
    protected $fillable=
    [
      'idconsulta',
      'paciente',
      'idmedico',
      'idesp',
      'fecha_consulta',
      'hora_consulta',
      'peso',
      'observacion',
      'idstatus',
    ];
}
