<?php

namespace App\Http\Controllers;

//use App\Http\Controllers\Controller;
use Illuminate\Routing\Controller;
use App\Models\Cliente;
use App\Models\Columna;
use App\Models\Tabla;
use App\Models\User;
use App\Models\Vehiculo;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

use Illuminate\Support\Facades\DB;

class ReporteController extends Controller
{
    public function indexReporte()
    {
        $vehiculos = Vehiculo::paginate(5);
        $tablas = Tabla::all();

        //$columnas = Columna::all();

        //return view('reporte.dinamicos.index-reportes', compact('vehiculos'));
        /*return view('reporte.dinamicos.index-reportes', [
            "vehiculos" => $vehiculos,
            "tablas" => $tablas,
            "columnas" => $columnas
        ]);*/

        // Supongamos que tienes un modelo 'Tabla' y 'Columna'
        //$tablas = \App\Models\Tabla::all();
        /*$columnas = [];
        foreach ($tablas as $tabla) {
            //$columnas[$tabla->nombre] = Columna::where('tablas_id', $tabla->id)->get();
        }*/

        //$data = view('reporte.dinamicos.index-reportes', compact('tablas', 'columnas'));
        //dd($data);
        return view('reporte.dinamicos.index-reportes', compact('tablas', 'vehiculos'));
    }

    public function reporteDinamicoOrig(Request $request)
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

    public function reporteDinamico(Request $request)
    {
        //dd($request->input('selected_columns'));

        $tables = $request->input('tables'); //tablas
        $selectedColumns = explode(',', $request->input('selected_columns'));
        //dd($selectedColumns);

        $columnas = array_map(function ($value) {
            return substr($value, strpos($value, '.') + 1);
        }, $selectedColumns);

        //dd($columnas);

        $fechaIni = $request->input('fechaIni');
        $fechaFin = $request->input('fechaFin');

        $datos = [];
        $datos2 = [];

        foreach ($tables as $table) {
            $query = DB::table($table);

            $tableColumns = array_filter($selectedColumns, fn ($col) => strpos($col, $table) === 0);
            //dd($tableColumns);
            if (!empty($tableColumns)) {
                $columns = array_map(fn ($col) => explode('.', $col)[1], $tableColumns);
                $query->select($columns);
            }

            if ($fechaIni && $fechaFin) {
                $query->whereBetween('created_at', [$fechaIni, $fechaFin]);
            }

            $datos[$table] = $query->get();
            $datos2 = $query->get();
        }

        $vehiculos = Vehiculo::all(); ///quitar despues
        //dd($datos2, $vehiculos);
        //dd($datos);
        //dd($datos, $selectedColumns);
        /*$pdf = PDF::loadView('reporte.dinamicos.pdf', compact('datos', 'selectedColumns', 'vehiculos'));

        return $pdf->download('report.pdf');*/

        $pdf = PDF::loadView('reporte.dinamicos.pdf', compact('datos2', 'columnas', 'vehiculos'))->setPaper('a4', 'landscape');
        return $pdf->stream();
    }

    public function generateReport(Request $request)
    {
        $tables = $request->input('tables'); //tablas
        $selectedColumns = explode(',', $request->input('selected_columns'));

        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $data = [];

        foreach ($tables as $table) {
            $query = DB::table($table);
            $tableColumns = array_filter($selectedColumns, fn ($col) => strpos($col, $table) === 0);

            if (!empty($tableColumns)) {
                $columns = array_map(fn ($col) => explode('.', $col)[1], $tableColumns);
                $query->select($columns);
            }

            if ($startDate && $endDate) {
                $query->whereBetween('created_at', [$startDate, $endDate]);
            }

            $data[$table] = $query->get();
        }

        $pdf = PDF::loadView('reports.dynamic', compact('data', 'selectedColumns'));

        return $pdf->download('report.pdf');
    }
}
