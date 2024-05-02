<?php

namespace App\Livewire\Bitacoras;

use App\Models\UserLog;
use Livewire\Component;

class ListaBitacoras extends Component
{
    public function render()
    {
        $userLogs = UserLog::latest()->paginate(25);
        return view('livewire.bitacoras.lista-bitacoras', compact ('userLogs'));
    }
}
