<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BitacoraController extends Controller
{
    public function index()
    {
        if (auth()->check() && auth()->user()->id === 1){
            return view('administrador.bitacoras.index');
        }else{
            abort(403, 'Acceso denegado');
        }
    }
}
