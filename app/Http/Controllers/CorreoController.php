<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contrato;

use Illuminate\Support\Facades\Mail;
use App\Mail\EnvioContrato;

class CorreoController extends Controller
{
    public function correo($id)
    {
        $idcontrato = $id;
        $contrato = Contrato::find($id);
        $correoCliente = $contrato->vehiculo->cliente->user->email;
        //dd($correoCliente);

        return view('administrador.contratos.correo', compact('correoCliente', 'idcontrato'));
    }

    public function enviarCorreo(Request $request)
    {
        //return request()->all();
        //dd($request);
        $contrato = Contrato::find($request->idcontrato);
        $email = $request->email;
        $mensaje = $request->mensaje;
        $adjunto = $request->adjunto;

        Mail::to($email)->send(new EnvioContrato($mensaje, $contrato, $adjunto));
        return redirect()->route('administrador/contratos.index')->with('msj_ok', 'Correo enviado exitosamente');
    }
}
