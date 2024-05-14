<?php

namespace App\Http\Controllers;

use App\Models\Contrato;
use App\Models\Vehiculo;
use App\Models\Siniestro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiniestroController extends Controller
{
    public function index()
    {
        return view('Personal.siniestros.index');
    }

    public function create()
    {
        //
    }
    public function reportar()
    {
        $clienteId = auth()->user()->cliente->id; // Accede al ID del cliente relacionado
        $vehiculos = Vehiculo::where('cliente_id', $clienteId)->get();
        $contratos = Contrato::where('vigenciafin', '>', now())->get();
        return view('Personal.siniestros.reportar', compact('vehiculos', 'contratos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'contrato_id' => 'required',
            'ubicacion' => 'required',
            'tipo' => 'required',
        ]);
        $siniestro = Siniestro::create([
            'contrato_id' => $request->contrato_id,
            'ubicacion' => $request->ubicacion,
            'tipo' => $request->tipo,
        ]);
        if ($siniestro) {
            return redirect()->route('inicio')
                ->with('msj_ok', 'Creado: ' . $siniestro->id);
        } else {
            return redirect()->route('incio')
                ->with('msj_error', 'Hubo un error al crear el siniestro.');
        }
    }
    public function Aprobar(string $id)
    {
        $registro = Siniestro::find($id);
        if ($registro) {
            $registro->estado = 'aprobado';
            $registro->save();
            return "El estado ha sido cambiado a aprobado.";
        } else {
            return "Registro no encontrado.";
        }
    }

    public function denegar(string $id)
    {
        $registro = Siniestro::find($id);
        if ($registro) {
            $registro->estado = 'denegar';
            $registro->save();
            return "El estado ha sido cambiado a denegado.";
        } else {
            return "Registro no encontrado.";
        }
    }
    public function re_evaluar(string $id)
    {
        $registro = Siniestro::find($id);
        if ($registro) {
            $registro->estado = 'Espera';
            $registro->save();
            return "El estado ha sido cambiado a Re_evaluar.";
        } else {
            return "Registro no encontrado.";
        }
    }


    public function show(string $id)
    {
        // Obtén el siniestro por su ID
        $siniestro = Siniestro::findOrFail($id);
        // Envía el siniestro a la vista
        return view('Personal.siniestros.show', compact('siniestro'));
    }


    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
