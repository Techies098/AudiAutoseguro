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
        Vehiculo::create([
            'cliente_id' => '3',
            'marca' => 'KIA',
            'modelo' => 'Rio',
            'clase' => 'Auto',
            'color' => 'blanco',
            'placa' => '4876-HJW',
            'chasis' => 'AA01S11S8S0E66168',
            'motor' => '10TT6743899',
            'traccion' => 'Simple',
            'anio' => '2020',
            'uso' => 'Particular',
            'nro_asientos' => '5',
            'combustible' => 'Gasolina',
            'valor_comercial' => 13000
        ]);
        Vehiculo::create([
            'cliente_id' => '4',
            'marca' => 'MITSUBISHI',
            'modelo' => 'Montero',
            'clase' => 'Vagoneta',
            'color' => 'Vino',
            'placa' => '3621-GBA',
            'chasis' => 'AA02S11S8S0E66168',
            'motor' => '11TT6743899',
            'traccion' => 'Doble',
            'anio' => '2019',
            'uso' => 'Particular',
            'nro_asientos' => '7',
            'combustible' => 'Gasolina',
            'valor_comercial' => 18500
        ]);
        Vehiculo::create([
            'cliente_id' => '5',
            'marca' => 'NISSAN',
            'modelo' => 'Murano',
            'clase' => 'Vagoneta',
            'color' => 'Blanco',
            'placa' => '4598-LAW',
            'chasis' => 'AA03S11S8S0E66168',
            'motor' => '12TT6743899',
            'traccion' => 'Simple',
            'anio' => '2018',
            'uso' => 'Particular',
            'nro_asientos' => '5',
            'combustible' => 'Gasolina',
            'valor_comercial' => 15000
        ]);
        Vehiculo::create([
            'cliente_id' => '6',
            'marca' => 'SUBARU',
            'modelo' => 'WRX STI',
            'clase' => 'Auto',
            'color' => 'Azul',
            'placa' => '5199-VSA',
            'chasis' => 'AA04S11S8S0E66168',
            'motor' => '13TT6743899',
            'traccion' => 'Simple',
            'anio' => '2021',
            'uso' => 'Particular',
            'nro_asientos' => '5',
            'combustible' => 'Gasolina',
            'valor_comercial' => 18000
        ]);
        Vehiculo::create([
            'cliente_id' => '7',
            'marca' => 'SUZUKI',
            'modelo' => 'Baleno',
            'clase' => 'Vagoneta',
            'color' => 'Crema',
            'placa' => '5943-BRA',
            'chasis' => 'AA05S11S8S0E66168',
            'motor' => '14TT6743899',
            'traccion' => 'Simple',
            'anio' => '2022',
            'uso' => 'Particular',
            'nro_asientos' => '5',
            'combustible' => 'Gasolina',
            'valor_comercial' => 14000
        ]);
        Vehiculo::create([
            'cliente_id' => '4',
            'marca' => 'SUZUKI',
            'modelo' => 'Jimny',
            'clase' => 'Vagoneta',
            'color' => 'Plomo',
            'placa' => '4912-SEJ',
            'chasis' => 'AA06S11S8S0E66168',
            'motor' => '15TT6743899',
            'traccion' => 'Doble',
            'anio' => '2020',
            'uso' => 'Particular',
            'nro_asientos' => '7',
            'combustible' => 'Gasolina',
            'valor_comercial' => 19000
        ]);
        Vehiculo::create([
            'cliente_id' => '8',
            'marca' => 'TOYOTA',
            'modelo' => 'Hilux',
            'clase' => 'Camioneta',
            'color' => 'Gris',
            'placa' => '4928-JAQ',
            'chasis' => 'AA07S11S8S0E66168',
            'motor' => '16TT6743899',
            'traccion' => 'Doble',
            'anio' => '2021',
            'uso' => 'Particular',
            'nro_asientos' => '5',
            'combustible' => 'Gasolina',
            'valor_comercial' => 19000
        ]);
        /*Vehiculo::create([
            'cliente_id' => '',
            'marca' => '',
            'modelo' => '',
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
        Vehiculo::create([
            'cliente_id' => '',
            'marca' => '',
            'modelo' => '',
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
        Vehiculo::create([
            'cliente_id' => '',
            'marca' => '',
            'modelo' => '',
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
        Vehiculo::create([
            'cliente_id' => '',
            'marca' => '',
            'modelo' => '',
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
        ]);*/
    }
}
