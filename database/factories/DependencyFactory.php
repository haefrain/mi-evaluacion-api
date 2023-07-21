<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\Dependency;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dependency>
 */
class DependencyFactory extends Factory
{
    protected $model = Dependency::class;
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
