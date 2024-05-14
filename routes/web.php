<?php

use App\Models\Seguro;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SeguroController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\BitacoraController;
use App\Http\Controllers\ClausulaController;
use App\Http\Controllers\VehiculoController;
use App\Http\Controllers\CoberturaController;
use App\Http\Controllers\ContratoController;
use App\Http\Controllers\PermisoController;
use App\Http\Controllers\CotizacionController;
use App\Http\Controllers\PaypalController;
use App\Livewire\Vehiculosrep\ListaVehiculosrep;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard')->middleware('auth:sanctum', 'verified');
    //Route::get('/administrador/reporte-vehiculo', [VehiculoController::class, 'reportev'])->name('reporte-vehiculo');
    //Route::post('/administrador/pdf-vehiculo', [VehiculoController::class, 'generarReporte'])->name('pdf-vehiculo');
});

Route::get('/', function () {
    return view('inicio');
})->name('inicio');

Route::resource('/administrador/usuarios', UserController::class)
    ->parameters(['usuarios' => 'user'])
    ->names('administrador/usuarios')
    ->middleware('auth:sanctum', 'verified');

Route::get('/administrador/permisos/{user}', [PermisoController::class, 'show'])->name('administrador/permisos.show');
Route::post('/administrador/permisos/{user}/guardar',[PermisoController::class, 'guardar'])->name('administrador/permisos.guardar');

Route::resource('/administrador/vehiculos', VehiculoController::class)
    ->parameters(['vehiculos' => 'vehiculo'])
    ->names('administrador/vehiculos')
    ->middleware('auth:sanctum', 'verified');

Route::resource('/administrador/clausulas', ClausulaController::class)
    ->parameters(['clausulas' => 'clausula'])
    ->names('administrador/clausulas')
    ->middleware('auth:sanctum', 'verified');

Route::resource('/administrador/clientes', ClienteController::class)
    ->parameters(['clientes' => 'cliente'])
    ->names('personal/clientes')
    ->middleware('auth:sanctum', 'verified');

Route::resource('/administrador/coberturas', CoberturaController::class)
    ->parameters(['coberturas' => 'cobertura'])
    ->names('administrador/coberturas')
    ->middleware('auth:sanctum', 'verified');

Route::resource('/administrador/seguros', SeguroController::class)
    ->parameters(['seguros' => 'seguro'])
    ->names('administrador/seguros')
    ->middleware('auth:sanctum', 'verified');

Route::get('/administrador/seguros/{id}/relacionar', [SeguroController::class, 'relacionarSeguro'])->name('administrador.seguros.relacionar');

Route::post('/guardar-relacion', [SeguroController::class, 'guardarRelacion'])->name('guardar.relacion');



Route::resource('/administrador/bitacoras', BitacoraController::class)
    ->parameters(['bitacoras' => 'bitacora'])
    ->names('administrador.bitacoras')
    ->middleware('auth:sanctum', 'verified');

Route::resource('/administrador/contratos', ContratoController::class)
    ->parameters(['contratos' => 'contrato'])
    ->names('administrador/contratos')
    ->middleware('auth:sanctum', 'verified');

/*REPORTES*/
//Vehiculo
Route::get('/administrador/reporte-vehiculo', [VehiculoController::class, 'reportev'])->name('reporte-vehiculo');
Route::post('/administrador/pdf-vehiculo', [VehiculoController::class, 'generarReporte'])->name('pdf-vehiculo');
//Contrato
Route::get('/administrador/pdf-contrato/{id}', [ContratoController::class, 'contrato'])->name('pdf-contrato');

// cotizacion 
Route::get('/cotizacion', [CotizacionController::class, 'create'])->name('cotizacion.create');
Route::post('/cotizaciones', [CotizacionController::class, 'store'])->name('cotizaciones.store');


Route::get('/cotizaciones/success/{id}', [CotizacionController::class, 'success'])
    ->name('cotizaciones.success');

// Route::get('/cotizaciones/{id}/pdf', 'CotizacionController@generarPDF')->name('cotizaciones.generarPDF');


//Vista del cliente:
Route::get('/cliente/{cliente}/contratos', [ClienteController::class, 'contratos'])->name('cliente.contratos.index');
Route::get('/cliente/contratos/{contrato}', [ClienteController::class, 'show'])->name('cliente.contratos.show');

//Pagos:
Route::post('paypal', [PaypalController::class, 'paypal'])->name('paypal');
Route::get('success', [PaypalController::class, 'success'])->name('success');
Route::get('cancel', [PaypalController::class, 'cancel'])->name('cancel');