<?php

namespace Database\Seeders;

use App\Models\Seguro;
use Illuminate\Database\Seeder;

class SeguroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Seguro Básico
        $seguroBasico = Seguro::create([
            'nombre' => 'Seguro Básico de Auto',
            'descripcion' => 'Ofrece una cobertura básica para protección de vehículos, incluyendo responsabilidad civil y daños propios, con asistencia en carretera disponible.',
            'precio_prima' => 0.05
        ]);

        $seguroBasico->cobertura()->attach([1, 2, 3]);
        $seguroBasico->clausula()->attach([1, 2, 5, 6, 9, 10]);

        // Seguro Estándar
        $seguroEstandar = Seguro::create([
            'nombre' => 'Seguro Estándar de Vehículo',
            'descripcion' => 'Proporciona una cobertura equilibrada para proteger su vehículo en diversas situaciones, incluyendo robo, responsabilidad civil y daños propios.',
            'precio_prima' => 0.07
        ]);

        $seguroEstandar->cobertura()->attach([1, 2, 3, 4]);
        $seguroEstandar->clausula()->attach([1, 3, 4, 7, 8, 11, 12]);

        // Seguro Premium
        $seguroPremium = Seguro::create([
            'nombre' => 'Seguro Premium de Automóvil',
            'descripcion' => 'Ofrece una protección completa y servicios premium para vehículos de lujo, incluyendo cobertura total de robo, asistencia en carretera y extensión de vigencia a prorrata.',
            'precio_prima' => 0.1
        ]);

        $seguroPremium->cobertura()->attach([1, 2, 3, 4, 5, 6]);
        $seguroPremium->clausula()->attach([1, 4, 5, 7, 8, 9, 10, 11, 12, 13, 14]);

        // Seguro contra Robo
        $seguroRobo = Seguro::create([
            'nombre' => 'Seguro contra Robo de Auto',
            'descripcion' => 'Especialmente diseñado para proteger contra el robo y los intentos de robo de vehículos, con cobertura ampliada de robo y asistencia en caso de siniestro.',
            'precio_prima' => 0.08
        ]);

        $seguroRobo->cobertura()->attach([2, 3, 4]);
        $seguroRobo->clausula()->attach([1, 3, 4, 6, 9, 10]);

        // Seguro de Responsabilidad Civil
        $seguroResponsabilidadCivil = Seguro::create([
            'nombre' => 'Seguro de Responsabilidad Civil Automotriz',
            'descripcion' => 'Cubre los daños causados a terceros por su vehículo en caso de accidentes, con cobertura ampliada de responsabilidad civil y asistencia legal.',
            'precio_prima' => 0.06
        ]);

        $seguroResponsabilidadCivil->cobertura()->attach([3]);
        $seguroResponsabilidadCivil->clausula()->attach([1, 2, 5, 8, 11, 12]);

        // Seguro Todo Riesgo
        $seguroTodoRiesgo = Seguro::create([
            'nombre' => 'Seguro Todo Riesgo para Autos',
            'descripcion' => 'Proporciona una cobertura completa contra todos los riesgos, incluyendo daños propios, robo y accidentes, con servicios de asistencia en carretera y libre elección de ajustadores.',
            'precio_prima' => 0.12
        ]);

        $seguroTodoRiesgo->cobertura()->attach([1, 2, 3, 4, 5, 6]);
        $seguroTodoRiesgo->clausula()->attach([1, 3, 5, 6, 7, 8, 9, 11, 12, 13, 14]);
    }
}
