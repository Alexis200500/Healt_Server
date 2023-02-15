<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    use HasFactory;
    protected $primaryKey = 'idmedico';
    protected $fillable =
     ['idmedico',
     'nombre',
     'appaterno',
     'apmaterno',
     'localidad',
     'telefono',
     'sexo',
     'idesp', 
     'cedula',
     'horainicio',
     'horafin', 
     'img',
     'email', 
     'password',
     'tipo'
];
}
