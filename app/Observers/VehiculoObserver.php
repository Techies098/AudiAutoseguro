<?php

namespace App\Observers;

use App\Models\UserLog;
use App\Models\Vehiculo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class VehiculoObserver
{
    /**
     * Handle the Vehiculo "created" event.
     */
    public function created(Vehiculo $vehiculo): void
    {
        $request = Request::capture();
        if (Auth::check()) {
            // Solo si hay un usuario autenticado, registra la acción en user_logs
            $userLogData = [
                'user_id' => Auth::id(),
                'action' => 'Vehiculo Creado, placa: '. $vehiculo->placa,
                'client_ip' => $request->ip(),
            ];
            UserLog::create($userLogData);
        }
    }

    /**
     * Handle the Vehiculo "updated" event.
     */
    public function updated(Vehiculo $vehiculo): void
    {
        $request = Request::capture();
        $userLogData = [
            'user_id' => Auth::id(),
            'action' => 'Vehiculo Actualizado, placa: '. $vehiculo->placa,
            'client_ip' => $request->ip(),
        ];
        UserLog::create($userLogData);
    }

    /**
     * Handle the Vehiculo "deleted" event.
     */
    public function deleted(Vehiculo $vehiculo): void
    {
        $request = Request::capture();
        $userLogData = [
            'user_id' => Auth::id(),
            'action' => 'Vehiculo borrado:, placa '. $vehiculo->placa,
            'client_ip' => $request->ip(),
        ];
        UserLog::create($userLogData);
    }

    /**
     * Handle the Vehiculo "restored" event.
     */
    public function restored(Vehiculo $vehiculo): void
    {
        $request = Request::capture();
        $userLogData = [
            'user_id' => Auth::id(),
            'action' => 'Vehiculo restaurado: '. $vehiculo->placa,
            'client_ip' => $request->ip(),
        ];
        UserLog::create($userLogData);
    }

    /**
     * Handle the Vehiculo "force deleted" event.
     */
    public function forceDeleted(Vehiculo $vehiculo): void
    {
        $request = Request::capture();
        $userLogData = [
            'user_id' => Auth::id(),
            'action' => 'Vehiculo borrado forzoso: '. $vehiculo->placa,
            'client_ip' => $request->ip(),
        ];
        UserLog::create($userLogData);
    }
}
