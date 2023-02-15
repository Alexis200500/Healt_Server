<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recetas;
use Session;
use PDF;
use Maatwebsite\Excel\Excel;
use App\Exports\RecetasExport;
use DB;

class RecetasController extends Controller
{
    private $excel;
  public function __construct(Excel $excel){
    $this->excel = $excel;
  }

    public function vistareceta(){
      $sessionidusuario = session('sessionidusuario');
      if($sessionidusuario<>"")
      {
            $consulta = Recetas::orderBy('idreceta','DESC')
            ->take(1)->get();

        $cuantos = count($consulta);
        if ($cuantos==0) {
            $idesigue = 1;
        } else {
            $idesigue = $consulta[0]->idreceta + 1;
        }

            return view('Sistema/Recetas/altarecetas')
            ->with('idreceta',$idesigue);
      }else{
        return redirect('vistalogin')->with('status', 'Necesitas iniciar sesion');
      }
    }
    public function guardar_receta(Request $request)
    {
        $this->validate($request,[
            'paciente'=>'required',
            'txtfecha'=>'required',
            'tipom'=>'required',
            'medicamento'=>'required',
            'informacion' => 'required',
            'dosis' => 'required',
            'periodo' => 'required',
            'observaciones' => 'required',
            'totalSum' => 'required',
        ]);
        $recetas = new Recetas;
        $recetas->idreceta = $request->idreceta;
        $recetas->fecha = $request->txtfecha;
        $recetas->paciente = $request->paciente;
        $recetas->medico = $request->medico;
        $recetas->tipomedicamento = $request->tipom;
        $recetas->medicamento = $request->medicamento;
        $recetas->informacion = $request->informacion;
        $recetas->dosis = $request->dosis;
        $recetas->periodo = $request->periodo;
        $recetas->observacion = $request->observaciones;
        $recetas->preciocon = $request->totalSum;
        $recetas->costoadicional = $request->ingreso1;
        $recetas->preciomed = $request->ingreso2;
        $recetas->totalpagar = $request->resultado;
        $recetas->save();
        Session::flash('mensaje', "La receta ha sido creada correctamente.");
        return redirect()->route('reporte_recetas');
        
    }
    public function reporte_recetas()
    {
      $sessionidusuario = session('sessionidusuario');
      if($sessionidusuario<>"")
      {
        $consulta = Recetas::select('recetas.idreceta','recetas.fecha','recetas.paciente','recetas.medico',
        'recetas.medicamento','recetas.dosis','recetas.periodo','recetas.totalpagar')
        ->orderBy('recetas.idreceta','desc')
        ->get();
        return view('Sistema/Recetas/reporterecetas')
        -> with('consulta',$consulta); 
      }
      else{
        return redirect('vistalogin')->with('status', 'Necesitas iniciar sesion');
      }
    }
    public function borrarreceta($idreceta){
        $pacientes=Recetas::find($idreceta)->forceDelete();
        Session::flash('mensaje', "La rereceta se elimino correctamente del sistema.");
      return redirect()->route('reporte_recetas');
      }
      public function getPdfRecetas(){
        set_time_limit(300);
        $pdfrecetas = Recetas::select('recetas.idreceta','recetas.fecha','recetas.paciente','recetas.medico',
        'recetas.medicamento','recetas.dosis','recetas.periodo','recetas.totalpagar')
        ->get();
    
        $pdf = PDF::loadView('Sistema/Recetas/pdfrecetas', compact('pdfrecetas'));
        return $pdf->download('pdf_Recetas.pdf');
      }
      public function exportrecetas(){
        return $this->excel->download(new RecetasExport, 'recetas.xlsx');
      }
      // ---------------------------------IMPRIMIR RECETA CON ID---------------------------------
      public function unicareceta($idreceta)
    {
      set_time_limit(300);
      $receta = DB::select("SELECT r.idreceta, r.fecha, r.paciente, r.medico,r.medicamento,r.informacion,
      r.dosis, r.periodo, r.observacion, r.totalpagar
      FROM recetas AS r WHERE r.idreceta = $idreceta");

      $pdfunic = PDF::loadView('Sistema/Recetas/receta', compact('receta'));
      Session::flash('mensaje', "La receta se imprio correctamente.");
      return $pdfunic->download('Receta.pdf');
    }
}
