<?php

namespace App\Livewire\Vehiculos;

use App\Models\Vehiculo;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Livewire\Component;
use Livewire\WithPagination;

class ListaVehiculos extends Component
{
    use WithPagination;

    public $buscar, $placa = 'placa';

    public function render()
    {
        $vehiculos = $this->buscar ? $this->buscarVehiculos() : $this->obtenerVehiculos();

        return view('livewire.vehiculos.lista-vehiculos', compact('vehiculos'));
    }

    public function buscarVehiculos()
    {
        $this->validate([
            'buscar' => 'required|string|min:1'
        ]);

        return Vehiculo::where('' . $this->placa . '', 'like', '%' . trim($this->buscar) . '%')
            ->orderBy('' . $this->placa . '', 'asc')
            ->paginate(25);
    }

    private function obtenerVehiculos()
    {
        return Vehiculo::orderBy('' . $this->placa . '', 'asc')
            ->paginate(25);
    }

    public function generarReporte()
    {
        $vehiculos = Vehiculo::all();
        $pdf = PDF::loadView('reporte.vehiculos.pdf-result', compact('vehiculos'));

        return $pdf->stream();
    }


    /*public function render()
    {
        return view('livewire.vehiculos.lista-vehiculos');
    }*/
}
