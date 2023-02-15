<?php

namespace App\Exports;

use App\Models\consultas;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutosize;

class ConsultasExport implements FromView,ShouldAutosize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;

    public function view(): view
    {
        return view('Sistema.Consultas/export', ['consultas' =>
        consultas::withTrashed()
        ->join('medicos','consultas.idmedico','=','medicos.idmedico')
        ->join('statuses','consultas.idstatus','=','statuses.idstatus')
        ->join('especialidades','consultas.idesp','=','especialidades.idesp')
        ->select('consultas.idconsulta','consultas.fecha_consulta','consultas.hora_consulta',
        'consultas.observacion','consultas.peso', 'especialidades.especialidad as esp',
        'medicos.nombre','medicos.appaterno','medicos.apmaterno',
        'consultas.idmedico','statuses.nombre as stat','consultas.idstatus','consultas.idesp')
        ->get()
    ]);
    }
}
