<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Siniestro;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SiniestroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Siniestro::create([
            'ubicacion' => 'Calle Entre Rios, Tercer anillo interno',
            'estado' => 'Espera',
            'created_at' => Carbon::now()->subDays(7),
            'tipo_de_siniestro_id' => 2,
            'contrato_id' => 1001,
        ]);
        Siniestro::create([
            'ubicacion' => 'Plaza 24 de sept',
            'estado' => 'revisado',
            'created_at' => Carbon::now()->subDays(6),
            'tipo_de_siniestro_id' => 4,
            'contrato_id' => 1002,
            'detalle' => 'Incendio espontaneo, sin causas humanas aparentes',
            'estado_ebriedad' => 'No',
        ]);
        Siniestro::create([
            'ubicacion' => '2do anillo, av busch',
            'estado' => 'aprobado',
            'created_at' => Carbon::now()->subDays(6),
            'tipo_de_siniestro_id' => 2,
            'contrato_id' => 1003,
            'detalle' => 'Choque a baja velocidad, semaforo rojo',
            'estado_ebriedad' => 'No',
        ]);
        Siniestro::create([
            'ubicacion' => 'cotoca',
            'estado' => 'Espera',
            'created_at' => Carbon::now()->subDays(1),
            'tipo_de_siniestro_id' => 2,
            'contrato_id' => 1001,
        ]);
        Siniestro::create([
            'ubicacion' => 'urubo',
            'estado' => 'revisado',
            'created_at' => Carbon::now()->subDays(1),
            'tipo_de_siniestro_id' => 4,
            'contrato_id' => 1002,
            'detalle' => 'Incendio espontaneo, sin causas humanas aparentes',
            'estado_ebriedad' => 'No',
        ]);
        Siniestro::create([
            'ubicacion' => 'paurito',
            'estado' => 'aprobado',
            'created_at' => Carbon::now()->subDays(1),
            'tipo_de_siniestro_id' => 2,
            'contrato_id' => 1003,
            'detalle' => 'Choque a baja velocidad, semaforo rojo',
            'estado_ebriedad' => 'No',
        ]);
    }
}
