<?php

namespace App\Livewire\Reportes;

use Livewire\Component;
use App\Models\Vehiculo;
use Livewire\WithPagination;

class ListaReportes extends Component
{
    use WithPagination;

    public $placa = 'placa';
    //public $name = 'name';
    public $fechaIni, $fechaFin, $fecha = 'created_at';

    public function render()
    {
        $vehiculos = ($this->fechaIni and $this->fechaFin) ?  $this->buscarVehiculosr() : $this->obtenerVehiculos();

        return view('livewire.reportes.lista-reportes', compact('vehiculos'));
    }

    private function obtenerVehiculos()
    {
        return Vehiculo::orderBy('' . $this->placa . '', 'asc')
            ->paginate(25);
    }

    public function buscarVehiculosr()
    {
        $this->validate([
            //'name' => 'string|min:1',
            'fechaIni' => 'date',
            'fechaFin' => 'date'
        ]);

        return Vehiculo::whereDate($this->fecha, '>=', trim($this->fechaIni))
            ->whereDate($this->fecha, '<=', trim($this->fechaFin))
            ->get();
    }
}
