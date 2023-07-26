<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\CorporativeGroup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CorporativeGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $company = Company::first();
        $corporativeGroups = [
            ['name' => 'SIN GRUPO', 'company_id' => $company->id],
            ['name' => 'GRUPO DE ARCHIVO Y GESTION DOCUMENTAL', 'company_id' => $company->id],
            ['name' => 'GRUPO DE SERVICIOS ADMINISTRATIVOS', 'company_id' => $company->id],
            ['name' => 'GRUPO DE TECNOLOGIAS DE LA INFORMACION', 'company_id' => $company->id],
            ['name' => 'GRUPO DE GESTION FINANCIERA', 'company_id' => $company->id],
            ['name' => 'GRUPO DE ATENCION Y SERVICIO AL CIUDADANO', 'company_id' => $company->id],
            ['name' => 'GRUPO DE TALENTO HUMANO', 'company_id' => $company->id],
            ['name' => 'GRUPO DE CONSERVACION Y RESTAURACION', 'company_id' => $company->id],
            ['name' => 'GRUPO DE ORGANIZACION Y REPROGRAFIA', 'company_id' => $company->id],
            ['name' => 'GRUPO DE INVESTIGACION Y DIFUSION', 'company_id' => $company->id],
        ];

        \DB::table('corporative_groups')->insert($corporativeGroups);
    }
}
