<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class prueba extends Model
{
    use HasFactory;
    protected $primaryKey = 'idprueba';

    protected $fillable =
     ['idprueba',
     'nombre',
     'appaterno',
     'apmaterno',
     'sexo',
     'email', 
     'password',
];

}
