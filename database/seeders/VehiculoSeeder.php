<?php

namespace Database\Seeders;

use App\Models\Vehiculo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VehiculoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Vehiculo::create([
            'cliente_id' => '1',
            'placa' => '876-HAD',
            'clase' => 'vagoneta',
            'marca' => 'toyota',
            'modelo' => 'runner',
            'anio' => '1996',
            'color' => 'verde',
            'nro_asientos' => '5'
        ]);
        Vehiculo::create([
            'cliente_id' => '2',
            'placa' => '1867-SHN',
            'clase' => 'vagoneta',
            'marca' => 'nissan',
            'modelo' => 'pathfinder',
            'anio' => '2005',
            'color' => 'guindo',
            'nro_asientos' => '5'
        ]);
        Vehiculo::create([
            'cliente_id' => '2',
            'placa' => '3876-FAK',
            'clase' => 'vagoneta',
            'marca' => 'toyota',
            'modelo' => 'Rush',
            'anio' => '2020',
            'color' => 'Vino',
            'nro_asientos' => '7'
        ]);
    }
}
