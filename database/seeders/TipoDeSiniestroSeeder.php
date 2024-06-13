<?php

namespace Database\Seeders;

use App\Models\TipoDeSiniestro;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TipoDeSiniestroSeeder extends Seeder
{
    public function run(): void
    {
        TipoDeSiniestro::create(['name' => 'Robo']);
        TipoDeSiniestro::create(['name' => 'Accidente de Tránsito']);
        TipoDeSiniestro::create(['name' => 'Vandalismo']);
        TipoDeSiniestro::create(['name' => 'Factores Naturales']);
        TipoDeSiniestro::create(['name' => 'Daño por Falla Mecánica']);
    }
}
