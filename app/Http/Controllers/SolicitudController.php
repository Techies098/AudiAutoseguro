<?php

namespace App\Http\Controllers;

use App\Models\Solicitud;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SolicitudController extends Controller
{
    /*
    public function index()
    {
        $pendientes = Solicitud::pendiente()->get();
        $enProgreso = Solicitud::enProgreso()->get();
        $aprobadas = Solicitud::aprobada()->get();
        $denegadas = Solicitud::denegada()->get();

        return view('solicitudes.index', compact('pendientes', 'enProgreso', 'aprobadas', 'denegadas'));
    }*/
    public function index()
    {
        $pendientes = Solicitud::pendiente()->with('user')->get();
        $enProgreso = Solicitud::enProgreso()->with('user')->get();
        $aprobadas = Solicitud::aprobada()->with('user')->get();
        $denegadas = Solicitud::denegada()->with('user')->get();

        return view('solicitudes.index', compact('pendientes', 'enProgreso', 'aprobadas', 'denegadas'));
    }


    public function misSolicitudes()
    {
        $usuario = Auth::user();
        $misSolicitudes = Solicitud::where('user_id', $usuario->id)->get();

        return view('solicitudes.mis', compact('misSolicitudes'));
    }

    public function cambiarEstado(Request $request, Solicitud $solicitud)
    {
        $request->validate([
            'estado' => 'required|in:pendiente,en progreso,aprobada,denegada'
        ]);

        $solicitud->estado = $request->estado;
        $solicitud->save();

        return redirect()->back()->with('success', 'Estado de la solicitud actualizado correctamente.');
    }

    public function create()
    {
        return view('solicitudes.create');
    }
/*
    public function store(Request $request)
    {
        $request->validate([
            'seguro_id' => 'required|exists:seguros,id',
        ]);
    
        Solicitud::create([
            'cliente_id' => auth()->id(), 
            'seguro_id' => $request->seguro_id,
            'estado' => 'pendiente',
            'hora' => now()->format('H:i:s'), 
            'fecha' => now()->format('Y-m-d'),  
        ]);
    
        return redirect()->route('solicitudes.mis')->with('success', 'Solicitud creada exitosamente.');
    }*/

    public function store(Request $request)
{
    $request->validate([
        'seguro_id' => 'required|exists:seguros,id',
    ]);

    // Crear la solicitud y relacionarla con el cliente actualmente autenticado
    $solicitud = new Solicitud();
    $solicitud->user_id = auth()->id(); 
    $solicitud->seguro_id = $request->seguro_id;
    $solicitud->estado = 'pendiente';
    $solicitud->hora = now()->format('H:i:s'); 
    $solicitud->fecha = now()->format('Y-m-d');
    $solicitud->save();

    // Obtener el nombre del cliente
    $nombreCliente = $solicitud->user->nombre;

    return redirect()->route('solicitudes.mis')->with('success', 'Solicitud creada exitosamente para ' . $nombreCliente);
}


    public function show(Solicitud $solicitud)
    {
        return view('solicitudes.show', compact('solicitud'));
    }

    public function edit(Solicitud $solicitud)
    {
        return view('solicitudes.edit', compact('solicitud'));
    }

    public function update(Request $request, Solicitud $solicitud)
    {
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'seguro_id' => 'required|exists:seguros,id',
            'hora' => 'required',
            'fecha' => 'required|date',
            'estado' => 'required|in:pendiente,en progreso,aprobada,denegada'
        ]);

        $solicitud->update($request->all());

        return redirect()->route('solicitudes.mis')->with('success', 'Solicitud actualizada correctamente.');
    }

    public function destroy(Solicitud $solicitud)
    {
        $solicitud->delete();
    
        return redirect()->route('solicitudes.mis')->with('success', 'Solicitud eliminada correctamente.');
    }
}
