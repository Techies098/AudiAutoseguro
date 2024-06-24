<?php

namespace App\Http\Controllers;

use App\Models\Contrato;
use App\Models\Vehiculo;
use App\Models\Siniestro;
use Illuminate\Http\Request;
use App\Models\TipoDeSiniestro;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class SiniestroController extends Controller
{
    public function __construct() {
        $this->middleware('can:personal.siniestros.index')->only('index');
        $this->middleware('can:personal.siniestros.reportar')->only('reportar', 'store');
        $this->middleware('can:personal.siniestros.revisar')->only('revisar', 'update');
        $this->middleware('can:personal.siniestros.calificar')->only('Aprobar', 'denegar','re_evaluar');
    }
    public function index()
    {
        return view('personal.siniestros.index');
    }

    public function create()
    {
        //
    }
    public function reportar()
    {
        $tiposDeSiniestro = TipoDeSiniestro::all();
        $user=auth()->user();
        if ($user->cliente) {
            $clienteId = auth()->user()->cliente->id; // Accede al ID del cliente relacionado
            $vehiculos = Vehiculo::where('cliente_id', $clienteId)->get();
            $contratos = Contrato::where('vigenciafin', '>', now())->get();
        return view('personal.siniestros.reportar', compact('vehiculos', 'contratos','tiposDeSiniestro'));
        }else{
            return redirect()->route('personal/siniestros.index')
                ->with('msj_ok', 'No tienes permisos para reportar siniestro');
        }

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
            'tipo_de_siniestro_id' => $request->tipo,
        ]);
        if ($siniestro) {
            return redirect()->route('personal/siniestros.index')
                ->with('msj_ok', 'Siniestro creado id: ' . $siniestro->id);
        } else {
            return redirect()->route('personal/siniestros.index')
                ->with('msj_error', 'Hubo un error al crear el siniestro.');
        }
    }
    public function Aprobar(string $id)
    {
        $registro = Siniestro::find($id);
        if ($registro) {
            $registro->estado = 'aprobado';
            $registro->save();
            return redirect()->route('personal/siniestros.index')
                ->with('msj_ok', 'El estado ha sido cambiado a aprobado, id: ' . $id);
        }
    }

    public function denegar(string $id)
    {
        $registro = Siniestro::find($id);
        if ($registro) {
            $registro->estado = 'negado';
            $registro->save();
            return redirect()->route('personal/siniestros.index')
                ->with('msj_ok', 'El estado ha sido cambiado a negado, id: ' . $id);
        }
    }
    public function re_evaluar(string $id)
    {
        $registro = Siniestro::find($id);
        if ($registro) {
            $registro->estado = 'Espera';
            $registro->save();
            return redirect()->route('personal/siniestros.index')
                ->with('msj_ok', 'El estado ha sido cambiado a Re_evaluar, id: ' . $id);
        }
    }


    public function show(string $id)
    {
        // Obtén el siniestro por su ID
        $siniestro = Siniestro::findOrFail($id);
        // Envía el siniestro a la vista
        return view('personal/siniestros.show', compact('siniestro'));
    }
    public function revisar(string $id)
    // {
    //     $siniestro = Siniestro::findOrFail($id);
    //     return view('personal.siniestros.revisar', compact('siniestro'));
    // }
    {
        $siniestro = Siniestro::findOrFail($id);
        $tiposDeSiniestro = TipoDeSiniestro::all();
        return view('personal.siniestros.revisar', compact('siniestro', 'tiposDeSiniestro'));
    }


    public function edit(string $id)
    {
    }

    public function update(Request $request, $id)
    {
        // Validar los datos de entrada (opcional)
        $validatedData = $request->validate([
            'contrato_id' => 'nullable|integer',
            'detalle' => 'nullable|string',
            'estado' => 'nullable|string',
            'estado_ebriedad' => 'nullable|string',
            'monto_siniestro' => 'nullable|numeric',
            'porcentaje_danio' => 'nullable|numeric',
            'porcentajeCulpabilidad' => 'nullable|numeric',
            'tipo' => 'nullable|string',
            'ubicacion' => 'nullable|string',
            'url_informe' => 'nullable|url',
        ]);

        // Buscar el siniestro por ID y actualizarlo
        $siniestro = Siniestro::findOrFail($id);
        $siniestro->fill($validatedData);
        $siniestro->estado = 'revisado';
        $user = auth()->user();
        if ($user->perito) {
            $perito = $user->perito->id;
        } else {
            $perito = null;//un admin
        }
        $siniestro->perito_id = $perito;
        $siniestro->save();
        return redirect()->route('personal/siniestros.index')->with('msj_ok', 'Siniestro revisado: ' . $siniestro->id);
    }


    public function destroy(string $id)
    {
        //
    }
}
