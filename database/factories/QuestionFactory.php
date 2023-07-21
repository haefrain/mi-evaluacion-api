<?php

namespace Database\Factories;

use App\Models\Question;
use App\Models\SubVariable;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Question>
 */
class QuestionFactory extends Factory
{
    protected $model = Question::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $subVariable = SubVariable::factory()->create();
        return [
            'sub_variable_id' => $subVariable->id,
            'title' => fake()->sentence(),
            'description' => fake()->paragraph(),
        ];
    }
}
