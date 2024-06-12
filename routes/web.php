<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SeguroController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PermisoController;
use App\Http\Controllers\BitacoraController;
use App\Http\Controllers\ClausulaController;
use App\Http\Controllers\ContratoController;
use App\Http\Controllers\VehiculoController;
use App\Http\Controllers\CoberturaController;
use App\Http\Controllers\SiniestroController;
use App\Http\Controllers\CotizacionController;
use App\Http\Controllers\DanoMenorClienteController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\TallerController;
use App\Http\Controllers\PaypalController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\SolicitudController;

// Rutas que requieren autenticación y verificación
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('/administrador/bitacoras', BitacoraController::class)->parameters(['bitacoras' => 'bitacora'])->names('administrador.bitacoras');

    Route::resource('/administrador/usuarios', UserController::class)->parameters(['usuarios' => 'user'])->names('administrador/usuarios');
    Route::get('/administrador/permisos/{user}', [PermisoController::class, 'show'])->name('administrador/permisos.show');
    Route::post('/administrador/permisos/{user}/guardar', [PermisoController::class, 'guardar'])->name('administrador/permisos.guardar');

    Route::resource('/administrador/vehiculos', VehiculoController::class)->parameters(['vehiculos' => 'vehiculo'])->names('administrador/vehiculos');

    Route::resource('/administrador/clausulas', ClausulaController::class)->parameters(['clausulas' => 'clausula'])->names('administrador/clausulas');

    Route::resource('/administrador/clientes', ClienteController::class)->parameters(['clientes' => 'cliente'])->names('personal/clientes');

    Route::resource('/administrador/coberturas', CoberturaController::class)->parameters(['coberturas' => 'cobertura'])->names('administrador/coberturas');

    //Talleres:
    Route::resource('/administrador/talleres', TallerController::class)->parameters(['talleres' => 'taller'])->names('administrador/talleres');
    Route::post('/administrador/talleres/cambiar-estado/{id}', [TallerController::class, 'cambiarEstado'])->name('talleres.cambiarEstado');


    //Seguros:
    Route::resource('/administrador/seguros', SeguroController::class)->parameters(['seguros' => 'seguro'])->names('administrador/seguros');
    Route::get('/administrador/seguros/{id}/relacionar', [SeguroController::class, 'relacionarSeguro'])->name('administrador.seguros.relacionar');
    Route::post('/guardar-relacion', [SeguroController::class, 'guardarRelacion'])->name('guardar.relacion');

    //Solicitud Seguro
    Route::resource('solicitudes', SolicitudController::class)->parameters(['solicitudes' => 'solicitud'])->names('solicitudes');

    Route::get('mis-solicitudes', [SolicitudController::class, 'misSolicitudes'])->name('solicitudes.mis');
    Route::patch('solicitudes/{solicitud}/estado', [SolicitudController::class, 'cambiarEstado'])->name('solicitudes.cambiarEstado');

    //Contratos:
    Route::resource('/administrador/contratos', ContratoController::class)->parameters(['contratos' => 'contrato'])->names('administrador/contratos');
    Route::get('/cliente/{cliente}/contratos', [ClienteController::class, 'contratos'])->name('cliente.contratos.index'); //Vista del cliente
    Route::get('/cliente/contratos/{contrato}', [ClienteController::class, 'show'])->name('cliente.contratos.show'); //Vista de cliente, admin y vendedor
    Route::get('/administrador/contratos/{id}/coberturas-clausulas', [ContratoController::class, 'getCoberturasClausulas'])->name('contratos.cobertura-clausulas'); //get coberturas y clausulas

    //Pagos:
    Route::post('paypal', [PaypalController::class, 'paypal'])->name('paypal');
    Route::get('success', [PaypalController::class, 'success'])->name('success');
    Route::get('cancel', [PaypalController::class, 'cancel'])->name('cancel');

    Route::post('pago_paypal', [PagoController::class, 'paypal'])->name('pago_paypal');
    Route::get('pago_success', [PagoController::class, 'success'])->name('pago_success');
    Route::get('pago_cancel', [PagoController::class, 'cancel'])->name('pago_cancel');


    //Rutas de reportes:
    Route::get('/administrador/reporte-vehiculo', [VehiculoController::class, 'reportev'])->name('reporte-vehiculo');
    Route::post('/administrador/pdf-vehiculo', [VehiculoController::class, 'generarReporte'])->name('pdf-vehiculo');
    Route::get('/administrador/pdf-contrato/{id}', [ContratoController::class, 'contrato'])->name('pdf-contrato');
    //Rutas de reportes dinamicos:
    Route::get('/administrador/reporte-dinamico', [ReporteController::class, 'indexReporte'])->name('reporte-dinamico');
    Route::post('/administrador/pdf-dinamico', [ReporteController::class, 'reporteDinamico'])->name('pdf-dinamico');
    //Siniestros:
    Route::resource('/personal/siniestros', SiniestroController::class)->parameters(['siniestros' => 'siniestro'])->names('personal/siniestros');

    Route::get('/reportar-siniestro', [SiniestroController::class, 'reportar'])->name('reportar_siniestro')
        ->middleware('auth:sanctum', 'verified');
    Route::get('/aprobar-siniestro/{id}', [SiniestroController::class, 'aprobar'])->name('aprobar_siniestro')
        ->middleware('auth:sanctum', 'verified');
    Route::get('/denegar-siniestro/{id}', [SiniestroController::class, 'denegar'])->name('denegar_siniestro')
        ->middleware('auth:sanctum', 'verified');
    Route::get('/re_evaluar-siniestro/{id}', [SiniestroController::class, 're_evaluar'])->name('re_evaluar_siniestro')
        ->middleware('auth:sanctum', 'verified');
    Route::get('/revisar-siniestro/{id}', [SiniestroController::class, 'revisar'])->name('revisar_siniestro')
        ->middleware('auth:sanctum', 'verified');
    Route::put('/ruta/{id}',  [SiniestroController::class, 'update'])->name('personal.siniestros.update');

    //Dano Menor
    Route::resource('/cliente/dano-menor', DanoMenorClienteController::class)->names('cliente.dano-menor');
    

});

// Rutas públicas
Route::get('/', function () {
    return view('inicio');
})->name('inicio');

Route::get('/cotizacion', [CotizacionController::class, 'create'])->name('cotizacion.create');
Route::post('/cotizaciones', [CotizacionController::class, 'store'])->name('cotizaciones.store');
Route::get('/cotizaciones/success/{id}', [CotizacionController::class, 'success'])->name('cotizaciones.success');
