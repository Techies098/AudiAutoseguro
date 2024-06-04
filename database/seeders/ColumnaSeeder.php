<?php

namespace Database\Seeders;

use App\Models\Tabla;
use App\Models\Columna;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ColumnaSeeder extends Seeder
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
            'relaciones' => json_encode(['seguros', 'venderores', 'vehiculos'])
        ]);

        Tabla::create([
            'nombre' => 'seguros',
            'relaciones' => json_encode(['contratos'])
        ]);

        // Poblando la tabla, Columnas
        // Para tabla contratos
        Columna::create([
            'nombre' => 'id',
            'tablas_id' => 1
        ]);
        Columna::create([
            'nombre' => 'vehiculo_id',
            'tablas_id' => 1
        ]);
        Columna::create([
            'nombre' => 'vendedor_id',
            'tablas_id' => 1
        ]);
        Columna::create([
            'nombre' => 'seguro_id',
            'tablas_id' => 1
        ]);
        Columna::create([
            'nombre' => 'costofranquicia',
            'tablas_id' => 1
        ]);
        Columna::create([
            'nombre' => 'costoprima',
            'tablas_id' => 1
        ]);
        Columna::create([
            'nombre' => 'nro_cuotas',
            'tablas_id' => 1
        ]);
        Columna::create([
            'nombre' => 'tipovigencia',
            'tablas_id' => 1
        ]);
        Columna::create([
            'nombre' => 'vigenciainicio',
            'tablas_id' => 1
        ]);
        Columna::create([
            'nombre' => 'vigenciafin',
            'tablas_id' => 1
        ]);
        Columna::create([
            'nombre' => 'estado',
            'tablas_id' => 1
        ]);
        Columna::create([
            'nombre' => 'created_at',
            'tablas_id' => 1
        ]);

        // Para tabla seguros
        Columna::create([
            'nombre' => 'id',
            'tablas_id' => 2
        ]);
        Columna::create([
            'nombre' => 'nombre',
            'tablas_id' => 2
        ]);
        Columna::create([
            'nombre' => 'descripcion',
            'tablas_id' => 2
        ]);
        Columna::create([
            'nombre' => 'precio_prima',
            'tablas_id' => 2
        ]);
        Columna::create([
            'nombre' => 'created_at',
            'tablas_id' => 2
        ]);
    }
}
