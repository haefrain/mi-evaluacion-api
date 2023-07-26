<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\CorporativeGroup;
use App\Models\Variable;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            CompanySeeder::class,
            InstrumentSeeder::class,
            CorporativeGroupSeeder::class,
            DependencySeeder::class,
            PositionSeeder::class,
            TypeAppointmentSeeder::class,
            GroupSeeder::class,
            VariableSeeder::class,
            SubVariableSeeder::class,
            QuestionSeeder::class,
            UserSeeder::class,
            UserInstrumentSeeder::class,
        ]);
    }
}
