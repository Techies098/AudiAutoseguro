<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\VehiculoController;
use Illuminate\Support\Facades\Route;

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
    })->name('dashboard');
});


Route::resource('/administrador/usuarios', UserController::class)
    ->parameters(['usuarios' => 'user'])
    ->names('administrador/usuarios')
    ->middleware('auth:sanctum', 'verified');

Route::resource('/administrador/vehiculos', VehiculoController::class)
    ->parameters(['vehiculos' => 'vehiculo'])
    ->names('administrador/vehiculos')
    ->middleware('auth:sanctum', 'verified');
