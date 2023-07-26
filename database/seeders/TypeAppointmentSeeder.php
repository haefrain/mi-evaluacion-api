<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\TypeAppointment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeAppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $company = Company::first();
        $types = [
            'Periódo de Prueba',
            'Provisionalidad',
            'Libre nombramiento y encargo',
            'Libre nombramiento',
            'Carrera administrativa',
        ];

        foreach ($types as $type) {
            TypeAppointment::create([
                'company_id' => $company->id,
                'name' => $type,
            ]);
        }
    }
}
