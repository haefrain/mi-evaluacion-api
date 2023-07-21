<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\TypeAppointment;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TypeAppointment>
 */
class TypeAppointmentFactory extends Factory
{
    protected $model = TypeAppointment::class;
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
