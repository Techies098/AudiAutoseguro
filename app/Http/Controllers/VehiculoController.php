<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Http\Controllers\Controller;
use App\Models\Vehiculo;
use Illuminate\Http\Request;

class VehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('administrador.vehiculos.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clientes = Cliente::all();
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
            'id_cliente' => 'required',
            'placa' => 'max:10',
            'clase' => 'max:30',
            'marca' => 'max:30',
            'modelo' => 'max:30',
            'anio' => 'max:10',
            'color' => 'max:30',
            'nro_asientos' => 'max:5'
        ]);

        $vehiculo = Vehiculo::create($request->all());

        return redirect()->route('administrador/vehiculos.index')
            ->with('msj_ok', 'Creado: vehiculo con placa: ' . $vehiculo->placa);
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

        return view('administrador.vehiculos.edit', [
            'vehiculo' => $vehiculo
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vehiculo $vehiculo)
    {
        $request->validate([
            'id_cliente' => 'required',
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
}
