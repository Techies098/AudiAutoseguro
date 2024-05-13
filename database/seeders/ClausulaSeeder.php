<?php

namespace Database\Seeders;

use App\Models\Clausula;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClausulaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Clausula::create([
            'detalle' => 'Cláusula de Responsabilidad Civil por Perjuicios Económicos a Terceros, hasta USD 2.500.'
        ]);
        Clausula::create([
            'detalle' => 'Cláusula de cobertura adicional de Extraterritorialidad.'
        ]);
        Clausula::create([
            'detalle' => 'Cláusula del beneficio de Auxilio Mecánico Express (dentro del radio urbano de las ciudades de La Paz,  Cochabamba, Santa Cruz, Sucre y Tarija).'
        ]);
        Clausula::create([
            'detalle' => 'Cláusula de beneficio de Conductor Profesional (Bs. 70 por uso, para las ciudades de La Paz, Santa Cruz y Cochabamba).'
        ]);
        Clausula::create([
            'detalle' => 'Cláusula de beneficio por Bono de Transporte, hasta USD 80.'
        ]);
        Clausula::create([
            'detalle' => 'Cláusula de libre elegibilidad de ajustadores.'
        ]);
        Clausula::create([
            'detalle' => 'Cláusula de cobertura por incendio y/o rayo y/o explosión (al 100%)'
        ]);
        Clausula::create([
            'detalle' => 'Cláusula de cobertura por riesgos de la naturaleza (con franquicia de cobertura de daños propios).'
        ]);
        Clausula::create([
            'detalle' => 'Cláusula de pago parcial en caso de siniestro (anticipo del 50%).'
        ]);
        Clausula::create([
            'detalle' => 'Cláusula de extensión del beneficio adicional de vigencia a prorrata hasta 90 días'
        ]);
        Clausula::create([
            'detalle' => 'Cláusula Arbitral'
        ]);
        Clausula::create([
            'detalle' => 'Cláusula de eliminación de la denuncia a tránsito hasta USD. 1,000.'
        ]);
        Clausula::create([
            'detalle' => 'Cláusula de aviso de siniestro a 15 días'
        ]);
        Clausula::create([
            'detalle' => 'Cláusula de alcoholemia permitida hasta 0,5 gr/lt de sangre'
        ]);
    }
}
