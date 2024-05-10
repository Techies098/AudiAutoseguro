<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Routing\Controller;
use App\Models\User;
use App\Models\Vehiculo;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class VehiculoController extends Controller
{
    
    public function __construct() {
        $this->middleware('can:administrador.vehiculos.index')->only('index');
        $this->middleware('can:administrador.vehiculos.create')->only('create', 'store');
        $this->middleware('can:administrador.vehiculos.edit')->only('edit', 'update');
        $this->middleware('can:administrador.vehiculos.destroy')->only('destroy');
    }

    public function index()
    {
        return view('administrador.vehiculos.index');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clientes = User::select(
            'clientes.id',
            'users.name',
        )->join('clientes', 'clientes.user_id', '=', 'users.id')->get();
        //dd($clientes);

        return view('administrador.vehiculos.create', [
            'vehiculo' => new Vehiculo(),
            'clientes' => $clientes
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'cliente_id' => 'required',
            'placa' => 'max:10|unique:vehiculos,placa',
            'clase' => 'max:30',
            'marca' => 'max:30',
            'modelo' => 'max:30',
            'anio' => 'max:10',
            'color' => 'max:30',
            'nro_asientos' => 'max:5'
        ]);

        $vehiculo = Vehiculo::create($request->all());

        return redirect()->route('administrador/vehiculos.index')
            ->with('msj_ok', 'Creado vehiculo con placa: ' . $vehiculo->placa);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vehiculo $vehiculo)
    {
        //$clientes = Cliente::all();

        $clientes = User::select(
            'clientes.id',
            'users.name',
        )->join('clientes', 'clientes.user_id', '=', 'users.id')->get();

        return view('administrador.vehiculos.edit', [
            'vehiculo' => $vehiculo,
            'clientes' => $clientes
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vehiculo $vehiculo)
    {
        $request->validate([
            'cliente_id' => 'required',
            'placa' => 'max:10',
            'clase' => 'max:30',
            'marca' => 'max:30',
            'modelo' => 'max:30',
            'anio' => 'max:10',
            'color' => 'max:30',
            'nro_asientos' => 'max:5'
        ]);

        $vehiculo->update($request->all());

        return redirect()->route('administrador/vehiculos.index')
            ->with('msj_ok', 'Actualizado el vehiculo con placa: ' . $vehiculo->placa);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vehiculo $vehiculo)
    {
        $vehiculo->delete();
        return redirect()->route('administrador/vehiculos.index')
            ->with('msj_ok', 'Eliminado: ' . $vehiculo->placa);
    }

    public function reportev()
    {
        return view('reporte.vehiculos.reportev');
    }

    public function generarReporte(Request $request)
    {
        $fechaIni = $request->input('fechaIni');
        $fechaFin = $request->input('fechaFin');

        $vehiculos = Vehiculo::query();

        if (!is_null($fechaIni) && !is_null($fechaFin)) {
            $vehiculos->whereDate('created_at', '>=', $fechaIni)
                ->whereDate('created_at', '<=', $fechaFin);
        }

        $vehiculos = $vehiculos->get();

        $pdf = PDF::loadView('reporte.vehiculos.pdf-result', compact('vehiculos'));
        return $pdf->stream();
    }
}
