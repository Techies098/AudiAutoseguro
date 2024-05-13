<?php

namespace Database\Seeders;

use App\Models\Seguro;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SeguroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $seguroT = Seguro::create([
            'nombre' => 'Total',
            'descripcion' => 'Seguro que cubre, el robo al vehículo, daños al vehículo,  daños de la naturaleza y daños a terceros.',
            'precio_prima' => 0.02
        ]);

        $seguroT->cobertura()->attach([1, 2, 3, 4, 5, 6]);
        $seguroT->clausula()->attach([1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14]);

        $seguroR = Seguro::create([
            'nombre' => 'Robo',
            'descripcion' => 'Seguro que cubre robos al vehículo',
            'precio_prima' => 0.02
        ]);

        $seguroR->cobertura()->attach([2]);
        $seguroR->clausula()->attach([4, 10, 14]);

        $seguroD = Seguro::create([
            'nombre' => 'Daños a Terceros',
            'descripcion' => 'Seguro  que cubre los daños ocasionados por el vehículo a terceros.',
            'precio_prima' => 0.01
        ]);

        $seguroD->cobertura()->attach([5, 6]);
        $seguroD->clausula()->attach([1, 5, 9, 13]);
    }
}
