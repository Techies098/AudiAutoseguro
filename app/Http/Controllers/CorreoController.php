<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contrato;

class CorreoController extends Controller
{
    public function correo($id)
    {
        $contrato = Contrato::find($id);
        $correoCliente = $contrato->vehiculo->cliente->user->email;
        //dd($correoCliente);

        return view('administrador.contratos.correo', compact('correoCliente'));
    }
}
