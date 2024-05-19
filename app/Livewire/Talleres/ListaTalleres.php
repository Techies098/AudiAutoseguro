<?php

namespace App\Livewire\Talleres;

use App\Models\Taller;
use Livewire\Component;
use Livewire\WithPagination;

class ListaTalleres extends Component
{
    use WithPagination;

    public $buscar, $id = 'id';
    public $nombre = 'nombre';


    public function render()
    {
        $talleres = $this->buscar ? $this->buscarTalleres() : $this->obtenerTalleres();

        return view('livewire.talleres.lista-talleres', compact('talleres'));
    }

    public function buscarTalleres()
    {
        $this->validate([
            'buscar' => 'required|string|min:1'
        ]);

        return Taller::where('' . $this->nombre . '', 'like', '%' . trim($this->buscar) . '%')
            ->orderBy('' . $this->nombre . '', 'asc')
            ->paginate(25);
    }

    private function obtenerTalleres()
    {
        return Taller::orderBy('' . $this->id . '', 'asc')
            ->paginate(25);
    }
}
