<?php

namespace App\Http\Controllers;

use App\Models\SolicitudAux;
use App\Models\Auxilio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SolicitudAuxController extends Controller
{
    public function index()
    {
        $pendientes = SolicitudAux::where('estado', 'pendiente')->with('user')->get();
        $enProgreso = SolicitudAux::where('estado', 'en progreso')->with('user')->get();
        $aprobadas = SolicitudAux::where('estado', 'aprobada')->with('user')->get();
        $denegadas = SolicitudAux::where('estado', 'denegada')->with('user')->get();

        return view('auxilios.solicitudes.index', compact('pendientes', 'enProgreso', 'aprobadas', 'denegadas'));
    }

    public function misSolicitudes()
    {
        $usuario = Auth::user();
        $misSolicitudes = SolicitudAux::where('user_id', $usuario->id)->get();

        return view('auxilios.solicitudes.mis', compact('misSolicitudes'));
    }

    public function cambiarEstado(Request $request, SolicitudAux $solicitud)
    {
        $request->validate([
            'estado' => 'required|in:pendiente,en progreso,aprobada,denegada'
        ]);

        $solicitud->estado = $request->estado;

        if ($request->estado == 'en progreso') {
            $solicitud->vendedor_id = Auth::id();
        }

        $solicitud->save();

        return redirect()->back()->with('success', 'Estado de la solicitud actualizado correctamente.');
    }

    public function create()
    {
        $auxilios = Auxilio::all(); // Obtener todos los auxilios
        return view('auxilios.solicitudes.create', compact('auxilios'));
    }
    
    public function edit(SolicitudAux $solicitud)
    {
        $auxilios = Auxilio::all(); // Obtener todos los auxilios
        return view('auxilios.solicitudes.edit', compact('solicitud', 'auxilios'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'auxilio_id' => 'required|exists:auxilios,id',
            'ubicacion' => 'required|string',
        ]);

        SolicitudAux::create([
            'user_id' => auth()->id(),
            'auxilio_id' => $request->auxilio_id,
            'estado' => 'pendiente',
            'hora' => now()->format('H:i:s'),
            'fecha' => now()->format('Y-m-d'),
            'ubicacion' => $request->ubicacion,
        ]);

        return redirect()->route('solicitudesA.mis')->with('success', 'Solicitud creada exitosamente.');
    }

    public function show(SolicitudAux $solicitud)
    {
        $auxilio = $solicitud->auxilio;
        $cliente = $solicitud->user;
        $vendedor = $solicitud->vendedor;

        return view('auxilios.solicitudes.show', compact('solicitud', 'auxilio', 'cliente', 'vendedor'));
    }

    public function update(Request $request, SolicitudAux $solicitud)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'auxilio_id' => 'required|exists:auxilios,id',
            'hora' => 'required',
            'fecha' => 'required|date',
            'estado' => 'required|in:pendiente,en progreso,aprobada,denegada',
            'ubicacion' => 'required|string',
        ]);

        $solicitud->update($request->all());

        return redirect()->route('solicitudesA.mis')->with('success', 'Solicitud actualizada correctamente.');
    }

    public function destroy(SolicitudAux $solicitud)
    {
        $solicitud->delete();

        return redirect()->route('solicitudesA.mis')->with('success', 'Solicitud eliminada correctamente.');
    }

    public function solicitudesVendedor()
    {
        $vendedorId = Auth::id();

        $pendientes = SolicitudAux::where('vendedor_id', $vendedorId)
                                ->where('estado', 'pendiente')
                                ->with('user')
                                ->get();

        $enProgreso = SolicitudAux::where('vendedor_id', $vendedorId)
                               ->where('estado', 'en progreso')
                               ->with('user')
                               ->get();

        $aprobadas = SolicitudAux::where('vendedor_id', $vendedorId)
                              ->where('estado', 'aprobada')
                              ->with('user')
                              ->get();

        $denegadas = SolicitudAux::where('vendedor_id', $vendedorId)
                              ->where('estado', 'denegada')
                              ->with('user')
                              ->get();

        return view('auxilios.solicitudes.vendedor', compact('pendientes', 'enProgreso', 'aprobadas', 'denegadas'));
    }
}
