<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuarios;
use App\Models\Municipios;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Session;
use Illuminate\Support\Facades\Crypt;

class UsuariosController extends Controller
{
    //Alta en el formulario en el login//
    public function alta_usuarios(){
        $consulta = Usuarios::orderBy('idusuario','DESC')
            ->take(1)->get();

        $cuantos = count($consulta);
        if ($cuantos==0) {
            $idesigue = 1;
        } else {
            $idesigue = $consulta[0]->idusuario + 1;
        }

        $municipios = Municipios::orderBy('nombre')->get();

        // return $idesigue;
        return view('Login/registro')
            ->with('idesigue',$idesigue)
            ->with('municipios',$municipios);

    }
    public function guarda_usuarios(Request $request){

      $this->validate($request,[
            'nombre'=>'required|regex:/^[A-Z][A-Z,a-z, ,á,é,í,ó,ú,ü]+$/',
            'apellidop'=> 'required|regex:/^[A-Z][A-Z,a-z, ,á,é,í,ó,ú,ü,ñ]+$/',
            'apellidom'=> 'required|regex:/^[A-Z][A-Z,a-z, ,á,é,í,ó,ú,ü,ñ]+$/',
            'email'=> 'required|email',
            'edad'=> 'required',
            'telefono'=> 'required|regex:/^[0-9]{10}$/',
            
            'tiposangre'=>'required',
            'password'=>'required',
            'idmun'=>'required'
        ]);
        $passwordEncriptado = Hash::make($request->password);

        $usuarios = new Usuarios;
        $usuarios->idusuario = $request->idusuario;
        $usuarios->nombre = $request->nombre;
        $usuarios->apellidop = $request->apellidop;
        $usuarios->apellidom = $request->apellidom;
        $usuarios->fechanacimiento = $request->fechanacimiento;
        $usuarios->edad=$request->edad;
        $usuarios->sexo = $request->sexo;
        $usuarios->telefono=$request->telefono;
        $usuarios->tiposangre=$request->tiposangre;
        $usuarios->email = $request->email;
        $usuarios->password= Hash::make($request->password);
        $usuarios->idmun = $request->idmun;
        $usuarios->tipou = ('usuario');

        $usuarios->save();

        Session::flash('mensaje','Usuario creado');

        return view('Login/vistalogin');

    }

    public function consulta_usuarios(Request $request){
        $sessionidusuario = session('sessionidusuario');
          if($sessionidusuario<>"")
          {
            $crit = $request['criterio'];
            $res = DB::SELECT("SELECT usu.idusuario, usu.nombre, usu.apellidop, usu.apellidom, usu.edad, usu.sexo,
            usu.tiposangre, usu.telefono, usu.deleted_at, usu.email FROM usuarios AS usu
            WHERE (nombre LIKE '%$crit%' OR apellidop LIKE '%$crit%' OR apellidom LIKE '%$crit%')
            ORDER BY apellidop");
            
            // return $res;
            return view ("Sistema/Medicos/perfil",['res'=>$res, 'crit'=>$crit]);
          }else{
              return redirect('vistalogin')->with('status', 'Necesitas iniciar sesion');
            }
      }

      public function desactivausuario($idusuario){
        $usuarios = Usuarios::find($idusuario);
        $usuarios->delete();
        Session::flash('mensajedesactiva', "El paciente ha sido desactivado correctamente.");
          return redirect()->route('perfil');
      }
    
      public function activausuario($idusuario){
        $usuarios = Usuarios::withTrashed()->where('idusuario',$idusuario)->restore();
        Session::flash('mensaje', "El paciente ha sido activado correctamente.");
          return redirect()->route('perfil');
      }
    
      public function borrarusuario($idusuario){
        $usuarios=Usuarios::withTrashed()->find($idusuario)->forceDelete();
        Session::flash('mensajeerror', "El paciente  ha sido borrado del sistema correctamente.");
        return redirect()->route('perfil');
      }


    //Alta dentro del sistema //
    public function altausuarios(){
        $sessionidusuario = session('sessionidusuario');
        if($sessionidusuario<>"")
        {
            $consulta = Usuarios::orderBy('idusuario','DESC')
            ->take(1)->get();

            $cuantos = count($consulta);
            if ($cuantos==0) {
                $idesigue = 1;
            } else {
                $idesigue = $consulta[0]->idusuario + 1;
            }

            $municipios = Municipios::orderBy('nombre')->get();
        // return $idesigue;
        return view('Sistema/Pacientes/altapacientes')
            ->with('idesigue',$idesigue)
            ->with('municipios',$municipios);

        }else{
            return redirect('vistalogin')->with('status', 'Necesitas iniciar sesion');
          }
        
  }

  public function guardarusuarios(Request $request)
{
    
    $this->validate($request,[
        'nombre'=>'required|regex:/^[A-Z][A-Z,a-z, ,á,é,í,ó,ú,ü]+$/',
        'apellidop'=> 'required|regex:/^[A-Z][A-Z,a-z, ,á,é,í,ó,ú,ü,ñ]+$/',
        'apellidom'=> 'required|regex:/^[A-Z][A-Z,a-z, ,á,é,í,ó,ú,ü,ñ]+$/',
        'email'=> 'required|email',
        'edad'=> 'required',
        'telefono'=> 'required|regex:/^[0-9]{10}$/',
        
        'tiposangre'=>'required',
        'password'=>'required',
        'idmun'=>'required'
    ]);
    $passwordEncriptado = Hash::make($request->password);

    $usuarios = new Usuarios;
    $usuarios->idusuario = $request->idusuario;
    $usuarios->nombre = $request->nombre;
    $usuarios->apellidop = $request->apellidop;
    $usuarios->apellidom = $request->apellidom;
    $usuarios->fechanacimiento = $request->fechanacimiento;
    $usuarios->edad=$request->edad;
    $usuarios->sexo = $request->sexo;
    $usuarios->telefono=$request->telefono;
    $usuarios->tiposangre=$request->tiposangre;
    $usuarios->email = $request->email;
    $usuarios->password= Hash::make($request->password);
    $usuarios->idmun = $request->idmun;
    $usuarios->tipou = ('usuario');

    $usuarios->save();

    Session::flash('mensaje','Usuario creado');

    return redirect('consulta_usuarios');
}

public function modificausuarios($idusuario){
      
    $sessionidusuario = session('sessionidusuario');
      if($sessionidusuario<>"")
      {
        
        $consulta = Usuarios::withTrashed()
        ->join('municipios','usuarios.idmun', '=', 'municipios.idmun')
        ->select('usuarios.idusuario','usuarios.nombre','usuarios.apellidop','usuarios.apellidom','usuarios.edad', 'municipios.nombre as m',
        'usuarios.fechanacimiento','usuarios.telefono','usuarios.sexo','usuarios.email','usuarios.password','usuarios.tiposangre', 'usuarios.idmun')
        ->where('idusuario',$idusuario)
        ->get();
        

        
        $municipios = municipios::all();

        return view('Sistema/Pacientes/modificapacientes')
        ->with('consulta',$consulta[0])
        ->with('municipios',$municipios);
      }
      else{
        return redirect('vistalogin')->with('status', 'Necesitas iniciar sesion');
      }
  }

  public function guardarcambios(Request $request){
    $this->validate($request,[
        'nombre'=>'required|regex:/^[A-Z][A-Z,a-z, ,á,é,í,ó,ú,ü]+$/',
        'apellidop'=> 'required|regex:/^[A-Z][A-Z,a-z, ,á,é,í,ó,ú,ü,ñ]+$/',
        'apellidom'=> 'required|regex:/^[A-Z][A-Z,a-z, ,á,é,í,ó,ú,ü,ñ]+$/',
        'email'=> 'required|email',
        'edad'=> 'required',
        'telefono'=> 'required|regex:/^[0-9]{10}$/',
        
        'tiposangre'=>'required',
        'password'=>'required',
        'idmun'=>'required'
    ]);
    $passwordEncriptado = Hash::make($request->password);

    $usuarios = Usuarios::withTrashed()->find($request->idusuario);
    $usuarios->idusuario = $request->idusuario;
    $usuarios->nombre = $request->nombre;
    $usuarios->apellidop = $request->apellidop;
    $usuarios->apellidom = $request->apellidom;
    $usuarios->fechanacimiento = $request->fechanacimiento;
    $usuarios->edad=$request->edad;
    $usuarios->sexo = $request->sexo;
    $usuarios->telefono=$request->telefono;
    $usuarios->tiposangre=$request->tiposangre;
    $usuarios->email = $request->email;
    $usuarios->password= Hash::make($request->password);
    $usuarios->idmun = $request->idmun;
    $usuarios->tipou = ('usuario');

    $usuarios->save();

    Session::flash('mensaje','Usuario modificado');

    return redirect('consulta_usuarios');

  }
  
}


