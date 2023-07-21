<?php

namespace Database\Factories;

use App\Models\Group;
use App\Models\Variable;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Variable>
 */
class VariableFactory extends Factory
{
    protected $model = Variable::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $group = Group::factory()->create();
        return [
            'group_id' => $group->id,
            'name' => fake()->name(),
        ];
    }
}
