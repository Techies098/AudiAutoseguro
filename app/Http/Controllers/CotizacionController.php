<?php

namespace App\Http\Controllers;

use App\Models\Clausula;
use App\Models\Cobertura;
use App\Models\Cotizacion;
use App\Models\Seguro;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Dompdf\Dompdf;
use Dompdf\Options;
use Carbon\Carbon;

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
    public function success()
    {
        Obtener todos los seguros con sus cláusulas y coberturas
        $seguros = Seguro::with('clausula', 'cobertura')->get();
    
        Aquí puedes realizar los cálculos necesarios para determinar el precio total de la cotización
        $precioTotal = 0;
        foreach ($seguros as $seguro) {
            foreach ($seguro->coberturas as $cobertura) {
                Suponiendo que cada cobertura tiene un precio
                $precioTotal += $cobertura->precio;
            }
        }
    
        Puedes pasar el precio total a la vista junto con los seguros, cláusulas y coberturas
        return view('cotizaciones.success', compact('seguros', 'precioTotal'));
    }

*/
public function success($id)
{
    // Obtener la cotización según el ID proporcionado
    $cotizacion = Cotizacion::findOrFail($id);

    // Obtener el seguro seleccionado en la cotización con sus cláusulas y coberturas
    $seguro = Seguro::with('clausula', 'cobertura')->findOrFail($cotizacion->seguro_id);

    // Calcular el precio total de la cotización
    $precioDepreciado = $this->calcularPrecioDepreciado($cotizacion->year, $cotizacion->precio);
    $precioTotal = $precioDepreciado * $seguro->precio_prima;

    // Pasar todas las cláusulas y coberturas a la vista (por si quieres utilizarlas también)
    $clausulas = $seguro->clausulas;
    $coberturas = $seguro->coberturas;

    return view('cotizaciones.success', compact('seguro', 'precioDepreciado', 'precioTotal', 'cotizacion', 'clausulas', 'coberturas'));
}


/**
 * Calcula la depreciación del vehículo.
 *
 * @param  int  $year
 * @param  float  $precio
 * @return float|null
 */
private function calcularPrecioDepreciado($year, $precio)
{
    $anios = Carbon::now()->year - $year;

    // Si el vehículo tiene más de 5 años, devuelve null
    if ($anios > 5) {
        return null;
    }

    // Calcular la depreciación acumulada del vehículo
    $depreciacion = 0;
    for ($i = 1; $i <= $anios; $i++) {
        // Depreciación lineal del 15% al 25% anual durante los primeros 4 años
        $depreciacion += 20 / 100;
    }

    // Aplicar la depreciación al precio original
    return $precio - ($precio * $depreciacion);
}

/**
 * Verifica si el vehículo es apto para el seguro.
 *
 * @param  int  $year
 * @param  float  $precio
 * @return bool
 */
private function esAptoParaSeguro($year, $precio)
{
    // Obtener el precio depreciado del vehículo
    $precioDepreciado = $this->calcularPrecioDepreciado($year, $precio);

    // Si el precio depreciado es null o menor a $2500, no es apto para el seguro
    if ($precioDepreciado === null || $precioDepreciado < 2500) {
        return false;
    }

    return true;
}



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
    
        // Verificar si el vehículo es apto para el seguro
        if (!$this->esAptoParaSeguro($request->year, $request->precio)) {
            return redirect()->back()->with('error', 'El vehículo no es apto para el seguro.');
        }
        
        // Crear una nueva cotización con los datos del formulario
        $cotizacion = Cotizacion::create($request->all());
    
        // Obtener todos los seguros con sus cláusulas y coberturas
        $seguros = Seguro::with('clausula', 'cobertura')->get();
    
        // Pasar todas las cláusulas y coberturas a la vista
        $coberturas = Cobertura::all(); // Obtener todas las coberturas
        $clausulas = Clausula::all(); // Obtener todas las cláusulas
    
        // Redireccionar a la vista de éxito de la cotización, pasando el ID de la cotización como parámetro
        return redirect()->route('cotizaciones.success', ['id' => $cotizacion->id])->with(compact('seguros','clausulas', 'coberturas'));
    }
    
    
}
