<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class recetas extends Model
{
    protected $primaryKey='idreceta';
    use HasFactory;
    protected $fillable=
    [
        'idreceta',
        'fecha',
        'paciente',
        'medico',
        'tipomedicamento',
        'medicamento',
        'informacion',
        'dosis',
        'periodo',
        'observacion',
        'preciocon',
        'costoadicional',
        'preciomed',
        'totalpagar'
    ];
    
}
