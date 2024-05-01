<?php

namespace App\Livewire\Clausulas;

use App\Models\Clausula;
use Livewire\Component;
use Livewire\WithPagination;

class ListaClausulas extends Component
{
    use WithPagination;

    public $buscar, $detalle = 'detalle';


    public function render()
    {
        $clausulas = $this->buscar ? $this->buscarClausulas() : $this->obtenerClausulas();

        return view('livewire.clausulas.lista-clausulas', compact('clausulas'));
    }

    public function buscarClausulas()
    {
        $this->validate([
            'buscar' => 'required|string|min:1'
        ]);

        return Clausula::where('' . $this->detalle . '', 'like', '%' . trim($this->buscar) . '%')
            ->orderBy('' . $this->detalle . '', 'asc')
            ->paginate(25);
    }

    private function obtenerClausulas()
    {
        return Clausula::orderBy('' . $this->detalle . '', 'asc')
            ->paginate(25);
    }


    /*public function render()
    {
        return view('livewire.clausulas.lista-clausulas');
    }*/
}
