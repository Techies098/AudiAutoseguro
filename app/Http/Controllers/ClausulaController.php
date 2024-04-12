<?php

namespace App\Http\Controllers;

use App\Models\Clausula;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClausulaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('administrador.clausulas.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('administrador.clausulas.create', [
            'clausula' => new Clausula()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'detalle' => 'required|max:250'
        ]);

        $clausula = Clausula::create($request->all());

        return redirect()->route('administrador/clausulas.index')
            ->with('msj_ok', 'Creado: ' . $clausula->detalle);
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
    public function edit(Clausula $clausula)
    {
        return view('administrador.clausulas.edit', [
            'clausula' => $clausula
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Clausula $clausula)
    {
        $request->validate([
            'id_cliente' => 'required|max:250'
        ]);

        $clausula->update($request->all());

        return redirect()->route('administrador/clausulas.index')
            ->with('msj_ok', 'Actualizado: ' . $clausula->detalle);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Clausula $clausula)
    {
        $clausula->delete();
        return redirect()->route('administrador/clausulas.index')
            ->with('msj_ok', 'Eliminado: ' . $clausula->detalle);
    }
}
