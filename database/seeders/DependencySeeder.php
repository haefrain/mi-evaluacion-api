<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Dependency;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DependencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $company = Company::first();
        $dependencies = [
            'OFICINA ASESORA JURÍDICA',
            'SECRETARIA GENERAL',
            'SUBDIRECCION DE TRANSFORMACION DIGITAL E INNOVACION ARCHIVISTICA',
            'SUBDIRECCION DEL SISTEMA NACIONAL DE ARCHIVOS',
            'OFICINA ASESORA DE PLANEACIÓN',
            'SUBDIRECCION DE GESTION DEL PATRIMONIO',
            'OFICINA DE CONTROL INTERNO',
            'SUBDIRECCION DE INSPECCION VIGILANCIA Y CONTROL',
            'SUBDIRECCIÓN DE POLÍTICA Y NORMATIVA  ARCHIVISTICA',
            'DIRECCION GENERAL',
            'SUBDIRECCION DE MERCADEO Y OPERACION DE SERVICIOS ARCHIVISTICOS',
            'SUBDIRECCION DE ARCHIVOS DE ENTIDADES LIQUIDADAS',
        ];

        foreach ($dependencies as $dependency) {
            Dependency::create([
                'company_id' => $company->id,
                'name' => $dependency,
            ]);
        }
    }
}
