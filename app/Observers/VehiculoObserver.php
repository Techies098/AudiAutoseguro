<?php

namespace App\Observers;

use App\Models\UserLog;
use App\Models\Vehiculo;
use Illuminate\Support\Facades\Auth;

class VehiculoObserver
{
    /**
     * Handle the Vehiculo "created" event.
     */
    public function created(Vehiculo $vehiculo): void
    {
        if (Auth::check()) {
            // Solo si hay un usuario autenticado, registra la acción en user_logs
            $userLogData = [
                'user_id' => Auth::id(),
                'action' => 'Vehiculo Creado: '. $vehiculo->placa,
            ];
            UserLog::create($userLogData);
        }
    }

    /**
     * Handle the Vehiculo "updated" event.
     */
    public function updated(Vehiculo $vehiculo): void
    {
        $userLogData = [
            'user_id' => Auth::id(),
            'action' => 'Vehiculo Actualizado: '. $vehiculo->placa,
        ];
        UserLog::create($userLogData);
    }

    /**
     * Handle the Vehiculo "deleted" event.
     */
    public function deleted(Vehiculo $vehiculo): void
    {
        $userLogData = [
            'user_id' => Auth::id(),
            'action' => 'Vehiculo borrado: '. $vehiculo->placa,
        ];
        UserLog::create($userLogData);
    }

    /**
     * Handle the Vehiculo "restored" event.
     */
    public function restored(Vehiculo $vehiculo): void
    {
        $userLogData = [
            'user_id' => Auth::id(),
            'action' => 'Vehiculo restaurado: '. $vehiculo->placa,
        ];
        UserLog::create($userLogData);
    }

    /**
     * Handle the Vehiculo "force deleted" event.
     */
    public function forceDeleted(Vehiculo $vehiculo): void
    {
        $userLogData = [
            'user_id' => Auth::id(),
            'action' => 'Vehiculo borrado forzoso: '. $vehiculo->placa,
        ];
        UserLog::create($userLogData);
    }
}
