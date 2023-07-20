<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::factory()->create([
            'name' => 'SuperAdmin',
        ]);
        Role::factory()->create([
            'name' => 'Admin',
        ]);
        Role::factory()->create([
            'name' => 'User',
        ]);
    }
}
