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
            'vendedor_id' => '1',
            'seguro_id' => 1,
            'costofranquicia' => 300,
            'costoprima' => 450,
            'nro_cuotas' => 6,
            'tipovigencia' => 'Anual',
            'vigenciainicio' => '2024-04-30 00:00:00',
            'vigenciafin' => '2025-05-30 00:00:00'

        ]);

        Contrato::create([

            'vehiculo_id' => '2',
            'vendedor_id' => '1',
            'seguro_id' => 2,
            'costofranquicia' => 350,
            'costoprima' => 550,
            'nro_cuotas' => 6,
            'tipovigencia' => 'Anual',
            'vigenciainicio' => '2024-04-30 00:00:00',
            'vigenciafin' => '2025-05-30 00:00:00'

        ]);

        Contrato::create([

            'vehiculo_id' => '3',
            'vendedor_id' => '2',
            'seguro_id' => 3,
            'costofranquicia' => 550,
            'costoprima' => 1050,
            'nro_cuotas' => 6,
            'tipovigencia' => 'Anual',
            'vigenciainicio' => '2024-04-30 00:00:00',
            'vigenciafin' => '2025-05-30 00:00:00',
            'estado' => 'Activo'

        ]);

        Contrato::create([

            'vehiculo_id' => '4',
            'vendedor_id' => '2',
            'seguro_id' => 4,
            'costofranquicia' => 150,
            'costoprima' => 850,
            'nro_cuotas' => 12,
            'tipovigencia' => 'Anual',
            'vigenciainicio' => '2024-04-30 00:00:00',
            'vigenciafin' => '2025-05-30 00:00:00'

        ]);
        Contrato::create([

            'vehiculo_id' => '5',
            'vendedor_id' => '1',
            'seguro_id' => 6,
            'costofranquicia' => 200,
            'costoprima' => 950,
            'nro_cuotas' => 1,
            'tipovigencia' => 'Anual',
            'vigenciainicio' => '2024-04-30 00:00:00',
            'vigenciafin' => '2025-05-30 00:00:00'

        ]);
        Contrato::create([

            'vehiculo_id' => '6',
            'vendedor_id' => '2',
            'seguro_id' => 5,
            'costofranquicia' => 450,
            'costoprima' => 1000,
            'nro_cuotas' => 12,
            'tipovigencia' => 'Anual',
            'vigenciainicio' => '2024-04-30 00:00:00',
            'vigenciafin' => '2025-05-30 00:00:00'

        ]);
        Contrato::create([

            'vehiculo_id' => '7',
            'vendedor_id' => '1',
            'seguro_id' => 2,
            'costofranquicia' => 150,
            'costoprima' => 950,
            'nro_cuotas' => 6,
            'tipovigencia' => 'Semestral',
            'vigenciainicio' => '2024-04-30 00:00:00',
            'vigenciafin' => '2024-10-30 00:00:00',
            'estado' => 'Activo'

        ]);
    }
}
