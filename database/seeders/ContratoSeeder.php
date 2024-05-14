<?php

namespace Database\Seeders;

use App\Models\Contrato;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContratoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Contrato::create([

            'vehiculo_id' => '1',
            'user_id' => '1',
            'seguro_id' => 1,
            'costofranquicia' => 300,
            'costoprima' => 450,
            'nro_cuotas' => 6,
            'tipovigencia' => 'Anual',
            'vigenciainicio' => '2024-04-30 00:00:00',
            'vigenciafin' => '2025-05-30 00:00:00',
            'estado' => 'Activo'

        ]);

        Contrato::create([

            'vehiculo_id' => '2',
            'user_id' => '7',
            'seguro_id' => 2,
            'costofranquicia' => 350,
            'costoprima' => 550,
            'nro_cuotas' => 6,
            'tipovigencia' => 'Anual',
            'vigenciainicio' => '2024-04-30 00:00:00',
            'vigenciafin' => '2025-05-30 00:00:00',
            'estado' => 'Activo'

        ]);

        Contrato::create([

            'vehiculo_id' => '3',
            'user_id' => '7',
            'seguro_id' => 3,
            'costofranquicia' => 550,
            'costoprima' => 1050,
            'nro_cuotas' => 6,
            'tipovigencia' => 'Anual',
            'vigenciainicio' => '2024-04-30 00:00:00',
            'vigenciafin' => '2025-05-30 00:00:00',
            'estado' => 'Activo'

        ]);
    }
}
