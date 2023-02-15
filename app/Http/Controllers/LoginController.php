<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuarios;
use App\Models\medicos;
use App\Models\Consultas;
use Illuminate\Support\Facades\Hash;
use DB;
use Mail;
use Session;

class LoginController extends Controller
{
  public function pagina(){
    return view("Pagina/index");
  }
  public function vistalogin(){
       
    return view("Login/vistalogin");
  }
  public function principal()
  {
    $sessionidusuario = session('sessionidusuario');
    if($sessionidusuario<>"")
    {
      return view('mensaje');
    }else{
      return redirect('/')->with('status', 'Necesitas iniciar sesion');
    }
    
  }


  public function valida(Request $request)
      {
      $this ->validate($request,[
      'email'=>'email|required|email',
      'password'=>'required|min:5|alpha_num',
      
      ]);
      //return$credentials;
       $email = $request->input('email');
       $password =$request ->input('password');
       



       $consulta= Usuarios::where('email',$request->email)
          ->get();
        $cuantos = count($consulta);
        
          
                if($cuantos==1 and Hash::check($request->password,$consulta[0]->password))
                {
                  Session::put('sessionusuario',$consulta[0]->nombre . ' ' .$consulta[0]->apellidop . ' ' .$consulta[0]->apellidom);
                  Session::put('sessionnombre', $consulta[0]->nombre . ' ' .$consulta[0]->apellidop . ' ' .$consulta[0]->apellidom);
                  Session::put('sessiontipo', $consulta[0]->tipou);

                  Session::put('sessionidusuario', $consulta[0]->idusuario);

                  $request->session()->put('session_id',$consulta[0]->idusuario);

                  $request->session()->put('session_correo',$consulta[0]->email);

                  $session_id = $request -> session()->get('session_id');
                  $session_name = $request -> session()->get('session_name');
                  $session_correo = $request -> session()->get('session_correo');

                  $sessionusuario = session('sessionusuario');
                  $sessiontipo = session('sessiontipo');
                  
                  return redirect('principal')
                  ->with('sessionusuario',$sessionusuario);
            }
            else{
                return redirect('vistalogin')->with('status', 'El Usuario y/o contraseñas es incorrecto');

               // ->with('message', 'El Usuario y/o Contraseñas es incorrecto');
           
            }
            


        
          

  }
    public function logout(Request $request)
  {
    Session::forget('sessionusuario');
    Session::forget('sessiontipo');
    Session::forget('sessionidusuario');
    Session::flush();
      $request->session()->forget('session_id');
      $request->session()->forget('session_name');
      $request->session()->forget('session_correo');
      $request->session()->forget('session_idmedico');
      $request->session()->forget('session_correomedico');
      return redirect('vistalogin')->with('status', 'La sesion fue cerrada correctamente');
  }

  /// Restaurar contraseña ///
  public function restaurar(){
    return view('Login/recuperarcontra');
  }

  public function restaurarc(Request $req){
  $email  = $req['email'];
  $asunto = "Recuperación de contraseña";

  $res = DB::SELECT("SELECT * FROM usuarios WHERE email = '$email'");
  if($res!= null){
    $letras = "abcdefghijklmnopqrstuvwxyz0123456789";
    $nuevopw = substr (str_shuffle($letras),0,8);
    $passwordEncriptado = Hash::make($nuevopw);
    DB::SELECT("UPDATE usuarios SET password = '$passwordEncriptado' WHERE email = '$email'");

    // Envio de email con la nuevo contraseña" //

    $datos= array('destinatario'=>$email, 'nuevopw'=>$nuevopw);

    Mail::send('Login/contrarestaura', $datos,function($msj)
    use($email, $nuevopw, $asunto){
        $msj->from("mydentiss7@gmail.com", "Clinica San Miguel");
        $msj->subject($asunto);
        $msj->to($email);
    });

    Session::flash('mensaje','Revise su correo electronico');
    return view('Login/vistalogin');
    //echo "Tu nueva contraseña para acceder al sistema es: $nuevopw ";
  }
  else{
    return redirect('restaurar')->with('estado', 'El correo ingresado no se encuentra registrado');
    //echo "Tu correo no se encuntra registrado en la base de datos.";
  }
}
}
