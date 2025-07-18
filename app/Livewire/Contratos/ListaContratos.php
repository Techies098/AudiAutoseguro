<?php

namespace App\Livewire\Contratos;

use App\Models\Contrato;
use Livewire\Component;
use Livewire\WithPagination;

class ListaContratos extends Component
{
    use WithPagination;

    public $buscar, $id = 'id';

    public function render()
    {
        $contratos = $this->buscar ? $this->buscarContratos() : $this->obtenerContratos();

        return view('livewire.contratos.lista-contratos', compact('contratos'));
    }

    public function buscarContratos()
    {
        $this->validate([
            'buscar' => 'required|string|min:1'
        ]);

        return Contrato::where('' . $this->id . '', 'like', '%' . trim($this->buscar) . '%')
            ->orderBy('' . $this->id . '', 'asc')
            ->paginate(10);
    }

    private function obtenerContratos()
    {
        return Contrato::orderBy('' . $this->id . '', 'desc')
            ->paginate(10);
    }
}
