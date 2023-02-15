<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $table = 'evento';
    use HasFactory;

    protected $fillable =[
        'titulo', 'descripcion', 'evento',
    ];
    public $timestamps = false;
}
