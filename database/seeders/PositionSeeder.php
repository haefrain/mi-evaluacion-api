<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Position;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $company = Company::first();
        $positions = [
            'PROFESIONAL UNIVERSITARIO',
            'AUXILIAR ADMINISTRATIVO',
            'PROFESIONAL ESPECIALIZADO',
            'SUBDIRECTOR GENERAL DE ENTIDAD DESCENTRA',
            'TÉCNICO OPERATIVO',
            'SECRETARIO EJECUTIVO',
            'TÉCNICO ADMINISTRATIVO',
            'TÉCNICO',
            'AUXILIAR DE SERVICIOS GENERALES',
            'RESTAURADOR',
            'ASESOR',
            'JEFE OFICINA ASESORA',
            'CONDUCTOR MECÁNICO',
            'JEFE DE OFICINA',
            'SECRETARIO GENERAL ENTIDAD DESCENTRALIZA',
            'DIRECTOR GENERAL',
        ];

        foreach ($positions as $position) {
            Position::create([
                'company_id' => $company->id,
                'title' => $position,
            ]);
        }

    }
}
