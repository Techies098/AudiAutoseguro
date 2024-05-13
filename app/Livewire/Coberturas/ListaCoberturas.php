<?php

namespace App\Livewire\Coberturas;

use App\Models\Cobertura;

use Livewire\Component;
use Livewire\WithPagination;

class ListaCoberturas extends Component
{
    use WithPagination;

    public $buscar, $nombre = 'nombre';
    public $id = 'id';
    public function render()
    {
        $coberturas = $this->buscar ? $this->buscarCoberturas() : $this->obtenerCoberturas();

        return view('livewire.coberturas.lista-coberturas', compact('coberturas'));
    }

    public function buscarCoberturas()
    {
        $this->validate([
            'buscar' => 'required|string|min:1'
        ]);

        return Cobertura::where('' . $this->nombre . '', 'like', '%' . trim($this->buscar) . '%')
            ->orderBy('' . $this->nombre . '', 'asc')
            ->paginate(10);
    }

    private function obtenerCoberturas()
    {
        return Cobertura::orderBy('' . $this->id . '', 'asc')
            ->paginate(10);
    }
}
