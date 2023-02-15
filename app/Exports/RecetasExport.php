<?php

namespace App\Exports;

use App\Models\Recetas;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutosize;

class RecetasExport implements FromView, ShouldAutosize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): view
    {
        return view('Sistema/Recetas/exportrecetas', ['recetas' =>
        Recetas::
        select('recetas.idreceta','recetas.fecha','recetas.paciente','recetas.medico',
        'recetas.medicamento','recetas.dosis','recetas.periodo','recetas.totalpagar')
        ->get()
    ]);
    }
}