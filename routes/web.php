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

Route::resource('/administrador/bitacoras', BitacoraController::class)
    ->parameters(['bitacoras' => 'bitacora'])
    ->names('administrador.bitacoras')
    ->middleware('auth:sanctum', 'verified');

/*-----------------------Reportes------------------*/

Route::get('/administrador/reporte-vehiculo', [VehiculoController::class, 'reportev'])->name('reporte-vehiculo');
Route::post('/administrador/pdf-vehiculo', [VehiculoController::class, 'generarReporte'])->name('pdf-vehiculo');
