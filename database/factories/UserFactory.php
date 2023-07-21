<?php

namespace Database\Factories;

use App\Models\Person;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $documentNumber = fake()->randomNumber();
        return [
            'name' => fake()->name(),
            'role_id' => 3,
            'email' => fake()->unique()->safeEmail(),
            'type_document' => fake()->randomElement(['CC', 'TI']),
            'document_number' => $documentNumber,
            'email_verified_at' => now(),
            'password' => bcrypt($documentNumber), // password
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
