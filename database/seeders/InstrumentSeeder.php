<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Instrument;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InstrumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $company = Company::first();
        $instrument = [
            'company_id' => $company->id,
            'title' => 'Evaluación de Clima, Cultura y Cambio',
            'description' => ''
        ];

        Instrument::create($instrument);
    }
}
