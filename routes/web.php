<?php

use App\Http\Controllers\AssignmentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehiculoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\EventoController;
use App\Models\assignment;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
  return view('auth.login');
});



Auth::routes();
Route::group(['middleware' => ['logout']], function () {
  Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('roles', 'RoleController');
    Route::resource('usuarios', 'UsuarioController');
    Route::resource('vehiculos', 'VehiculoController');
    Route::get('/vehiculos/{id}', 'VehiculoController@edit')->name('vehiculos.editar');
    Route::put('/status/{id}', 'VehiculoController@vehiculos_update')->name('vehiculos.status');

    Route::get('/vehiculos/perfil/{vehiculo}', 'VehiculoController@show')->name('vehiculo.perfil');
    Route::resource('modelos', 'ModeloController');
    Route::resource('tipos', 'TipoVehiculoController');

    //Rutas agenda
    Route::post('/home/agregar', [App\Http\Controllers\EventoController::class, 'store']);
    Route::post('/home/mostrar', [App\Http\Controllers\EventoController::class, 'show']);
    Route::post('/home/editar/{id}', [App\Http\Controllers\EventoController::class, 'edit']);
    Route::post('/home/actualizar/{evento}', [App\Http\Controllers\EventoController::class, 'update']);
    Route::post('/home/eliminar/{id}', [App\Http\Controllers\EventoController::class, 'destroy']);
    //Rutas indicentes
    Route::resource('incidentes', 'incidenteController');
    //Rutas Marcas
    Route::resource('marcas', 'MarcaController');
    //Ruta Gastos
    Route::resource('gastos', 'GastoController');
    //Rutas Modulo Mantenimiento
    Route::resource('servicios', 'mantenimientoController');
    Route::get('vehiculo/mantenimiento/{id}', 'mantenimientoController@mantenimiento')->name('mantenimiento.vehiculo');
    Route::put('manteniento/alta/{id}', 'mantenimientoController@alta_update')->name('mantenimiento.alta');
    Route::get('mantenimiento/entrega/{id}', 'mantenimientoController@alta_edit')->name('mantenimiento.entrega');
    //Ruta Conductor
    Route::resource('conductores', 'ConductorController');
    Route::put('/status/conductor/{id}', 'ConductorController@drivers_update')->name('conductores.status');
    //Ruta Proveedor
    Route::resource('proveedores', 'ProveedoresController');
    //Ruta Servicios
    Route::resource('catalogo', 'ServiceController');
    Route::get('/servicios/detallado/{service}', 'mantenimientoController@show')->name('servicio.detallado');
    //Rutas mecanicos
    Route::resource('mecanico', 'MecanicoController');
    //Rutas de asignaciones
    Route::resource('asignaciones', 'AssignmentController');
    Route::get('/vehiculo/asignacion/{id}', 'AssignmentController@asignacion')->name('asignacion.assignment');
    Route::get('asignacion/entrega/{id}', 'AssignmentController@entrega_edit')->name('asignacion.entrega');
    Route::put('asignacion/devolucion/{id}', 'AssignmentController@entrega_update')->name('asignacion.devolucion');
    Route::get('asignacion/archivados', 'AssignmentController@archivados_index')->name('asignacion.archivado');

    //Rutas combustible
    Route::resource('combustible-carga', 'FuelController');
    Route::resource('tipos-combustibles', 'TypeFuelController');
    Route::get('/vehiculo/combustible-carga/{id}', 'FuelController@combustible')->name('combustible.carga');

    //Rutas PDF
    Route::get('pdf/vehiculos', [App\Http\Controllers\VehiculoController::class, 'pdf_vehiculos'])->name('vehiculos.pdf');
    Route::get('pdf/vehiculos/download', [App\Http\Controllers\VehiculoController::class, 'pdf_vehiculos_download'])->name('vehiculos.DownloadPDF');
    Route::get('reportes', 'ReporteController@index')->name('reportes.PDF');
  ///---Incidentes PDF
    Route::get('reportes/incidente/pdf', 'ReporteController@pdf_incidentes')->name('reportes.incidentePDF');
    Route::get('reportes/incidente/pdf/download', 'ReporteController@pdf_incidentes_download')->name('reportes.DonwloadPDF');

    //PDF Gastos
    Route::get('reportes/gasto/pdf', 'ReporteController@pdf_gastos')->name('reportes.gastosPDF');
    //Route::get('reportes/gasto/pdf/download', 'ReporteController@pdf_incidentes_download')->name('reportes.DonwloadPDF');

  });
});
