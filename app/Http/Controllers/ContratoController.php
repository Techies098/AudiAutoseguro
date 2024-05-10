<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vehiculo;
use App\Models\Contrato;
use App\Models\Seguro;
use App\Models\User;
use App\Models\Vendedor;
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
        /*$vendedores = User::select(
            'vendedores.id',
            'users.name as nombrev',
        )->join('vendedores', 'vendedores.user_id', '=', 'users.id')->get();*/

        $idVendedor = Auth::user()->id;

        if (!Vendedor::where('user_id', $idVendedor)->exists()) {
            return redirect()->route('administrador/contratos.index')->with('error', 'El usuario autenticado no es de TIPO VENDEDOR');
        } else {

            $vendedor = Vendedor::join('users', 'users.id', '=', 'vendedores.user_id')
                ->where('users.id', $idVendedor)
                ->select('vendedores.id as v_id', 'users.id as u_id', 'users.name as nombrev')
                ->first();
            //dd($vendedor);

            $vehiculos = Vehiculo::all();
            $seguros = Seguro::all();

            return view('administrador.contratos.create', [
                'contrato' => new Contrato(),
                'seguros' => $seguros,
                'vehiculos' => $vehiculos,
                'vendedor' => $vendedor
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request);
        $request->validate([
            'vehiculo_id' => 'required',
            'vendedor_id' => 'required',
            'seguro_id' => 'required',
            'costofranquicia' => 'required',
            'costoprima' => 'required',
            'nro_cuotas' => 'required',
            'tipovigencia' => 'required',
            'vigenciainicio' => 'required',
            'vigenciafin' => 'required',
            'estado' => 'required'
        ]);
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
        $idVendedor = Auth::user()->id;
        $vendedor = Vendedor::join('users', 'users.id', '=', 'vendedores.user_id')
            ->where('users.id', $idVendedor)
            ->select('vendedores.id as v_id', 'users.id as u_id', 'users.name as nombrev')
            ->first();

        $vehiculos = Vehiculo::all();
        $seguros = Seguro::all();

        return view('administrador.contratos.edit', [
            'vendedor' => $vendedor,
            'contrato' => $contrato,
            'seguros' => $seguros,
            'vehiculos' => $vehiculos
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contrato $contrato)
    {
        $request->validate([
            'vehiculo_id' => 'required',
            'vendedor_id' => 'required',
            'seguro_id' => 'required',
            'costofranquicia' => 'required',
            'costoprima' => 'required',
            'nro_cuotas' => 'required',
            'tipovigencia' => 'required',
            'vigenciainicio' => 'required',
            'vigenciafin' => 'required',
            'estado' => 'required'
        ]);

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

    public function contrato(Contrato $contrato, $id)
    {
        //dd($id);
        $idVendedor = Auth::user()->id;
        $vendedor = Vendedor::join('users', 'users.id', '=', 'vendedores.user_id')
            ->where('users.id', $idVendedor)
            ->select('vendedores.id as v_id', 'users.id as u_id', 'users.name as nombrev')
            ->first();

        $vehiculos = Vehiculo::all();
        $seguros = Seguro::all();

        /*return view('administrador.contratos.edit', [
            //'vendedor' => $vendedor,
            'contrato' => $contrato,
            'seguros' => $seguros,
            'vehiculos' => $vehiculos
        ]);*/
        $pdf = PDF::loadView('reporte.contratos.pdf-contrato', compact('vehiculos'));
        return $pdf->stream();
    }
}
