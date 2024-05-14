<?php

namespace App\Livewire\Siniestros;

use Livewire\Component;
use App\Models\Siniestro;
use Illuminate\Support\Facades\Auth;
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
        if (auth()->user()->cliente) {
            return Siniestro::whereIn('contrato_id', function($query) {
                $query->select('id')
                      ->from('contratos')
                      ->whereIn('vehiculo_id', function($subQuery) {
                          $subQuery->select('id')
                                   ->from('vehiculos')
                                   ->where('cliente_id', auth()->user()->cliente->id);
                      });
            })
            ->orderBy('created_at', 'desc')
            ->paginate(25);

        } else {
            return Siniestro::orderBy('' . 'created_at' . '', 'desc')
            ->paginate(25);
        }
    }
}
