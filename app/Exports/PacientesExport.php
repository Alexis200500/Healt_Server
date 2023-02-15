<?php

namespace App\Exports;

use App\Models\Pacientes;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutosize;

class PacientesExport implements FromView, ShouldAutosize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): view
    {
        return view('Sistema/Pacientes/exportpacientes', ['pacientes' =>
        pacientes::withTrashed()->
        select('pacientes.idpaciente','pacientes.nombre','pacientes.apellidop','pacientes.apellidom','pacientes.sexo',
        'pacientes.tiposangre','pacientes.telefono','pacientes.correo','deleted_at')
        ->get()
    ]);
    }
}
