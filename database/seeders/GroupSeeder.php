<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Group;
use App\Models\Instrument;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $instrument = Instrument::first();
        $groups = [
            'Cambio',
            'Cultura',
            'Clima',
        ];

        foreach ($groups as $group) {
            Group::create([
                'instrument_id' => $instrument->id,
                'name' => $group,
            ]);
        }
    }
}
