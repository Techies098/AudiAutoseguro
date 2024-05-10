<?php

namespace Database\Seeders;

use App\Models\Cobertura;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CoberturaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cobertura::create([
            'nombre' => 'Cobertura de Pérdida Total por Accidente',
            'cubre' => 100, //100->100%
            'sujeto_a_franquicia' => 'No',
            'limite_cobertura' => null,
            'precio' => 3 //3%->0,03
        ]);
        Cobertura::create([
            'nombre' => 'Cobertura de Pérdida Total por Robo',
            'cubre' => 100,
            'sujeto_a_franquicia' => 'No',
            'limite_cobertura' => null,
            'precio' => 2
        ]);
        Cobertura::create([
            'nombre' => 'Cobertura de Daños Propios',
            'cubre' => 100,
            'sujeto_a_franquicia' => 'Si',
            'limite_cobertura' => null,
            'precio' => 1.5
        ]);
        Cobertura::create([
            'nombre' => 'Cobertura de HMACC AMIT ( Cobertura de daños físicos del automóvil)',
            'cubre' => 100,
            'sujeto_a_franquicia' => 'Si',
            'limite_cobertura' => null,
            'precio' => 2
        ]);
        Cobertura::create([
            'nombre' => 'Cobertura de Responsabilidad Civil',
            'cubre' => null,
            'sujeto_a_franquicia' => 'No',
            'limite_cobertura' => 5000,
            'precio' => 3
        ]);
        Cobertura::create([
            'nombre' => 'Cobertura de Accidentes Personales a Ocupantes de Vehículos',
            'cubre' => null,
            'sujeto_a_franquicia' => 'No',
            'limite_cobertura' => 3000,
            'precio' => 2.5
        ]);
    }
}
