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
            'marca' => 'Toyota',
            'modelo' => 'runner',
            'clase' => 'Vagoneta',
            'color' => 'verde',
            'placa' => '876-HAD',
            'chasis' => 'MA3FB32S8P0L11168',
            'motor' => 'F8DN6748409',
            'traccion' => 'Doble',
            'anio' => '1996',
            'uso' => 'Particular',
            'nro_asientos' => '5',
            'combustible' => 'Gasolina',
            'valor_comercial' => 12000
        ]);
        Vehiculo::create([
            'cliente_id' => '2',
            'marca' => 'Nissan',
            'modelo' => 'Pathfinder',
            'clase' => 'Vagoneta',
            'color' => 'guindo',
            'placa' => '1867-SHN',
            'chasis' => 'MA3FB11S8S0L11168',
            'motor' => 'F8DD6743309',
            'traccion' => 'Doble',
            'anio' => '2005',
            'uso' => 'Particular',
            'nro_asientos' => '5',
            'combustible' => 'Gasolina',
            'valor_comercial' => 13000
        ]);
        Vehiculo::create([
            'cliente_id' => '2',
            'marca' => 'Toyota',
            'modelo' => 'Rush',
            'clase' => 'Vagoneta',
            'color' => 'Vino',
            'placa' => '3876-FAK',
            'chasis' => 'HA3DS11S8S0E66168',
            'motor' => 'R8FF6743899',
            'traccion' => 'Doble',
            'anio' => '2020',
            'uso' => 'Particular',
            'nro_asientos' => '7',
            'combustible' => 'Gasolina',
            'valor_comercial' => 18000
        ]);
    }
}
