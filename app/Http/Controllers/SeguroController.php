<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Models\Seguro;
use Illuminate\Http\Request;

class SeguroController extends Controller
{
    public function __construct() {
        $this->middleware('can:administrador.seguros.index')->only('index');
        $this->middleware('can:administrador.seguros.create')->only('create', 'store');
        $this->middleware('can:administrador.seguros.edit')->only('edit', 'update');
        $this->middleware('can:administrador.seguros.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('administrador.seguros.index');
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Administrador.seguros.create',['seguro' => new Seguro()]);
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'precio_prima' => 'required|numeric',
        ]);

        Seguro::create($request->all());

        return redirect()->route('administrador/seguros.index')
            ->with('success', 'Seguro creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Seguro $seguro)
    {
        return view('administrador.seguros.show', compact('seguro'));

        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Seguro $seguro)
    {
        return view('administrador.seguros.edit', compact('seguro'));

        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Seguro $seguro)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'precio_prima' => 'required|numeric',
        ]);
        $seguro->update($request->all());
        return redirect()->route('administrador/seguros.index')->with('success', 'seguro actualizado exitosamente');
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Seguro $seguro)
    {
        $seguro->delete();
        return redirect()->route('administrador/seguros.index')->with('success','Seguro eliminado exitosamente'); 
        //
    }
}

