<?php

namespace Database\Factories;

use App\Models\Answer;
use App\Models\Option;
use App\Models\Question;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Answer>
 */
class AnswerFactory extends Factory
{
    protected $model = Answer::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $questionId = Question::factory()->create()->id;
        return [
            'question_id' => $questionId,
            'user_id' => User::factory()->create()->id,
            'option_id' => Option::factory()->create(['question_id' => $questionId])->id,
        ];
    }
}
