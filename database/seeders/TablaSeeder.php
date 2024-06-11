<?php

namespace Database\Seeders;

use App\Models\Tabla;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TablaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Poblando la tabla, Tablas
        //otra opcion 'relaciones' => json_encode(['contratos']) // Convierte el array en JSON
        Tabla::create([
            'nombre' => 'contratos',
            'columna' => json_encode(['id', 'vehiculo_id', 'vendedor_id', 'seguro_id', 'costofranquicia', 'costoprima', 'nro_cuotas', 'tipovigencia', 'vigenciainicio', 'vigenciafin', 'estado', 'created_at']),
            'relacion' => json_encode(['seguros', 'venderores', 'vehiculos'])
        ]);

        Tabla::create([
            'nombre' => 'seguros',
            'columna' => json_encode(['id', 'nombre', 'descripcion', 'precio_prima', 'created_at']),
            'relacion' => json_encode(['contratos'])
        ]);

        Tabla::create([
            'nombre' => 'vehiculos',
            'columna' => json_encode(['id', 'cliente_id', 'marca', 'modelo', 'clase', 'color', 'placa', 'chasis', 'motor', 'traccion', 'anio', 'uso', 'nro_asientos', 'combustible', 'valor_comercial', 'created_at']),
            'relacion' => json_encode(['clientes'])
        ]);
    }
}
