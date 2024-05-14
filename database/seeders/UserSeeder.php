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
            'name' => 'User cliente',
            'email' => 'cliente@example.com',
            'telefono' => '78452052',
            'password' => bcrypt('00000000'), //8 veces 0
        ])->assignRole('cliente');

        Cliente::create([
            'user_id' => 2
        ]);

        User::factory()->create([
            'name' => 'Manuel',
            'email' => 'ManuSaa@gmail.com',
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

        //Vendedor:
        User::factory()->create([
            'name' => 'Juan',
            'email' => 'juan@gmail.com',
            'telefono' => '79542856',
            'password' => bcrypt('00000000'), //8 veces 0
        ])->assignRole('vendedor');

        Vendedor::create([
            'user_id' => 6
        ]);

        User::factory()->create([
            'name' => 'Diego',
            'email' => 'diego@gmail.com',
            'telefono' => '68743632',
            'password' => bcrypt('00000000'), //8 veces 0
        ])->assignRole('vendedor');

        Vendedor::create([
            'user_id' => 7
        ]);

        User::factory()->create([
            'name' => 'Vendedor Test',
            'email' => 'vendedor@example.com',
            'telefono' => '79542856',
            'password' => bcrypt('00000000'), //8 veces 0
        ])->assignRole('vendedor');

        Vendedor::create([
            'user_id' => 8
        ]);

    }
}
