<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Cliente;
use App\Models\Administrador;
use App\Models\Vendedor;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Administrador:
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('00000000'), //8 veces 0
        ])->assignRole('administrador');

        Administrador::create([
            'user_id' => 1
        ]);

        //Cliente:
        User::factory()->create([
            'name' => 'Pedro Carbajal Gomes',
            'email' => 'cliente@example.com',
            'telefono' => '78452052',
            'direccion' => 'Av. Los Cusis / Calle Toborochi / Nro Casa 342',
            'password' => bcrypt('00000000'), //8 veces 0
        ])->assignRole('cliente');

        Cliente::create([
            'user_id' => 2
        ]);

        User::factory()->create([
            'name' => 'Manuel Zarate Guzman',
            'email' => 'ManuSaa@gmail.com',
            'direccion' => 'Av. Radial 10 / Calle Motacu / Nro Casa 231',
            'telefono' => '75028281',
            'password' => bcrypt('00000000'), //8 veces 0
        ])->assignRole('cliente');

        Cliente::create([
            'user_id' => 3
        ]);

        User::factory()->create([
            'name' => 'Ana Martinez Leaños',
            'email' => 'ana@gmail.com',
            'direccion' => 'Av. Grigota / Calle Grigota / Nro Casa 4325',
            'telefono' => '68232052',
            'password' => bcrypt('00000000'), //8 veces 0
        ])->assignRole('cliente');

        Cliente::create([
            'user_id' => 4
        ]);

        User::factory()->create([
            'name' => 'Santiago Fernandez Rodriguez',
            'email' => 'santiago@gmail.com',
            'direccion' => 'Av. Centenario / Calle Charcas / Nro Casa 6534',
            'telefono' => '73987654',
            'password' => bcrypt('00000000'), //8 veces 0
        ])->assignRole('cliente');

        Cliente::create([
            'user_id' => 5
        ]);

        //Vendedor:
        User::factory()->create([
            'name' => 'Juan Torres Perez',
            'email' => 'juan@gmail.com',
            'telefono' => '79542856',
            'password' => bcrypt('00000000'), //8 veces 0
        ])->assignRole('vendedor');

        Vendedor::create([
            'user_id' => 6
        ]);

        User::factory()->create([
            'name' => 'Diego Valencia Vargas',
            'email' => 'diego@gmail.com',
            'telefono' => '68743632',
            'password' => bcrypt('00000000'), //8 veces 0
        ])->assignRole('vendedor');

        Vendedor::create([
            'user_id' => 7
        ]);
    }
}
