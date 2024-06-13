<?php

namespace App\Http\Controllers;

use App\Models\Auxilio;
use Illuminate\Http\Request;

class AuxilioController extends Controller
{
    public function index()
    {
        $auxilios = Auxilio::paginate(10); // Paginación
        return view('auxilios.index', compact('auxilios'));
    }

    public function create()
    {
        return view('auxilios.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string|max:255',
            'precio' => 'required|numeric',
        ]);

        Auxilio::create($request->all());
        return redirect()->route('auxilios.index');
    }

    public function show($id)
    {
        $auxilio = Auxilio::find($id);

        if (is_null($auxilio)) {
            return redirect()->route('auxilios.index')->with('error', 'Auxilio no encontrado');
        }

        return view('auxilios.show', compact('auxilio'));
    }

    public function edit($id)
    {
        $auxilio = Auxilio::find($id);

        if (is_null($auxilio)) {
            return redirect()->route('auxilios.index')->with('error', 'Auxilio no encontrado');
        }

        return view('auxilios.edit', compact('auxilio'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'string|max:255',
            'descripcion' => 'string|max:255',
            'precio' => 'numeric',
        ]);

        $auxilio = Auxilio::find($id);

        if (is_null($auxilio)) {
            return redirect()->route('auxilios.index')->with('error', 'Auxilio no encontrado');
        }

        $auxilio->update($request->all());
        return redirect()->route('auxilios.index');
    }

    public function destroy($id)
    {
        $auxilio = Auxilio::find($id);

        if (is_null($auxilio)) {
            return redirect()->route('auxilios.index')->with('error', 'Auxilio no encontrado');
        }

        $auxilio->delete();
        return redirect()->route('auxilios.index');
    }
}