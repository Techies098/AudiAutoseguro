<?php

namespace Database\Seeders;

use App\Models\Administrador;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class
        ]);

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('00000000'),//8 veces 0
        ])->assignRole('administrador');

        Administrador::create([
                'user_id' => 1
        ]);
    }
}
