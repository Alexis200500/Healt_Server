<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\ConsultasController;
use App\Http\Controllers\MedicosController;
use App\Http\Controllers\PacientesController;
use App\Http\Controllers\CuponesController;
use App\Http\Controllers\CitasController;
use App\Http\Controllers\RecetasController;
use App\Http\Controllers\EncuestaController;
use App\Http\Controllers\ControllerEvento;
use App\Http\Controllers\LoginMedicosController;

/*

|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Route::get('dashboard', function () {
//     return view('plantilla');
// });

/// Página web 

Route::get('/',[LoginController::class,'pagina'])->name('/');

/// Login 
Route::get('vistalogin',[LoginController::class,'vistalogin'])->name('vistalogin');

Route::get('plantilla',[LoginController::class,'plantilla'])->name('plantilla');

//Login medicos //
Route::get('loginmedicos',[LoginMedicosController::class,'loginmedicos'])->name('loginmedicos');
Route::post('validamedico',[LoginMedicosController::class,'validamedico'])->name('validamedico');
Route::get('vistamedicos' ,[MedicosController::class, 'vistamedicos'])->name('vistamedicos');
/// Rutas restauracion de contraseña ///
Route::get('restaurarconmed',[LoginMedicosController::class,'restaurarconmed'])->name('restaurarconmed');
Route::get('restaurarcmed',[LoginMedicosController::class,'restaurarcmed'])->name('restaurarcmed');

//Registro medicos chida//
Route::get('altamedico',[MedicosController::class, 'altamedico'])->name('altamedico');
Route::post('gaurdarmedico',[MedicosController::class, 'guardarmedico'])->name('guardarmedico');
Route::get('perfil',[MedicosController::class, 'perfil'])->name('perfil');
// Route::get('reportemedicos',[MedicosController::class,'reportemedicos'])->name('reportemedicos');


Route::get('alta_usuarios',[UsuariosController::class,'alta_usuarios'])->name('alta_usuarios');
Route::post('guarda_usuarios',[UsuariosController::class,'guarda_usuarios'])->name('guarda_usuarios');
Route::get('consulta_usuarios',[UsuariosController::class,'consulta_usuarios'])->name('consulta_usuarios');
Route::get('buscarusuario',[UsuariosController::class,'consulta_usuarios'])->name('buscarusuario');

Route::get('/desactivausuario/{idusuario}',[UsuariosController::class,'desactivausuario'])->name('desactivausuario');
Route::get('/activausuario/{idusuario}',[UsuariosController::class,'activausuario'])->name('activausuario');
Route::get('/borrarusuario/{idusuario}',[UsuariosController::class,'borrarusuario'])->name('borrarusuario');


Route::post('guardarusuarios',[UsuariosController::class,'guardarusuarios'])->name('guardarusuarios');
Route::get('/modificausuarios/{idusuario}',[UsuariosController::class,'modificausuarios'])->name('modificausuarios');
Route::post('/guardarcambios',[UsuariosController::class,'guardarcambios'])->name('guardarcambios');
/// Iniciar sesion ///
Route::get('login',[LoginController::class,'login'])->name('login');
Route::post('valida',[LoginController::class,'valida'])->name('valida');
Route::get('logout',[LoginController::class,'logout'])->name('logout');
Route::get('pacientes',[LoginController::class,'pacientes'])->name('pacientes');
Route::get('principal',[LoginController::class,'principal'])->name('principal');
Route::get('pacientesusuario',[MedicosController::class,'altapacientes'])->name('pacientesusuario');
Route::post('/guardarpacientes',[MedicosController::class,'guardarpacientes'])->name('guardarpacientes');


/// Rutas restauracion de contraseña ///
Route::get('restaurar',[LoginController::class,'restaurar'])->name('restaurar');
Route::get('restaurarc',[LoginController::class,'restaurarc'])->name('restaurarc');

/// CRUD CONSULTAS ///
Route::get('altaconsulta',[ConsultasController::class,'altaconsulta'])->name('altaconsulta');
Route::get('reporteconsultas',[ConsultasController::class,'reporteconsultas'])->name('reporteconsultas');
Route::post('guardarconsulta',[ConsultasController::class,'guardarconsulta'])->name('guardarconsulta');
Route::get('modificarconsulta/{idconsulta}',[ConsultasController::class,'modificarconsulta'])->name('modificarconsulta');
Route::POST('guardacambios',[ConsultasController::class,'guardacambios'])->name('guardacambios');
route::get('desactivaconsulta/{idconsulta}',[ConsultasController::class,'desactivaconsulta'])->name('desactivaconsulta');
route::get('activarconsulta/{idconsulta}',[ConsultasController::class,'activarconsulta'])->name('activarconsulta');
route::get('borraconsulta/{idconsulta}',[ConsultasController::class,'borraconsulta'])->name('borraconsulta');
Route::get('verconsulta/{idconsulta}',[ConsultasController::class,'verconsulta'])->name('verconsulta');



Route::get('reporte_consulta',[ConsultasController::class,'reporte_consulta'])->name('reporte_consultas');
Route::get('buscarconsulta',[ConsultasController::class,'reporte_consulta'])->name('buscarconsulta');
/// Pdf ///
//PDF CONSULTAS
Route::name('pdfconsultas')->get('pdfconsultas',[ConsultasController::class,'getPdfConsultas']);
//EXCEL CONSULTAS
Route::name('export')->get('export',[ConsultasController::class,'export']);

// CRUDS MEDICOS //
Route::get('/alta_medicos',[MedicosController::class,'alta_medicos'])->name('alta_medicos');
Route::post('/guardar_medicos',[MedicosController::class,'guardar_medicos'])->name('guardar_medicos');
Route::get('/altaconmedico/{idmedico}',[MedicosController::class,'altaconmedico'])->name('altaconmedico');
Route::get('/activar_medicos/{idmedico}',[MedicosController::class,'activar_medicos'])->name('activar_medicos');
Route::get('/desactivar_medicos/{idmedico}',[MedicosController::class,'desactivar_medicos'])->name('desactivar_medicos');
Route::get('/eliminar_medicos/{idmedico}',[MedicosController::class,'eliminar_medicos'])->name('eliminar_medicos');
Route::get('/descarga_imagen/{img}',[MedicosController::class,'descarga_imagen'])->name('descarga_imagen');
Route::post('/guardar_conmedico',[MedicosController::class,'guardar_conmedico'])->name('guardar_conmedico');

Route::get('consulta_medicos',[MedicosController::class,'consulta_medicos'])->name('consulta_medicos');
Route::get('reportemedicos',[MedicosController::class,'reportemedicos'])->name('reportemedicos');



Route::get('consulta_pacientes',[PacientesController::class,'consulta_pacientes'])->name('consulta_pacientes');
Route::get('buscarpaciente',[PacientesController::class,'consulta_pacientes'])->name('buscarpaciente');
/// Excel consultas ///
Route::name('exportmedicos')->get('exportmedicos',[MedicosController::class,'exportmedicos']);
//PDF CONSULTAS //
Route::name('pdfmedicos')->get('pdfmedicos',[MedicosController::class,'getPdfMedicos']);

//// CRUD PACIENTES ////
Route::get('/altapacientes',[PacientesController::class,'altapacientes'])->name('altapacientes');
Route::post('/guardarpaciente',[PacientesController::class,'guardarpaciente'])->name('guardarpaciente');
Route::get('/reportepacientes',[PacientesController::class,'reportepacientes'])->name('reportepacientes');
Route::get('/desactivapaciente/{idpaciente}',[PacientesController::class,'desactivapaciente'])->name('desactivapaciente');
Route::get('/activapaciente/{idpaciente}',[PacientesController::class,'activapaciente'])->name('activapaciente');
Route::get('/borrarpaciente/{idpaciente}',[PacientesController::class,'borrarpaciente'])->name('borrarpaciente');
Route::get('/modificapacientes/{idpaciente}',[PacientesController::class,'modificapacientes'])->name('modificapacientes');
Route::post('/guardacambiospaciente',[PacientesController::class,'guardacambiospaciente'])->name('guardacambiospaciente');
//PDF CONSULTAS //
Route::name('pdfpacientes')->get('pdfpacientes',[PacientesController::class,'getPdfPacientes']);
Route::name('exportpacientes')->get('exportpacientes',[PacientesController::class,'exportpacientes']);

//// CRUD CUPONES /////


// CRUD CITAS
Route::get('/registrocitas',[CitasController::class,'registrocitas'])->name('registrocitas');
Route::post('/citaguardada',[CitasController::class,'citaguardada'])->name('citaguardada');
Route::get('/calendario',[CitasController::class,'calendario'])->name('calendario');


Route::get('event', [CitasController::class, 'index']);
Route::post('eventAjax', [CitasController::class, 'ajax']);

// RECETAS //
Route::get('/vistareceta',[RecetasController::class, 'vistareceta'])->name('vistareceta');
Route::post('/guardar_receta',[RecetasController::class,'guardar_receta'])->name('guardar_receta');
Route::get('/reporte_recetas',[RecetasController::class, 'reporte_recetas'])->name('reporte_recetas');
route::get('borrarreceta/{idreceta}',[RecetasController::class,'borrarreceta'])->name('borrarreceta');
Route::name('pdfrecetas')->get('pdfrecetas',[RecetasController::class,'getPdfRecetas']);
Route::name('exportrecetas')->get('exportrecetas',[RecetasController::class,'exportrecetas']);
Route::name('unicareceta')->get('unicareceta/{idreceta}',[RecetasController::class,'unicareceta']);

// ENCUESTA COVID //

Route::get('/encuesta_covid',[EncuestaController::class, 'encuesta_covid'])->name('encuesta_covid');

//CALENDARIO//
Route::name('Calendar/event')->get('Calendar/event',[ControllerEvento::class, 'index']);
Route::name('Calendar/event')->get('Calendar/event/{month}',[ControllerEvento::class, 'index_month']);

Route::name('Evento/Form')->get('Evento/Form',[ControllerEvento::class, 'form']);
Route::name('Evento/create')->post('Evento/create',[ControllerEvento::class, 'create']);
Route::name('Evento/details')->get('Evento/details/{idconsulta}',[ControllerEvento::Class, 'details']);
Route::name('/Evento/index')->get('Evento/index',[ControllerEvento::class, 'index']);
Route::name('Evento/index')->get('Evento/index/{month}',[ControllerEvento::class, 'index_month']);
Route::name('Evento/calendario')->post('Evento/calendario',[ControllerEvento::class, 'calendario']);