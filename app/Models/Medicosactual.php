<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Medicosactual extends Model
{
  use HasFactory;

  protected $primaryKey='idmed';
  protected $fillable=['idmed','nombre','appaterno','apmaterno','localidad','telefono','sexo',
                        'idesp', 'cedula', 'horainicio', 'horafin', 'foto', 'usuario', 'contrasena'];
}
 