<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cobertura;
use Illuminate\Http\Request;


class CoberturaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('administrador.coberturas.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('administrador.coberturas.create', [
            'cobertura' => new Cobertura(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'cubre' => 'numeric',
            'sujeto_a_franquicia' => 'required|string',
            'limite_cobertura' => 'numeric',
            'precio' => 'required|numeric'
        ]);

        Cobertura::create($request->all());

        return redirect()->route('administrador/coberturas.index')
            ->with('success', 'Cobertura creada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cobertura $cobertura)
    {
        return view('administrador.coberturas.show', compact('cobertura'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cobertura $cobertura)
    {
        return view('administrador.coberturas.edit', compact('cobertura'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cobertura $cobertura)
    {
        $request->validate([
            'nombre' => 'required',
            'cubre' => 'numeric',
            'sujeto_a_franquicia' => 'required|string',
            'limite_cobertura' => 'numeric',
            'precio' => 'required|numeric'
        ]);

        $cobertura->update($request->all());

        return redirect()->route('administrador/coberturas.index')
            ->with('success', 'Cobertura actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cobertura $cobertura)
    {
        $cobertura->delete();
        return redirect()->route('administrador/coberturas.index')
            ->with('success', 'Cobertura eliminada exitosamente.');
    }
}
