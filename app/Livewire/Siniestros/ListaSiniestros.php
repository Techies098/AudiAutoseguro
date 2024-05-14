<?php

namespace App\Livewire\Siniestros;

use Livewire\Component;
use App\Models\Siniestro;
use Livewire\WithPagination;

class ListaSiniestros extends Component
{
    use WithPagination;
    public $buscar, $name = 'name';

    public function render()
    {
        $siniestros = $this->buscar ? $this->buscarsiniestros() : $this->obtenerSiniestros();
        return view('livewire.siniestros.lista-siniestros',compact('siniestros'));
    }
    public function buscarSiniestros()
    {
    }
    private function obtenerSiniestros()
    {
        return Siniestro::orderBy('' . 'id' . '', 'asc')
            ->paginate(25);
    }
}
