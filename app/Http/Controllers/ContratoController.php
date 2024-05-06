<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vehiculo;
use App\Models\Contrato;
use App\Models\User;

class ContratoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('administrador.contratos.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $vendedores = User::select(
            'vendedores.id',
            'users.name as nombrev',
        )->join('vendedores', 'vendedores.user_id', '=', 'users.id')->get();

        $vehiculos = Vehiculo::all();
        //dd($vendedores);

        return view('administrador.contratos.create', [
            'contrato' => new Contrato(),
            'vendedores' => $vendedores,
            'vehiculos' => $vehiculos
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
