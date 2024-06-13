<?php

namespace App\Http\Controllers;

use App\Models\Contrato;
use App\Models\DanoMenor;
use App\Models\Multimedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DanoMenorClienteController extends Controller
{
    public function index()
    {
        $userId = auth()->user()->id;

        // Realizar la consulta utilizando Eloquent
        $danos = DanoMenor::whereHas('contrato.vehiculo.cliente', function($query) use ($userId) {
            $query->where('user_id', $userId);
        })->orderBy('created_at', 'desc')->paginate(10);

        return view('cliente.danos-menores.index', compact('danos'));
    }

    public function create()
    {
        $userId = auth()->user()->id;
        $vehiculos = auth()->user()->cliente->vehiculos;
        $contratos = Contrato::whereHas('vehiculo.cliente', function($query) use ($userId) {
            $query->where('user_id', $userId);
        })->get();
        return view('cliente.danos-menores.create', compact('vehiculos', 'contratos'));
    }

    public function store(Request $request)
    {
        // return $request->all();
        $request->validate([
            'titulo' => 'required',
            'detalle' => 'required',
            // 'taller_id' => 'required',
            'contrato_id' => 'required',
            'file.*' => 'nullable|mimes:jpeg,png,jpg,pdf,mp4|max:20480',
        ]);

        // return $request->all();

        try {
            DB::beginTransaction();

            $danoMenor = DanoMenor::create($request->all());

            if ($request->hasFile('file')) {
                $archivos = $request->file('file');
                foreach ($archivos as $archivo) {
                    // $ruta = $archivo->store('public/danos-menores/' . $danoMenor->id);
                    $ruta = $archivo->store('public/danos-menores');
                    $url = Storage::url($ruta);
                    // dd($url);
                    Multimedia::create([
                        'url' => $url,
                        'tipo' => $archivo->getMimeType(),
                        'dano_menor_id' => $danoMenor->id
                    ]);
                }
            }

            DB::commit();

            return redirect()->route('cliente.dano-menor.index')
                ->with('msj_ok', 'Reporte de daño guardado');
        } catch (\Throwable $th) {
            DB::rollback();

            return redirect()->route('cliente.dano-menor.index')
                ->with('msj_ok', $th);
        }

        
    }

    public function show($id)
    {
        $dano = DanoMenor::findOrFail($id);
        return view('cliente.danos-menores.show', compact('dano'));
        // return view('danoMenorCliente.show', compact('danoMenor'));
    }

    public function edit($id)
    {
        // $danoMenor = auth()->user()->danoMenor()->findOrFail($id);
        // return view('danoMenorCliente.edit', compact('danoMenor'));
    }

    public function update(Request $request, $id)
    {
        // $request->validate([
        //     'titulo' => 'required',
        //     'detalle' => 'required',
        //     'taller_id' => 'required'
        // ]);

        // $danoMenor = auth()->user()->danoMenor()->findOrFail($id);
        // $danoMenor->update($request->all());

        // return redirect()->route('danoMenorCliente.index');
    }

    public function destroy($id)
    {
        // $danoMenor = auth()->user()->danoMenor()->findOrFail($id);
        // $danoMenor->delete();

        // return redirect()->route('danoMenorCliente.index');
    }
}
