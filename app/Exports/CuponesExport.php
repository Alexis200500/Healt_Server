<?php

namespace App\Exports;

use App\Models\Cupones;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutosize;

class CuponesExport implements FromView,ShouldAutosize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;

    public function view(): view
    {
        return view('Sistema.Cupones/exportcupones', ['cupones' =>
        Cupones::withTrashed()->join('pacientes', 'cupones.idpaciente','=','pacientes.idpaciente')
                        ->select('cupones.idcupon', 'pacientes.nombre as paciente','pacientes.apellidop','pacientes.apellidom',
                        'cupones.tipocupon','cupones.porcentaje','cupones.fecha','cupones.fechavencimiento','cupones.descripcion','cupones.deleted_at')
                       
        ->get()
    ]);
    }
}