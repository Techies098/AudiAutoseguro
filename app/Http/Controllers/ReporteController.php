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

        if (!$request->input('tables')) {
            //return redirect()->route('reporte-dinamico')->with('error', 'Tiene que seleccionar una tabla');
            return redirect()->back()->with('error', 'Tiene que seleccionar una tabla');
        }
        /*$request->validate([
            'tables' => 'required|array', // Validar que se haya seleccionado al menos una tabla
        ]);*/

        $tables = $request->input('tables'); //tablas
        //dd($tables);
        $selectedColumns = explode(',', $request->input('selected_columns'));

        $titulo = $request->input('titulo');
        $descripcion = $request->input('descripcion');
        //dd($titulo, $descripcion);

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

        $pdf = PDF::loadView('reporte.dinamicos.pdf', compact('datos2', 'columnas', 'vehiculos', 'titulo', 'descripcion'))->setPaper('a4', 'landscape');
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

    public function verReporteDinamico(Request $request)
    {
        $tables = $request->input('tables'); //tablas
        //dd($tables);
        $selectedColumns = explode(',', $request->input('selected_columns'));

        $columnas = array_map(function ($value) {
            return substr($value, strpos($value, '.') + 1);
        }, $selectedColumns);

        //dd($columnas);

        $fechaIni = $request->input('fechaIni');
        $fechaFin = $request->input('fechaFin');

        dd($tables, $columnas, $fechaIni, $fechaFin);

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

        return response()->json([
            'datos' => $datos2,
            'columnas' => $columnas
        ]);
    }
}
