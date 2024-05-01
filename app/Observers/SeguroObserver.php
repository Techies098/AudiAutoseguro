<?php

namespace App\Observers;

use App\Models\Seguro;
use App\Models\UserLog;
use Illuminate\Support\Facades\Auth;

class SeguroObserver
{
    /**
     * Handle the Seguro "created" event.
     */
    public function created(Seguro $seguro): void
    {
        if (Auth::check()) {
            // Solo si hay un usuario autenticado, registra la acción en user_logs
            $userLogData = [
                'user_id' => Auth::id(),
                'action' => 'Seguro Creado: '. $seguro->placa,
            ];
            UserLog::create($userLogData);
        }
    }

    /**
     * Handle the Seguro "updated" event.
     */
    public function updated(Seguro $seguro): void
    {
        $userLogData = [
            'user_id' => Auth::id(),
            'action' => 'Seguro actualizado: '. $seguro->placa,
        ];
        UserLog::create($userLogData);
    }

    /**
     * Handle the Seguro "deleted" event.
     */
    public function deleted(Seguro $seguro): void
    {
        $userLogData = [
            'user_id' => Auth::id(),
            'action' => 'Seguro borrado: '. $seguro->placa,
        ];
        UserLog::create($userLogData);
    }

    /**
     * Handle the Seguro "restored" event.
     */
    public function restored(Seguro $seguro): void
    {
        //
    }

    /**
     * Handle the Seguro "force deleted" event.
     */
    public function forceDeleted(Seguro $seguro): void
    {
        //
    }
}
