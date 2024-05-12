<?php

namespace App\Http\Controllers;

use App\Models\Cotizacion;
use App\Models\Seguro;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Dompdf\Dompdf;
use Dompdf\Options;

class CotizacionController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $seguros = Seguro::all();
        return view('cotizaciones.create', compact('seguros'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function success()
    {
        return view('cotizaciones.success');
    }

    /**
     * Generate PDF for the specified cotizacion.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'name' => 'required|string|max:70',
            'email' => 'required|email|max:100',
            'telefono' => 'nullable|string|max:10',
            'year' => 'required|integer|min:1900|max:' . date('Y'),
            'precio' => 'required|numeric|min:0',
            'marca' => 'required|string|max:20',
            'modelo' => 'required|string|max:40',
            'seguro_id' => 'required|exists:seguros,id', // Validar que el seguro seleccionado existe en la tabla de seguros
        ]);
    
        // Crear una nueva cotización con los datos del formulario
        $cotizacion = Cotizacion::create($request->all());
    
        // Redireccionar a la vista de éxito de la cotización, pasando el ID de la cotización como parámetro
        return redirect()->route('cotizaciones.success', ['id' => $cotizacion->id]);
    }
}
