<?php

namespace App\Http\Controllers;

use App\Models\DanoMenor;
use App\Models\Taller;
use Illuminate\Http\Request;

class DanoMenorPeritoController extends Controller
{
    public function index()
    {
        $danos = DanoMenor::orderBy('id', 'desc')->paginate(10);
        return view('perito.danos-menores.index', compact('danos'));
    }

    public function create()
    {
        return view('dano-menor-perito.create');
    }

    public function store(Request $request)
    {
        // return redirect()->route('dano-menor-perito.index');
    }

    public function show(DanoMenor $dano_menor)
    {
        $dano = $dano_menor;
        return view('perito.danos-menores.show', compact('dano'));
    }

    public function edit($dano)
    {
        $talleres = Taller::all();
        $dano_menor = $dano;
        return view('perito.danos-menores.edit', compact('dano', 'dano_menor', 'talleres'));
    }
    
    public function update(Request $request, DanoMenor $dano_menor)
    {
        $dano_menor->estado = 'Aprobado';
        $dano_menor->taller_id = $request->taller_id;
        $dano_menor->save();

        return redirect()->route('perito.danos-menores.index')
                ->with('msj_ok', 'Daño menor aprobado ->' . $dano_menor->titulo);
    }

    public function rechazar(DanoMenor $dano)
    {
        $dano->estado = 'Rechazado';
        $dano->save();
        return redirect()->route('perito.danos-menores.index')
            ->with('msj_ok', 'Daño menor rechado -> ' . $dano->titulo);
    }

    public function destroy($id)
    {
        // return redirect()->route('dano-menor-perito.index');
    }
    
}
