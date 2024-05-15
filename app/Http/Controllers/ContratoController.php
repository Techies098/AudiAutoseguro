<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vehiculo;
use App\Models\Contrato;
use App\Models\Seguro;
use App\Models\Cliente;
use App\Models\Vendedor;
use App\Models\Administrador;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class ContratoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('administrador.contratos.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();

        // Verificar si el usuario es un vendedor
        $vendedor = Vendedor::where('user_id', $user->id)->first();

        if (!$vendedor) {
            // Si el usuario no es un vendedor, verificar si es un administrador
            $administrador = Administrador::where('user_id', $user->id)->first();

            if (!$administrador) {
                // Si el usuario no es ni vendedor ni administrador, redirigir con error
                return redirect()->route('administrador/contratos.index')->with('error', 'El usuario autenticado no tiene los permisos adecuados');
            }
        }

        // Recuperar datos necesarios para el formulario de creación
        $vehiculos = Vehiculo::all();
        $seguros = Seguro::all();

        // Pasar los datos recuperados a la vista
        return view('administrador.contratos.create', [
            'contrato' => new Contrato(),
            'seguros' => $seguros,
            'vehiculos' => $vehiculos,
            'vendedor' => $vendedor ?? null, // Puede ser null si no es un vendedor
            'administrador' => $administrador ?? null // Puede ser null si no es un administrador
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request);
        $request->validate([
            'vehiculo_id' => 'required',
            'user_id' => 'required',
            'seguro_id' => 'required',
            'costofranquicia' => 'required',
            'costoprima' => 'required',
            'nro_cuotas' => 'required',
            'tipovigencia' => 'required',
            'vigenciainicio' => 'required',
            'vigenciafin' => 'required'
        ]);

        $request->merge(['estado' => 'Inactivo']);
        //dd($request);
        $contrato = Contrato::create($request->all());
        //dd($contrato);

        return redirect()->route('administrador/contratos.index')
            ->with('msj_ok', 'Creado el contrato con ID: ' . $contrato->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contrato $contrato)
    {
        /*$idVendedor = Auth::user()->id;
        $vendedor = Vendedor::join('users', 'users.id', '=', 'vendedores.user_id')
            ->where('users.id', $idVendedor)
            ->select('vendedores.id as v_id', 'users.id as u_id', 'users.name as nombrev')
            ->first();*/

        $user = Auth::user();

        // Verificar si el usuario es un vendedor
        $vendedor = Vendedor::where('user_id', $user->id)->first();

        if (!$vendedor) {
            // Si el usuario no es un vendedor, verificar si es un administrador
            $administrador = Administrador::where('user_id', $user->id)->first();

            if (!$administrador) {
                // Si el usuario no es ni vendedor ni administrador, redirigir con error
                return redirect()->route('administrador/contratos.index')->with('error', 'El usuario autenticado no tiene los permisos adecuados');
            }
        }


        $vehiculos = Vehiculo::all();
        $seguros = Seguro::all();

        return view('administrador.contratos.edit', [
            //'vendedor' => $vendedor,
            'contrato' => $contrato,
            'seguros' => $seguros,
            'vehiculos' => $vehiculos,
            'vendedor' => $vendedor ?? null, // Puede ser null si no es un vendedor
            'administrador' => $administrador ?? null // Puede ser null si no es un administrador
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contrato $contrato)
    {
        $request->validate([
            'vehiculo_id' => 'required',
            'user_id' => 'required',
            'seguro_id' => 'required',
            'costofranquicia' => 'required',
            'costoprima' => 'required',
            'nro_cuotas' => 'required',
            'tipovigencia' => 'required',
            'vigenciainicio' => 'required',
            'vigenciafin' => 'required'
        ]);

        $request->merge(['estado' => 'Inactivo']);

        $contrato->update($request->all());

        return redirect()->route('administrador/contratos.index')
            ->with('msj_ok', 'Contrato actualizado: ' . $contrato->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function generarReporte(Request $request)
    {
        $fechaIni = $request->input('fechaIni');
        $fechaFin = $request->input('fechaFin');

        $vehiculos = Vehiculo::query();

        if (!is_null($fechaIni) && !is_null($fechaFin)) {
            $vehiculos->whereDate('created_at', '>=', $fechaIni)
                ->whereDate('created_at', '<=', $fechaFin);
        }

        $vehiculos = $vehiculos->get();

        $pdf = PDF::loadView('reporte.vehiculos.pdf-result', compact('vehiculos'));
        return $pdf->stream();
    }

    public function contrato($id)
    {
        $contrato = Contrato::find($id);

        $vehiculo = Vehiculo::find($contrato->vehiculo_id);
        $cliente = Cliente::find($vehiculo->cliente_id)->user;

        //dd($cliente);

        $seguro = Seguro::find($contrato->seguro_id);
        $coberturas = $seguro->cobertura;
        $clausulas = $seguro->clausula;

        //$pdf = PDF::loadView('reporte.contratos.pdf-contrato', compact('vehiculos'));
        $pdf = PDF::loadView('reporte.contratos.pdf-contrato', [
            'contrato' => $contrato,
            'vehiculo' => $vehiculo,
            'coberturas' => $coberturas,
            'clausulas' => $clausulas,
            'cliente' => $cliente
        ]);
        return $pdf->stream();
    }
}
