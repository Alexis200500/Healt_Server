<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EncuestaController extends Controller
{
    public function encuesta_covid ()
    {
        return view('Sistema/Encuesta_covid/encuesta_covid');
    }
}
