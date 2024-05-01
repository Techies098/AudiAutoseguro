<?php

namespace App\Livewire\Seguros;

use App\Models\Seguro;

use Livewire\Component;
use Livewire\WithPagination;

class ListaSeguros extends Component
{
    use WithPagination;

    public $buscar, $nombre = 'nombre';

    public function render()
    {
        $seguros = $this->buscar ? $this->buscarSeguros() : $this->obtenerSeguro();

        return view('livewire.seguros.lista-seguros', compact('seguros'));
    }

    public function buscarSeguros()
    {
        $this->validate([
            'buscar' => 'required|string|min:1'
        ]);

        return Seguro::where('' . $this->nombre . '', 'like', '%' . trim($this->buscar) . '%')
            ->orderBy('' . $this->nombre . '', 'asc')
            ->paginate(10);
    }

    private function obtenerSeguro()
    {
        return Seguro::orderBy('' . $this->nombre . '', 'asc')
            ->paginate(10);
    }
}
