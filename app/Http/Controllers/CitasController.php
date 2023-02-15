<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\citas;
use App\Models\medicos;
use App\Models\Especialidades;
use App\Models\Pacientes;

class CitasController extends Controller
{
    public function registrocitas(){
        $consulta = citas::orderBy('idcita','DESC')
        ->take(1)->get();

    $cuantos = count($consulta);
    if ($cuantos==0) {
        $idesigue = 1;
    } else {
        $idesigue = $consulta[0]->idcita + 1;
    }

    $especialidades = especialidades::orderBy('especialidad')->get();
    $pacientes = pacientes::orderBy('apellidop')->get();

    return view('citas/alta')
        ->with('idesigue',$idesigue)
        ->with('pacientes',$pacientes)
        ->with('especialidades',$especialidades);
    }

    public function citaguardada(Request $request){
        $citas = new citas;
        $citas->idcita = $request->idcita;
        $citas->idpaciente = $request->idpaciente;
        $citas->idesp = $request->idesp;
        $citas->fecha = $request->fecha;
        $citas->save();

        dd($request);
    }
    
}
