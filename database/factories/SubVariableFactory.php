<?php

namespace Database\Factories;

use App\Models\SubVariable;
use App\Models\Variable;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SubVariable>
 */
class SubVariableFactory extends Factory
{
    protected $model = SubVariable::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $variable = Variable::factory()->create();
        return [
            'variable_id' => $variable->id,
            'name' => fake()->name(),
        ];
    }
}
