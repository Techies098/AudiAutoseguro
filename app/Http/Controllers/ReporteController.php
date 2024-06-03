<?php

namespace App\Http\Controllers;

//use App\Http\Controllers\Controller;
use Illuminate\Routing\Controller;
use App\Models\Cliente;
use App\Models\User;
use App\Models\Vehiculo;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class ReporteController extends Controller
{
    public function indexReporte()
    {
        $vehiculos = Vehiculo::paginate(5);
        return view('reporte.dinamicos.index-reportes', compact('vehiculos'));
    }

    public function reporteDinamico(Request $request)
    {
        $fechaIni = $request->input('fechaIni');
        $fechaFin = $request->input('fechaFin');

        $vehiculos = Vehiculo::query();

        if (!is_null($fechaIni) && !is_null($fechaFin)) {
            $vehiculos->whereDate('created_at', '>=', $fechaIni)
                ->whereDate('created_at', '<=', $fechaFin);
        }

        $vehiculos = $vehiculos->get();

        $pdf = PDF::loadView('reporte.dinamicos.pdf', compact('vehiculos'))->setPaper('a4', 'landscape');
        return $pdf->stream();
    }
}
