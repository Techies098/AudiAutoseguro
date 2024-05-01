<?php

namespace App\Observers;

use App\Models\User;
use App\Models\UserLog;
use Illuminate\Support\Facades\Auth;

class UserObserver
{    public function created(User $user): void
{
    if (Auth::check()) {
        // Solo si hay un usuario autenticado, registra la acción en user_logs
        $userLogData = [
            'user_id' => Auth::id(),
            'action' => 'Usuario Creado: ' . $user->id . ' ' . $user->name,
        ];
        UserLog::create($userLogData);
    }
}
    public function updated(User $user): void
    {
        $userLogData = [
            'user_id' => Auth::id(),
            'action' => 'Usuario Actualizado : '. $user->id . $user->name ,
        ];
        UserLog::create($userLogData);
    }
    public function deleted(User $user): void
    {
        $userLogData = [
            'user_id' => Auth::id(),
            'action' => 'Usuario Eliminado : '. $user->id . $user->name ,
        ];
        UserLog::create($userLogData);
    }
    /**
     * Handle the User "restored" event.
     */
    public function restored(User $user): void
    {
        $userLogData = [
            'user_id' => Auth::id(),
            'action' => 'Usuario restaurado : '. $user->id . $user->name ,
        ];
        UserLog::create($userLogData);
    }

    /**
     * Handle the User "force deleted" event.
     */
    public function forceDeleted(User $user): void
    {
        $userLogData = [
            'user_id' => Auth::id(),
            'action' => 'borrado forzado de : '. $user->id . $user->name ,
        ];
        UserLog::create($userLogData);
    }
}
