<?php

namespace App\Livewire\Vehiculosrep;

use App\Models\Vehiculo;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Livewire\Component;
use Livewire\WithPagination;

class ListaVehiculosrep extends Component
{
    use WithPagination;

    public $placa = 'placa';
    //public $name = 'name';
    public $fechaIni, $fechaFin, $fecha = 'created_at';

    public function render()
    {
        $vehiculos = ($this->fechaIni and $this->fechaFin) ?  $this->buscarVehiculosr() : $this->obtenerVehiculos();

        return view('livewire.vehiculosrep.lista-vehiculosrep', compact('vehiculos'));
    }

    private function obtenerVehiculos()
    {
        return Vehiculo::orderBy('' . $this->placa . '', 'asc')
            ->paginate(25);
    }

    public function generarReporte()
    {
        if (is_null($this->fechaIni) || is_null($this->fechaFin)) {
            $vehiculos = Vehiculo::all();
        } else {
            $vehiculos = Vehiculo::whereDate($this->fecha, '>=', $this->fechaIni)
                ->whereDate($this->fecha, '<=', $this->fechaFin)
                ->get();
        }
        $pdf = PDF::loadView('reporte.vehiculos.pdf-result', compact('vehiculos'));
        return $pdf->stream();
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
