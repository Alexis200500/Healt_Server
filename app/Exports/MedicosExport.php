<?php

namespace App\Exports;

use App\Models\medicos;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutosize;

class MedicosExport implements FromView, ShouldAutosize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;

    public function view(): view
    {
        return view('Sistema.Medicos/exportmedicos', ['medicos' =>
        medicos::withTrashed()
        ->join('municipios','medicos.idmun','=','municipios.idmun')
        ->join('especialidades','medicos.idesp','=','especialidades.idesp')
        ->select('medicos.idmedico','medicos.nombre','medicos.appaterno','medicos.apmaterno',
                  'medicos.telefono','medicos.correo','especialidades.especialidad as especi','medicos.hora_entrada','medicos.hora_salida',
                  'medicos.idmun','medicos.idesp')
        ->get()
    ]);
    }
}
