<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Contrato;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClienteController extends Controller
{
    public function index()
    {
        return view('Personal.clientes.index');
    }

    //Lista de contratos del cliente
    public function contratos(Cliente $cliente){
        $contratos = DB::table('contratos')
        ->select('contratos.*')
        ->join('vehiculos', 'contratos.vehiculo_id', '=', 'vehiculos.id')
        ->join('clientes', 'vehiculos.cliente_id', '=', 'clientes.id')
        ->where('clientes.id', $cliente->id)
        ->get();
        return view('cliente.contratos.index', compact('contratos', 'cliente'));
    }

    public function show(Contrato $contrato){
        return view('cliente.contratos.show', compact('contrato'));
    }



    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function edit(Cliente $cliente)
    {
        //
    }

    public function update(Request $request, Cliente $cliente)
    {
        //
    }

    public function destroy(Cliente $cliente)
    {
        //
    }
}
