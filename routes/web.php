<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ClausulaController;
use App\Http\Controllers\VehiculoController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard')->middleware('auth:sanctum', 'verified');
});


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
