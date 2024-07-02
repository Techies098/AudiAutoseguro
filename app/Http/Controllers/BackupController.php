<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class BackupController extends Controller
{
    public function createBackup()
    {
        Artisan::call('backup:run');
        return redirect()->route('dashboard')->with('success', 'Copia de seguridad creada correctamente.');
    }
    public function restoreBackup()
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
