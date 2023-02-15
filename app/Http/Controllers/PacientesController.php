<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pacientes;
use App\Exports\PacientesExport;
use Maatwebsite\Excel\Excel;
use Illuminate\Support\Facades\DB;
use Session;
use PDF;


class PacientesController extends Controller
{
  private $excel;
  public function __construct(Excel $excel){
    $this->excel = $excel;
  }
  

        public function altapacientes(){
          $sessionidusuario = session('sessionidusuario');
      if($sessionidusuario<>"")
      {
          $consulta = pacientes::withTrashed()->orderBy('idpaciente','DESC')->take(1)->get();
          $cuantos = count($consulta);
          if($cuantos==0){
            $idesigue=1;
          }
          else{
            $idesigue = $consulta[0]->idpaciente + 1;
          }
          return view('Sistema/Pacientes/altapacientes')
          ->with('idesigue',$idesigue);
        }
        else{
          return redirect('vistalogin')->with('status', 'Necesitas iniciar sesion');
        }
    }

  public function guardarpaciente(Request $request){
    $this->validate($request,[
      'nombre'=> 'required|regex:/^[A-Z][A-Z,a-z, ,á,é,i,ó,ú,ü,Á,É,Í,Ó,Ú,Ü]+$/',
      'apellidop'=> 'required|regex:/^[A-Z][A-Z,a-z, ,á,é,í,ñ,ó,ú,ü,Á,É,Í,Ó,Ú,Ü]+$/',
      'apellidom'=> 'required|regex:/^[A-Z][A-Z,a-z, ,á,é,i,ó,ú,ü,Á,É,Í,Ó,Ú,Ü]+$/',
      'edad'=> 'required|regex:/^[0-99]{2}+$/',
      'telefono'=> 'required|regex:/^[0-9]{10}$/',
      'correo'=> 'required|email',
      'tiposangre'=>'required',
    ]);
    $pacientes = new pacientes;
    $pacientes ->idpaciente=$request->idpaciente;
    $pacientes ->nombre=$request->nombre;
    $pacientes ->apellidop=$request->apellidop;
    $pacientes ->apellidom=$request->apellidom;
    $pacientes ->edad=$request->edad;
    $pacientes ->sexo = $request->sexo;
    $pacientes ->telefono=$request->telefono;
    $pacientes ->correo=$request->correo;
    $pacientes ->tiposangre=$request->tiposangre;
    $pacientes ->save();

    Session::flash('mensaje', "El paciente $request->nombre $request->apellidop ha sido dado de alta correctamente.");
    return redirect()->route('consulta_pacientes');
  }

 

  public function consulta_pacientes(Request $request){
    $sessionidusuario = session('sessionidusuario');
      if($sessionidusuario<>"")
      {
        $crit = $request['criterio'];
        $res = DB::SELECT("SELECT pacientes.idpaciente, pacientes.nombre, pacientes.apellidop, 
        pacientes.apellidom, pacientes.sexo, pacientes.tiposangre, pacientes.telefono,
        pacientes.correo, pacientes.deleted_at FROM pacientes 
        WHERE (nombre LIKE '%$crit%' OR apellidop LIKE '%$crit%' OR apellidom LIKE '%$crit%')
        ORDER BY apellidop");
        // return $res;
        return view ("Sistema/Medicos/perfil",['res'=>$res, 'crit'=>$crit]);
      }else{
          return redirect('vistalogin')->with('status', 'Necesitas iniciar sesion');
        }
  }


  public function desactivapaciente($idpaciente){
    $pacientes = pacientes::find($idpaciente);
    $pacientes->delete();
    Session::flash('mensajedesactiva', "El paciente ha sido desactivado correctamente.");
      return redirect()->route('consulta_pacientes');
  }

  public function activapaciente($idpaciente){
    $pacientes = pacientes::withTrashed()->where('idpaciente',$idpaciente)->restore();
    Session::flash('mensaje', "El paciente ha sido activado correctamente.");
      return redirect()->route('consulta_pacientes');
  }

  public function borrarpaciente($idpaciente){
    $pacientes=pacientes::withTrashed()->find($idpaciente)->forceDelete();
    Session::flash('mensajeerror', "El paciente  ha sido borrado del sistema correctamente.");
    return redirect()->route('consulta_pacientes');
  }

  public function modificapacientes($idpaciente){
    $sessionidusuario = session('sessionidusuario');
      if($sessionidusuario<>"")
      {
        $consulta = pacientes::withTrashed()
        ->select('pacientes.idpaciente','pacientes.nombre','pacientes.apellidop','pacientes.apellidom','pacientes.edad',
            'pacientes.telefono','pacientes.sexo','pacientes.correo','pacientes.tiposangre')
        ->where('idpaciente',$idpaciente)
        ->get();

        return view('Sistema/Pacientes/modificapacientes')
        ->with('consulta',$consulta[0]);
      }
      else{
        return redirect('vistalogin')->with('status', 'Necesitas iniciar sesion');
      }
  }

  public function guardacambiospaciente(Request $request){
    $this->validate($request,[
      'nombre'=> 'required|regex:/^[A-Z][A-Z,a-z, ,á,é,i,ó,ú,ü,Á,É,Í,Ó,Ú,Ü]+$/',
      'apellidop'=> 'required|regex:/^[A-Z][A-Z,a-z, ,á,é,í,ñ,ó,ú,ü,Á,É,Í,Ó,Ú,Ü]+$/',
      'apellidom'=> 'required|regex:/^[A-Z][A-Z,a-z, ,á,é,i,ó,ú,ü,Á,É,Í,Ó,Ú,Ü]+$/',
      'edad'=> 'required|regex:/^[0-99]{2}+$/',
      'telefono'=> 'required|regex:/^[0-9]{10}$/',
      'correo'=> 'required|email',
      'tiposangre'=>'required',
    ]);

     $pacientes = pacientes::withTrashed()->find($request->idpaciente);
     $pacientes ->idpaciente=$request->idpaciente;
     $pacientes ->nombre=$request->nombre;
     $pacientes ->apellidop=$request->apellidop;
     $pacientes ->apellidom=$request->apellidom;
     $pacientes ->edad=$request->edad;
     $pacientes ->sexo = $request->sexo;
     $pacientes ->telefono=$request->telefono;
     $pacientes ->correo=$request->correo;
     $pacientes ->tiposangre=$request->tiposangre;
     $pacientes ->save();
    Session::flash('mensajemodifica', "El paciente $request->nombre $request->apellidop ha sido dado modificado correctamente.");
    return redirect()->route('consulta_pacientes');
  }

  public function getPdfPacientes(){
    set_time_limit(300);
    $pdfpacientes = pacientes::withTrashed()->
    select('pacientes.idpaciente','pacientes.nombre','pacientes.apellidop','pacientes.apellidom','pacientes.sexo',
    'pacientes.tiposangre','pacientes.telefono','pacientes.correo','deleted_at')
    ->get();

    $pdf = PDF::loadView('Sistema/Pacientes/pdfpacientes', compact('pdfpacientes'));
    return $pdf->download('pdf_Pacientes.pdf');
  }

  public function exportpacientes(){
    return $this->excel->download(new PacientesExport, 'pacientes.xlsx');
  }

}
