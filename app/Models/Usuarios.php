<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Softdeletes;

class Usuarios extends Model
{
    use HasFactory;
    protected $primaryKey = 'idusuario';
    use Softdeletes;
    protected $fillable =
     ['idusuario', 
     'nombre',
     'apellidop',
     'sexo',
     'fechanacimiento',
     'edad',
     'telefono',
     'tiposangre',
     'apellidom',
     'email',
     'password',
     'tipou',
     'idmun'];

}
