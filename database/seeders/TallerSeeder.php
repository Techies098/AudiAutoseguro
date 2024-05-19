<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Taller;
use Illuminate\Database\Seeder;

class TallerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Taller::create([
            'nombre' => 'RAU MOTORS',
            'direccion' => '4TO. ANILLO RADIAL 10, FRENTE AL SURTIDOR SAN LUIS',
            'telefono' => '354-4242'
        ]);
        Taller::create([
            'nombre' => 'LEAÑOS MOTORS',
            'direccion' => 'AV CANAL COTOCA ESQ 3ER ANILLO EXTERNO',
            'telefono' => '3474887'
        ]);
        Taller::create([
            'nombre' => 'SUAREZ MOTORS',
            'direccion' => 'CANAL COTOCA CASI 4TO. ANILLO',
            'telefono' => '349-1800'
        ]);
        Taller::create([
            'nombre' => 'AUTOCROM',
            'direccion' => 'PARQUE INDUSTRIAL - FRENTE A LA UPSA',
            'telefono' => '70933555'
        ]);
        Taller::create([
            'nombre' => 'CAR CENTER',
            'direccion' => 'AV PARAGUA PASANDO 50MTRS DEL 3ER ANILLO EXTERNO HACIA EL 4TO ANILLO',
            'telefono' => '343-0544'
        ]);
        Taller::create([
            'nombre' => 'SURVAC',
            'direccion' => 'AV. FRANCISCO MORA FRENTE SUB ALCALDIA DEL 3ER ANILLO EXT RADIAL 10',
            'telefono' => '79897777'
        ]);
        Taller::create([
            'nombre' => 'ZONA CAR',
            'direccion' => 'AV. LA BARRANCA # 51',
            'telefono' => '320- 0415 / 615-55155'
        ]);
        Taller::create([
            'nombre' => 'MECANICORP',
            'direccion' => 'B/ ENDE C/ 3 (RADIAL 27 ENTRE 3° Y 4° ANILLO)',
            'telefono' => '340-6320 / 331-9800'
        ]);
        Taller::create([
            'nombre' => 'AUTOMOTORES CERO',
            'direccion' => 'AV. SANTOS DUMONT C/ AUGUSTO ZAMBRANA # 3016 (ENTRE 3° Y 4° ANILLO)',
            'telefono' => '350-9272'
        ]);
        Taller::create([
            'nombre' => 'SALBAR AUTOMOTORES',
            'direccion' => 'AV. RADIAL 10 # 4040 (ENTRE 4TO Y 5TO ANILLO)',
            'telefono' => '3565910'
        ]);
    }
}
