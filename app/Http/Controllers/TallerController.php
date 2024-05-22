<?php

namespace App\Http\Controllers;

//use App\Http\Controllers\Controller;
use Illuminate\Routing\Controller;
use App\Models\Taller;
use Illuminate\Http\Request;

class TallerController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:administrador.talleres.index')->only('index');
        $this->middleware('can:administrador.talleres.create')->only('create', 'store');
        $this->middleware('can:administrador.talleres.edit')->only('edit', 'update');
        $this->middleware('can:administrador.talleres.show')->only('edit', 'show');
        $this->middleware('can:administrador.talleres.destroy')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('administrador.talleres.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('administrador.talleres.create', [
            'taller' => new Taller()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:250',
            'direccion' => 'required|max:250',
            'telefono' => 'required|max:250'
        ]);

        $taller = taller::create($request->all());

        return redirect()->route('administrador/talleres.index')
            ->with('msj_ok', 'Creado: ' . $taller->nombre);
    }

    /**
     * Display the specified resource.
     */
    public function show(Taller $taller)
    {
        return view('administrador.talleres.show', compact('taller'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Taller $taller)
    {
        return view('administrador.talleres.edit', [
            'taller' => $taller
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Taller $taller)
    {
        $request->validate([
            'nombre' => 'required|max:250',
            'direccion' => 'required|max:250',
            'telefono' => 'required|max:250'
        ]);

        $taller->update($request->all());

        return redirect()->route('administrador/talleres.index')
            ->with('msj_ok', 'Actualizado: ' . $taller->nombre);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function cambiarEstado($id)
    {
        $taller = Taller::findOrFail($id);
        $taller->estado = $taller->estado == 'Activo' ? 'Inactivo' : 'Activo';
        $taller->save();

        return response()->json(['nuevoEstado' => $taller->estado]);
    }
}
