<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\CorporativeGroup;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CorporativeGroup>
 */
class CorporativeGroupFactory extends Factory
{
    protected $model = CorporativeGroup::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'company_id' => Company::factory()->create()->id,
            'name' => fake()->name(),
        ];
    }
}
