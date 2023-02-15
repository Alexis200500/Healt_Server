<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Softdeletes;

class statuses extends Model
{
    use Softdeletes;
    use HasFactory;
    protected $primaryKey='idstatus';
    protected $fillable=
    [
      'nombre'
    ];
}
