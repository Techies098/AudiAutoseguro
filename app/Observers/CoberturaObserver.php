<?php

namespace App\Observers;

use App\Models\UserLog;
use App\Models\Cobertura;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CoberturaObserver
{
    /**
     * Handle the Cobertura "created" event.
     */
    public function created(Cobertura $cobertura): void
    {
        $request = Request::capture();
        if (Auth::check()) {
            // Solo si hay un usuario autenticado, registra la acción en user_logs
            $userLogData = [
                'user_id' => Auth::id(),
                'action' => 'cobertura Creada, id: '. $cobertura->id,
                'client_ip' => $request->ip(),
            ];
            UserLog::create($userLogData);
        }
    }

    /**
     * Handle the Cobertura "updated" event.
     */
    public function updated(Cobertura $cobertura): void
    {
        $request = Request::capture();
        $userLogData = [
            'user_id' => Auth::id(),
            'action' => 'cobertura actualizada, id: '. $cobertura->id,
            'client_ip' => $request->ip(),
        ];
        UserLog::create($userLogData);
    }

    /**
     * Handle the Cobertura "deleted" event.
     */
    public function deleted(Cobertura $cobertura): void
    {
        $request = Request::capture();
        $userLogData = [
            'user_id' => Auth::id(),
            'action' => 'cobertura borrada, id: '. $cobertura->id,
            'client_ip' => $request->ip(),
        ];
        UserLog::create($userLogData);
    }

    /**
     * Handle the Cobertura "restored" event.
     */
    public function restored(Cobertura $cobertura): void
    {
        //
    }

    /**
     * Handle the Cobertura "force deleted" event.
     */
    public function forceDeleted(Cobertura $cobertura): void
    {
        //
    }
}
