<?php

namespace App\Observers;

use App\Models\User;
use App\Models\UserLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserObserver
{    public function created(User $user): void
{
    $request = Request::capture();
    if (Auth::check()) {
        // Solo si hay un usuario autenticado, registra la acción en user_logs
        $userLogData = [
            'user_id' => Auth::id(),
            'action' => 'Usuario Creado, id: ' . $user->id . ': ' . $user->name,
            'client_ip' => $request->ip(),
        ];
        UserLog::create($userLogData);
    }
}
    public function updated(User $user): void
    {
        $request = Request::capture();
        $userLogData = [
            'user_id' => Auth::id(),
            'action' => 'Usuario Actualizado,id : '. $user->id .':'. $user->name ,
            'client_ip' => $request->ip(),
        ];
        UserLog::create($userLogData);
    }
    public function deleted(User $user): void
    {
        $request = Request::capture();
        $userLogData = [
            'user_id' => Auth::id(),
            'action' => 'Usuario Eliminado : '. $user->id . $user->name ,
            'client_ip' => $request->ip(),
        ];
        UserLog::create($userLogData);
    }
    /**
     * Handle the User "restored" event.
     */
    public function restored(User $user): void
    {

    }

    /**
     * Handle the User "force deleted" event.
     */
    public function forceDeleted(User $user): void
    {

    }
}
