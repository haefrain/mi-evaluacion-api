<?php

namespace Database\Factories;

use App\Models\CorporativeGroup;
use App\Models\Dependency;
use App\Models\Person;
use App\Models\Position;
use App\Models\TypeAppointment;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Person>
 */
class PersonFactory extends Factory
{
    protected $model = Person::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory()->create()->id,
            'position_id' => Position::factory()->create()->id,
            'dependency_id' => Dependency::factory()->create()->id,
            'corporative_group_id' => CorporativeGroup::factory()->create()->id,
            'type_appointment_id' => TypeAppointment::factory()->create()->id,
            'first_name' => fake()->name(),
            'last_name' => fake()->name(),
            'gender' => fake()->randomElement(['male', 'female']),
            'with_people_charge' => fake()->boolean(),
        ];
    }
}
