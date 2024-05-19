<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Administrador;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            VehiculoSeeder::class,
            ClausulaSeeder::class,
            CoberturaSeeder::class,
            SeguroSeeder::class,
            ContratoSeeder::class,
            SiniestroSeeder::class,
            TallerSeeder::class,
        ]);
    }
}
