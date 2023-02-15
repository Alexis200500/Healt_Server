<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\consultas;
use App\Models\statuses;
use App\Models\Usuarios;
use App\Models\Medico;
use App\Models\Especialidades;
use PDF;
use Session;
use Maatwebsite\Excel\Excel;
use App\Exports\ConsultasExport;


class ConsultasController extends Controller
{
  private $excel;
  public function __construct(Excel $excel){
    $this->excel = $excel;
  }

  public function altaconsulta(){
  $sessionidusuario = session('sessionidusuario');
  if($sessionidusuario<>"")
  {
    $consultamed = DB::SELECT("SELECT medicos.idmedico, medicos.nombre, medicos.appaterno, 
        medicos.apmaterno, medicos.horainicio, medicos.horafin, medicos.localidad, medicos.telefono, medicos.img, medicos.direccionclinica, medicos.idesp,es.especialidad AS especialidad,
        medicos.email FROM medicos
        INNER JOIN especialidades AS es ON medicos.idesp = es.idesp");
    

      $consulta = consultas::withTrashed()->orderBy('idconsulta','DESC')
                            ->take(1)->get();
      $cuantos= count($consulta);
      if($cuantos==0){
      $idsigue = 1;
      }
      else{
      $idsigue = $consulta[0]->idconsulta+1;
      }
     

      $status = statuses::orderBy('nombre')->get();
      $Medico = Medico::all();
      $especialidades = especialidades::orderBy('especialidad')->get();
      $sessionusuarios = session('sessionusuarios');

      return view('Sistema/Consultas/altaconsulta')
            ->with('idsigue',$idsigue)
            ->with('statuses',$status)
            ->with('Medico',$Medico)
            ->with('consultamed',$consultamed[0])
            ->with('especialidades',$especialidades);
  }
  else{
    return redirect('vistalogin')->with('status', 'Necesitas iniciar sesion');
  }
}

  public function guardarconsulta(Request $request){
    $this->validate($request,[
      'fecha_consulta' => 'required|date',
      'hora_consulta' => 'required',
      'peso' => 'required|regex:/^[0-9]*$/',
      'obser' => 'required|regex:/^[A-Z][A-Z,a-z, ,á,é,í,ó,ú,ü]+$/',
      'idesp' => 'required',
      'idmedico'=>'required',
      
    ]);

    $consultas = new consultas;
    $consultas->idconsulta = $request->idconsulta;
    $consultas->paciente = $request->paciente;
    $consultas->idmedico = $request->idmedico;
    $consultas->idesp = $request->idesp;
    $consultas->fecha_consulta = $request->fecha_consulta;
    $consultas->hora_consulta = $request->hora_consulta;
    $consultas->peso = $request->peso;
    $consultas->idstatus = (1);
    $consultas->observacion = $request->obser;
    $consultas->save();

    Session::flash('mensaje',"La consulta ha sido registrada correctamente");
    return redirect()->route('reporte_consultas');
  }

  public function reporteconsultas(){
    $sessionidusuario = session('sessionidusuario');
    
      if($sessionidusuario<>"")
      {
        
          $consulta = consultas::withTrashed()
                                ->join('Medico','consultas.idmedico','=','Medico.idmedico')
                                ->join('especialidades','consultas.idesp','=','especialidades.idesp')
                                ->join('statuses','consultas.idstatus','=','statuses.idstatus')

          ->select('consultas.idconsulta','consultas.fecha_consulta','consultas.paciente','consultas.hora_consulta','consultas.observacion',
                  'statuses.nombre as status','consultas.idstatus','Medico.nombre as medico','especialidades.especialidad as esp','especialidades.especialidad','Medico.appaterno','Medico.apmaterno','consultas.deleted_at')
          ->orderBy('idconsulta','DESC')
          ->get();
          return view('Sistema/Consultas/reporteconsultas')->with('consulta',$consulta);
      }
      else{
        return redirect('vistalogin')->with('status', 'Necesitas iniciar sesion');
      }
  }
  
  public function reporte_consulta(Request $req){
    $sessiontipou = session('sessiontipo');
    if($sessiontipou=="usuario"){
    $sessionnombre = session('sessionnombre');
    $sessionidusuario = session('sessionidusuario');
    
    
    if($sessionidusuario<>"")
    {
      $crit = $req['criterio'];
      $res = DB::SELECT("SELECT c.idconsulta, c.fecha_consulta,c.paciente ,c.deleted_at, c.hora_consulta,c.idesp,es.especialidad AS especialidad,
      c.idmedico,med.nombre,med.appaterno,med.apmaterno
      AS apmaterno, c.idstatus,stat.nombre AS estatuscon, c.peso,c.observacion FROM consultas AS c
     INNER JOIN especialidades AS es ON c.idesp = es.idesp
     INNER JOIN medicos AS med ON c.idmedico = med.idmedico
     INNER JOIN statuses AS stat ON c.idstatus = stat.idstatus 
     WHERE '$sessionnombre' = c.paciente
     ");
      // return $res;
      return view ("Sistema/Consultas/reporteconsultas",['res'=>$res, 'crit'=>$crit]);
    }else{
      return redirect('vistalogin')->with('status', 'Necesitas iniciar sesion');
    }
  }
  else{
    $crit = $req['criterio'];
      $res = DB::SELECT("SELECT c.idconsulta, c.fecha_consulta,c.paciente ,c.deleted_at, c.hora_consulta,c.idesp,es.especialidad AS especialidad, c.idmedico,med.nombre,med.appaterno,med.apmaterno
      AS apmaterno, c.idstatus,stat.nombre AS estatuscon, c.peso,c.observacion FROM consultas AS c
     INNER JOIN especialidades AS es ON c.idesp = es.idesp
     INNER JOIN medicos AS med ON c.idmedico = med.idmedico
     INNER JOIN statuses AS stat ON c.idstatus = stat.idstatus 
     AND (paciente LIKE '%$crit%' OR fecha_consulta LIKE '%$crit%' OR hora_consulta LIKE '%$crit%') ORDER BY c.idconsulta DESC");
      // return $res;
      return view ("Sistema/Consultas/reporteconsultas",['res'=>$res, 'crit'=>$crit]);
  }
  }
  
  public function desactivaconsulta($idconsulta){
    $consultas = consultas::find($idconsulta);
    $consultas->delete();

    Session::flash('mensajedesactiva',"La consulta ha sido desactivada correctamente");
    return redirect()->route('reporte_consultas');
  }

  public function activarconsulta($idconsulta){
    $consultas = consultas::withTrashed()->where('idconsulta',$idconsulta)->restore();

    Session::flash('mensaje',"La consulta ha sido activada correctamente del sistema");
    return redirect()->route('reporte_consultas');
  }

  public function borraconsulta($idconsulta){
    $consultas = consultas::withTrashed()->find($idconsulta)->forceDelete();

    Session::flash('mensajeborrar',"La consulta ha sido borrada correctamente del sistema");
    return redirect()->route('reporte_consultas');
  }


  public function modificarconsulta ($idconsulta){
    $sessionidusuario = session('sessionidusuario');
      if($sessionidusuario<>"")
      {
        $consulta = consultas::withTrashed()
                              ->join('medicos','consultas.idmedico','=','medicos.idmedico')

                              ->join('statuses','consultas.idstatus','=','statuses.idstatus')
                              ->join('especialidades','consultas.idesp','=','especialidades.idesp')
        ->select('consultas.idconsulta','consultas.fecha_consulta','consultas.hora_consulta','consultas.observacion','consultas.peso',
                'especialidades.especialidad as esp','consultas.paciente',

                'medicos.nombre','medicos.appaterno','medicos.apmaterno',

                'consultas.idmedico','statuses.nombre as stat','consultas.idstatus','consultas.idesp')
        ->where('idconsulta',$idconsulta)
        ->get();
        $Medico = Medico::all();
        $statuses = statuses::all();
        $especialidades = especialidades::all();
        return view ('Sistema/Consultas/modificarconsulta')
        ->with('consulta',$consulta[0])
        ->with('Medico',$Medico)
        ->with('statuses',$statuses)
        ->with('especialidades',$especialidades);
      }
      else{
        return redirect('vistalogin')->with('status', 'Necesitas iniciar sesion');
      }
  }

  public function guardacambios(Request $request){
    $this->validate($request,[
      'fecha_consulta' => 'required|date',
      'hora_consulta' => 'required',
      'peso' => 'required|regex:/^[0-9]*$/',
      'obser' => 'required|regex:/^[A-Z][A-Z,a-z, ,á,é,í,ó,ú,ü]+$/',
      'idesp' => 'required',
      'idmedico'=>'required',
      
    ]);

    $consultas=consultas::withTrashed()->find($request->idconsulta);
    $consultas->idconsulta = $request->idconsulta;
    $consultas->idmedico = $request->idmedico;
    $consultas->idesp = $request->idesp;
    $consultas->fecha_consulta = $request->fecha_consulta;
    $consultas->hora_consulta = $request->hora_consulta;
    $consultas->peso = $request->peso;
    $consultas->observacion = $request->obser;
    $consultas->idstatus = $request->idstatus;
    $consultas->save();

    //return $request;

    Session::flash('mensajemodifica',"La consulta ha sido modificada correctamente");
    return redirect()->route('reporte_consultas');
  }

  public function getPdfConsultas(){
    set_time_limit(300);
    $pdfconsulta = consultas::withTrashed()
    ->join('Medico','consultas.idmedico','=','Medico.idmedico')

    ->join('statuses','consultas.idstatus','=','statuses.idstatus')
    ->join('especialidades','consultas.idesp','=','especialidades.idesp')
    ->select('consultas.idconsulta','consultas.fecha_consulta','consultas.hora_consulta',
    'consultas.observacion','consultas.peso', 'especialidades.especialidad as esp',
    'Medico.nombre','Medico.appaterno','Medico.apmaterno',
    'consultas.idmedico','statuses.nombre as stat','consultas.idstatus','consultas.idesp')
    ->get();

    $pdf = PDF::loadView('Sistema/Consultas/pdf', compact('pdfconsulta'));
    return $pdf->download('pdf_Consultas.pdf');
  }

  public function export(){
    return $this->excel->download(new ConsultasExport, 'consultas.xlsx');
  }

  public function verconsulta ($idconsulta){
    $sessionidusuario = session('sessionidusuario');
      if($sessionidusuario<>"")
      {
        $consulta = consultas::withTrashed()
                              ->join('medicos','consultas.idmedico','=','medicos.idmedico')

                              ->join('statuses','consultas.idstatus','=','statuses.idstatus')
                              ->join('especialidades','consultas.idesp','=','especialidades.idesp')
        ->select('consultas.idconsulta','consultas.fecha_consulta','consultas.hora_consulta','consultas.observacion','consultas.peso',
                'especialidades.especialidad as esp','consultas.paciente',

                'medicos.nombre','medicos.appaterno','medicos.apmaterno',

                'consultas.idmedico','statuses.nombre as stat','consultas.idstatus','consultas.idesp')
        ->where('idconsulta',$idconsulta)
        ->get();
        $Medico = Medico::all();
        $statuses = statuses::all();
        $especialidades = especialidades::all();
        return view ('Sistema/Consultas/verconsulta')
        ->with('consulta',$consulta[0])
        ->with('Medico',$Medico)
        ->with('statuses',$statuses)
        ->with('especialidades',$especialidades);
      }
      else{
        return redirect('vistalogin')->with('status', 'Necesitas iniciar sesion');
      }
  }
  
  
}
