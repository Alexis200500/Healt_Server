<?php

namespace App\Http\Controllers;

use Session;
use DB;
use Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Medico;
use App\Models\Especialidades;






class LoginMedicosController extends Controller
{
    public function loginmedicos(){
        return view("Login/Loginmedicos");
    }

   
    public function validamedico(Request $request){

        $this ->validate($request,[
            'email'=>'email|required|email',
            'password'=>'required|min:5|alpha_num',
            
        ]);

         $email = $request->input('email');
         $password =$request ->input('password');
            
         $consultas= Medico::where('email',$request->email)
            ->get();
         $cuantos = count($consultas);

            if($cuantos==1 and Hash::check($request->password,$consultas[0]->password))
            {
                Session::put('sessionmedico', $consultas[0]->nombre . ' ' .$consultas[0]->appaterno . ' ' .$consultas[0]->apmaterno);
                Session::put('sessionnombre', $consultas[0]->nombre);
                Session::put('sessiontipom', $consultas[0]->tipo);
                $sessionm = session('sessionm');
                $sessnombre = session('sessionnombre');
                $sessiontipom = session('sessiontipom');

                 return redirect('perfil')
                 ->with('sessionnombre', $sessnombre)
                 ->with('sessiontipom', $sessiontipom);
            }
            else{
                return redirect('loginmedicos')->with('status', 'El correo y/o contraseña es incorrecto');
            }  
    }
    public function logout()
    {
        Session::forget('sessionmedico');
        Session::flush();
        return redirect('/')->with('status', 'La sesión fue cerrada correctamente');
    }

    public function restaurarconmed()
    {
        return view('Login/recuperarcontramed');
    }

    public function restaurarcmed(Request $req)
    {
        $email  = $req['email'];
        $asunto = "Recuperación de contraseña";

    $res = DB::SELECT("SELECT * FROM medicos WHERE email = '$email'");
    if($res!= null){
    $letras = "abcdefghijklmnopqrstuvwxyz0123456789";
    $nuevopw = substr (str_shuffle($letras),0,8);
    $passwordEncriptado = Hash::make($nuevopw);
    DB::SELECT("UPDATE medicos SET password = '$passwordEncriptado' WHERE email = '$email'");

    // Envio de email con la nuevo contraseña" //

    $datos= array('destinatario'=>$email, 'nuevopw'=>$nuevopw);

    Mail::send('Login/contrarestaura', $datos,function($msj)
    use($email, $nuevopw, $asunto){
        $msj->from("mydentiss7@gmail.com", "Clinica San Miguel");
        $msj->subject($asunto);
        $msj->to($email);
    });

    Session::flash('mensaje','Revise su correo electronico');
    return view('Login/loginmedicos');
    //echo "Tu nueva contraseña para acceder al sistema es: $nuevopw ";
  }
        else{
            return redirect('restaurarconmed')->with('estado', 'El correo no se encuentra en nuestros registros');
        }
    }
}