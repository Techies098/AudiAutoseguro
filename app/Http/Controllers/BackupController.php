<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class BackupController extends Controller
{
    public function create()
    {
        // Ejecutar el comando de copia de seguridad
        Artisan::call('backup:run');
        // Redirigir a una página de confirmación o mostrar un mensaje
        return redirect()->route('dashboard')->with('success', 'Copia de seguridad creada correctamente.');
    }
    public function restore()
    {
        Artisan::call('backup:restore', [
            '--backup' => 'latest',
            '--connection' => 'mysql',
            '--password' => env('DB_PASSWORD'),
            '--reset' => true,
        ]);
        return redirect()->route('dashboard')->with('success', 'Copia de seguridad restaurada correctamente.');
    }
}
