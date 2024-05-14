<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Cliente;
use App\Models\Administrador;
use App\Models\Perito;
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
            'name' => 'cliente Rodri',
            'email' => 'cliente@example.com',
            'telefono' => '78452052',
            'password' => bcrypt('00000000'), //8 veces 0
        ])->assignRole('cliente');

        Cliente::create([
            'user_id' => 2
        ]);

        User::factory()->create([
            'name' => 'Manuel',
            'email' => 'Manu@gmail.com',
            'telefono' => '75028281',
            'password' => bcrypt('00000000'), //8 veces 0
        ])->assignRole('cliente');

        Cliente::create([
            'user_id' => 3
        ]);

        User::factory()->create([
            'name' => 'Ana',
            'email' => 'ana@gmail.com',
            'telefono' => '68232052',
            'password' => bcrypt('00000000'), //8 veces 0
        ])->assignRole('cliente');

        Cliente::create([
            'user_id' => 4
        ]);

        User::factory()->create([
            'name' => 'Santiago',
            'email' => 'santiago@gmail.com',
            'telefono' => '73987654',
            'password' => bcrypt('00000000'), //8 veces 0
        ])->assignRole('cliente');

        Cliente::create([
            'user_id' => 5
        ]);

        User::factory()->create([
            'name' => 'vendedor juan',
            'email' => 'vendedor@example.com',
            'telefono' => '79542856',
            'password' => bcrypt('00000000'), //8 veces 0
        ])->assignRole('vendedor');

        Vendedor::create([
            'user_id' => 6
        ]);

        User::factory()->create([
            'name' => 'perito Jose',
            'email' => 'perito@example.com',
            'telefono' => '68743632',
            'password' => bcrypt('00000000'), //8 veces 0
        ])->assignRole('perito');

        Perito::create([
            'user_id' => 7
        ]);

        User::factory()->create([
            'name' => 'vendedor nick',
            'email' => 'nick@example.com',
            'telefono' => '68743632',
            'password' => bcrypt('00000000'), //8 veces 0
        ])->assignRole('vendedor');

        Vendedor::create([
            'user_id' => 7
        ]);
    }
}
