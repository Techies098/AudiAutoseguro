<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Cliente;
use App\Models\Administrador;
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
            'password' => bcrypt('00000000'),//8 veces 0
        ])->assignRole('administrador');

        Administrador::create([
                'user_id' => 1
        ]);

        //Cliente:
        User::factory()->create([
            'name' => 'User cliente',
            'email' => 'cliente@example.com',
            'telefono' => '78452052',
            'password' => bcrypt('00000000'),//8 veces 0
        ])->assignRole('cliente');

        Cliente::create([
                'user_id' => 2
        ]);

        User::factory()->create([
            'name' => 'Manuel',
            'email' => 'ManuSaa@gmail.com',
            'telefono' => '75028281',
            'password' => bcrypt('00000000'),//8 veces 0
        ])->assignRole('cliente');

        Cliente::create([
                'user_id' => 3
        ]);
    }
}
