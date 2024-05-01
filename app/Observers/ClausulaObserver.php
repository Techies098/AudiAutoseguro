<?php

namespace App\Observers;

use App\Models\UserLog;
use App\Models\Clausula;
use Illuminate\Support\Facades\Auth;

class ClausulaObserver
{
    /**
     * Handle the Clausula "created" event.
     */
    public function created(Clausula $clausula): void
    {
        if (Auth::check()) {
            // Solo si hay un usuario autenticado, registra la acción en user_logs
            $userLogData = [
                'user_id' => Auth::id(),
                'action' => 'clausula Creada, id: '. $clausula->id,
            ];
            UserLog::create($userLogData);
        }
    }

    /**
     * Handle the Clausula "updated" event.
     */
    public function updated(Clausula $clausula): void
    {
        $userLogData = [
            'user_id' => Auth::id(),
            'action' => 'clausula actualizada, id: '. $clausula->id,
        ];
        UserLog::create($userLogData);
    }

    /**
     * Handle the Clausula "deleted" event.
     */
    public function deleted(Clausula $clausula): void
    {
        $userLogData = [
            'user_id' => Auth::id(),
            'action' => 'clausula borrada, id: '. $clausula->id,
        ];
        UserLog::create($userLogData);
    }

    /**
     * Handle the Clausula "restored" event.
     */
    public function restored(Clausula $clausula): void
    {
        //
    }

    /**
     * Handle the Clausula "force deleted" event.
     */
    public function forceDeleted(Clausula $clausula): void
    {
        //
    }
}
