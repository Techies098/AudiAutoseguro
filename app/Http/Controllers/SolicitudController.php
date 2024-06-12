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

        // Si el estado es "en progreso", establecer el vendedor_id
        if ($request->estado == 'en progreso') {
            $solicitud->vendedor_id = Auth::id();
        }

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
        // Cargar los datos del seguro, coberturas, cláusulas y los datos del cliente
        $seguro = $solicitud->seguro;
        $coberturas = $seguro->coberturas;
        $clausulas = $seguro->clausulas;
        $cliente = $solicitud->user;
        $vendedor = $solicitud->vendedor;


        return view('solicitudes.show', compact('solicitud', 'seguro', 'coberturas', 'clausulas', 'cliente','vendedor'));
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
    public function solicitudesVendedor()
    {
        // Obtener el ID del vendedor autenticado
        $vendedorId = Auth::id();
    
        // Obtener las solicitudes pendientes asignadas al vendedor autenticado
        $pendientes = Solicitud::where('vendedor_id', $vendedorId)
                                ->pendiente()
                                ->with('user')
                                ->get();
    
        // Obtener las solicitudes en progreso asignadas al vendedor autenticado
        $enProgreso = Solicitud::where('vendedor_id', $vendedorId)
                               ->enProgreso()
                               ->with('user')
                               ->get();
    
        // Obtener las solicitudes aprobadas asignadas al vendedor autenticado
        $aprobadas = Solicitud::where('vendedor_id', $vendedorId)
                              ->aprobada()
                              ->with('user')
                              ->get();
    
        // Obtener las solicitudes denegadas asignadas al vendedor autenticado
        $denegadas = Solicitud::where('vendedor_id', $vendedorId)
                              ->denegada()
                              ->with('user')
                              ->get();
    
        return view('solicitudes.vendedor', compact('pendientes', 'enProgreso', 'aprobadas', 'denegadas'));
    }
}
