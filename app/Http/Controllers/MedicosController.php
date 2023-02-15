<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\medicos;
use App\Models\municipios;
use App\Models\Pacientes;
use App\Models\Especialidades;
use App\Models\consultas;
use Session;
use Maatwebsite\Excel\Excel;
use App\Exports\MedicosExport;
use PDF;
use App\Models\Medico;
use Mail;

class MedicosController extends Controller
{
  private $excel;
  public function __construct(Excel $excel){
    $this->excel = $excel;
  }

  public function altamedico()
  {
    
      $consulta = Medico::orderBy('idmedico','DESC')
      ->take(1)->get();
      $cuantos = count($consulta);
      if($cuantos==0)
      {
          $idsigue = 1;
      } else{
          $idsigue = $consulta[0]->idmedico + 1;
      }
      $especialidades = Especialidades::orderBy('especialidad')->get();
      return view('Login/registromed')
      ->with('especialidades',$especialidades)
      ->with('idsigue', $idsigue);
  }

  public function vistamedicos()
  {
    $sessionmedico = session('sessionmedico');
    if($sessionmedico<>"")
    {
      return view("Sistema/Medicos/vistamedicos");
    }else{
      return redirect('loginmedicos')->with('status', 'Necesitas iniciar sesion');
    }
    
      
  }

  public function guardarmedico(Request $request){

      $file = $request->file('img');
        if($file<>""){
          $img = $file->getClientOriginalName();
          $img2 = $request->idmedico . $img;
          \Storage::disk('local')->put($img2, \File::get($file));
        }
        else{
          $img2 = "sinfoto.jpg";
        }

  $passwordEncriptado = Hash::make($request->password);

  $medico = new Medico;
  $medico->idmedico = $request->idmedico;
  $medico->nombre = $request->nombre;
  $medico->appaterno = $request->appaterno;
  $medico->apmaterno = $request->apmaterno;
  $medico->localidad = $request->localidad;
  $medico->telefono = $request->telefono;
  $medico->sexo = $request->sexo;
  $medico->cedula = $request->cedula;
  $medico->horainicio = $request->horainicio;
  $medico->horafin = $request->horafin;
  // $medico->direccionclinica = $request->direccionclinica;
  $medico->email = $request->email;
  $medico->password = Hash::make($request->password);
  $medico->idesp = $request->idesp;
  $medico->img = $img2;
  $medico->save();
  Session::flash('mensaje','Medico creado');
  return redirect()->route('loginmedicos');
  
}

public function perfil(Request $req){
  
  $sessionmedico = session('sessionmedico');
  $sessionnombre = session('sessionnombre');
      $crit = $req['criterio'];
      $res = DB::SELECT("SELECT  m.idmedico, m.nombre, m.appaterno,m.apmaterno, m.sexo, m.telefono, m.email,
      m.password, m.img, 
      m.idesp, es.especialidad AS especialidad,
      m.horainicio, m.horafin FROM medicos AS m
      INNER JOIN especialidades AS es ON m.idesp = es.idesp
      WHERE '$sessionnombre' = m.nombre
     ");

      $resu = DB::SELECT("SELECT usu.idusuario, usu.nombre, usu.apellidop, usu.apellidom, usu.edad, usu.sexo,
      usu.tiposangre, usu.telefono, usu.deleted_at, usu.email FROM usuarios AS usu
      WHERE (nombre LIKE '%$crit%' OR apellidop LIKE '%$crit%' OR apellidom LIKE '%$crit%')
      ORDER BY apellidop");
      // return $res;
      return view ("Sistema/Medicos/perfil",['res'=>$res, 'crit'=>$crit, 'resu'=>$resu]);
     
    
  }

  
  public function reportemedicos(Request $request){
    $sessionidusuario = session('sessionidusuario');
      if($sessionidusuario<>"")
      {
        $crit = $request['criterio'];
        $res = DB::SELECT("SELECT medicos.idmedico, medicos.nombre, medicos.appaterno, 
        medicos.apmaterno, medicos.horainicio, medicos.horafin, medicos.localidad, medicos.telefono, medicos.img, medicos.direccionclinica, medicos.idesp,es.especialidad AS especialidad,
        medicos.email FROM medicos
        INNER JOIN especialidades AS es ON medicos.idesp = es.idesp

        WHERE (nombre LIKE '%$crit%' OR appaterno LIKE '%$crit%' OR apmaterno OR localidad LIKE '%$crit%' OR direccionclinica LIKE '%$crit%')
        ORDER BY appaterno");
        // return $res;
        return view ("Sistema/Medicos/reportemedicos",['res'=>$res, 'crit'=>$crit]);
      }else{
          return redirect('vistalogin')->with('status', 'Necesitas iniciar sesion');
        }

  }

    public function desactivar_medicos($idmedico){
        $medicos=medicos::find($idmedico);
        $medicos->delete();
        Session::flash('mensajedesactiva',"El medico ha sido desactivado");
        return redirect()->route('consulta_medicos');
    }

    public function activar_medicos($idmedico){
        $medicos=medicos::withTrashed()->where('idmedico',$idmedico)->restore();
        Session::flash('mensaje',"El medico ha sido activado");
        return redirect()->route('consulta_medicos');
    }

    public function eliminar_medicos($idmedico){
        $buscaconsultas = consultas::where('idmedico',$idmedico)->get();
        $cuantos = count($buscaconsultas);
        if($cuantos==0)
        {
            $medicos=medicos::withTrashed()->find($idmedico)->forceDelete();
            Session::flash('mensajeerror',"El medico ha sido eliminado correctamente");
            return redirect()->route('consulta_medicos');
        }
        else{
          Session::flash('mensajeerror',"El medico no se puede eliminar por que tiene
                                        registros en otras tablas");
            return redirect()->route('consulta_medicos');

        }
    }


    public function altaconmedico($idmedico){
      $sessionidusuario = session('sessionidusuario');
      if($sessionidusuario<>"")
      {
        $contadorid = consultas::orderBy('idconsulta','DESC')
                            ->take(1)->get();
        $cuantos= count($contadorid);
          if($cuantos==0){
            $idsigue = 1;
          }
          else{
            $idsigue = $contadorid[0]->idconsulta+1;
          }
        $consulta = Medico::join('especialidades','medicos.idesp','=','especialidades.idesp')
                    ->select('medicos.idmedico','medicos.nombre','medicos.appaterno','medicos.apmaterno',
                             'medicos.sexo','medicos.telefono','medicos.email',
                             'medicos.password','medicos.direccionclinica',
                             'especialidades.especialidad as especi','medicos.horainicio','medicos.horafin',
                             'medicos.idesp','medicos.img')
                    ->where('idmedico',$idmedico)
                    ->get();

                    $municipios = municipios::all();
                    $especialidades = especialidades::all();
         return view('Sistema/Consultas/altaconmedico')
         ->with('idsigue',$idsigue)
        ->with('consulta',$consulta[0])
        ->with('municipios',$municipios)
        ->with('especialidades',$especialidades);
      }
      else{
        return redirect('vistalogin')->with('status', 'Necesitas iniciar sesion');
      }
    } 

    public function guardar_conmedico(Request $request)
    {
      $consultas = new consultas;
      $consultas->idconsulta = $request->idconsulta;
      $consultas->paciente = $request->paciente;
      $consultas->idmedico = $request->idmedico;
      $consultas->idesp = $request->idesp;
      $consultas->fecha_consulta = $request->fecha_consulta;
      $consultas->hora_consulta = $request->hora_consulta;
      $consultas->idstatus = (1);
      $consultas->observacion = $request->obser;
      $consultas->save();
  
      Session::flash('mensaje',"La consulta ha sido registrada correctamente");
      Session::flash('notifi', "Favor de revisar tu cuenta dentro de las proximas 12 horas para verificar
                                si tu consulta ha sido aceptada.");
      return redirect()->route('reporte_consultas');
    }
      
    public function descarga_imagen($img){
      $pathtoFile = public_path().'//archivos/'. $img;
      return response()->download($pathtoFile);
    }

    public function exportmedicos(){
      return $this->excel->download(new MedicosExport, 'medicos.xlsx');
    }

    public function getPdfMedicos(){
      set_time_limit(300);
    $pdfmedicos = medicos::withTrashed()
    ->join('especialidades','medicos.idesp','=','especialidades.idesp')
    ->select('medicos.idmedico','medicos.telefono','medicos.correo',
    'medicos.hora_entrada','medicos.hora_salida','especialidades.especialidad as esp',
    'medicos.nombre','medicos.appaterno','medicos.apmaterno','medicos.idesp','medicos.img')
    ->get();

    $pdf = PDF::loadView('Sistema/Medicos/pdfm', compact('pdfmedicos'));
    return $pdf->download('pdf_Medicos.pdf');
  }
  
}
