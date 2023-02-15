<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tipo_sangres;
use App\Models\pacientes;

use Session;
class Tipo_sangreController extends Controller
{
    public function altatiposangre()
    {
    $consulta = tipo_sangres::withTrashed()->orderBy('idtipossan','DESC')->take(1)->get();
    $cuantos = count($consulta);

         if($cuantos==0)
         {
          $idesigue=1;
         }
         else
         {
          $idesigue = $consulta[0]->idtipossan + 1;
         }
        return view('tiposangre.altatiposangre')
        ->with('idsigue',$idesigue);
    }
    public function guardartiposan(Request $request)
    {
        $this->validate($request,[
             
             'tipos'=>'required|regex:/^[A-Z][A-Z,a-z, ,á,é,i,ó,ú,ü,Á,É,Í,Ó,Ú,Ü,+,-]+$/',
         ]);
        $tipo_sangres = new tipo_sangres;
        $tipo_sangres ->idtipossan=$request->idtipossan;
        $tipo_sangres->tipo=$request->tipos;
        $tipo_sangres ->save();
      Session::flash('mensaje', "El tipo de sangre  ha sido dado de alta correctamente.");
      return redirect()->route('reportetiposan');
    }
    public function reportetiposan()
    {
        $consulta = tipo_sangres::withTrashed()->select('tipo_sangres.idtipossan','tipo_sangres.tipo','tipo_sangres.deleted_at')
          ->orderBy('tipo_sangres.idtipossan')
          ->get();
          return view('tiposangre.reportetiposan')->with('consulta',$consulta);
    }
  public function desactivatiposangre($idtipossan)
  {

    $tiposangre = tipo_sangres::find($idtipossan);
    $tiposangre->delete();
    Session::flash('mensaje', "El tipo de sangre ah sido desactivado correctamete.");
      return redirect()->route('reportetiposan');
  }
  public function activatiposangre($idtipossan)
  {

    $tiposangre = tipo_sangres::withTrashed()->where('idtipossan',$idtipossan)->restore();
    Session::flash('mensaje', "El tipo de sangre ha sido activado correctamente.");
      return redirect()->route('reportetiposan');
  }
  public function borrartiposangre($idtipossan)
  {
    $buscatiposangre=pacientes::where('idtipossan',$idtipossan)->get();
    $cuantos = count($buscatiposangre);
    if($cuantos==0)
    {
     $tiposangre=tipo_sangres::withTrashed()->find($idtipossan)->forceDelete();
     Session::flash('mensaje', "El tipo de sangre  ha sido borrado del sistema correctamente.");
    return redirect()->route('reportetiposan');
    }else{
      Session::flash('mensaje2', "El tipo de sangre no puede eliminarse del sistema porque un paciente tiene este tipo de sangre.");
    return redirect()->route('reportetiposan');
    }
  }
  public function modificatiposangre($idtipossan){
   $consulta = tipo_sangres::withTrashed()->select('tipo_sangres.idtipossan','tipo_sangres.tipo')
    ->where('idtipossan',$idtipossan)
    ->get();
    $tipo_sangres = tipo_sangres::all();
    return view('tiposangre.modificatiposangre')
    ->with('consulta',$consulta[0])
    ->with('tipo_sangres', $tipo_sangres);
  }
  public function guardacambiostiposangre(Request $request){
    $this->validate($request,[
      'idtipossan'=>'required|numeric',
      'tipos'=>'required|regex:/^[A-Z][A-Z,a-z, ,á,é,i,ó,ú,ü,Á,É,Í,Ó,Ú,Ü,+,-]+$/',

    ]);
    $tipo_sangres = tipo_sangres::withTrashed()->find($request->idtipossan);
    $tipo_sangres ->idtipossan=$request->idtipossan;
     $tipo_sangres ->tipo=$request->tipos;
    
     $tipo_sangres ->save();
    Session::flash('mensaje', "El tipo $request->tipos ha sido dado modificado correctamente.");
    return redirect()->route('reportetiposan');
  }
   

}
