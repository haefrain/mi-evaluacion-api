<?php

namespace Tests\Feature\Models;

use App\Models\CorporativeGroup;
use App\Models\Dependency;
use App\Models\Person;
use App\Models\Position;
use App\Models\TypeAppointment;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PersonTest extends TestCase
{
    use WithFaker;
    const URL = '/api/people';

    public function testIndex(): void
    {
        $this->createAndAutenticateUser();
        $people = Person::factory()->count(3)->create();
        $response = $this->get(self::URL);
        $content = $this->getContentResponse($response);
        $response->assertStatus(200);
        $this->assertEquals(count($people), count($content->data));
    }

    public function testStore(): void
    {
        $this->createAndAutenticateUser();
        $response = $this->post(self::URL, [
            'user_id' => User::factory()->create()->id,
            'position_id' => Position::factory()->create()->id,
            'dependency_id' => Dependency::factory()->create()->id,
            'corporative_group_id' => CorporativeGroup::factory()->create()->id,
            'type_appointment_id' => TypeAppointment::factory()->create()->id,
            'first_name' => $this->faker->name(),
            'last_name' => $this->faker->name(),
            'gender' => $this->faker->randomElement(['male', 'female']),
            'with_people_charge' => $this->faker->boolean(),
            'age' => fake()->randomElement(array_keys(Person::AGE)),
            'seniority' => fake()->randomElement(array_keys(Person::SENIORITY)),
            'education_level' => fake()->randomElement(array_keys(Person::EDUCATION_LEVEL)),
        ]);
        $content = $this->getContentResponse($response);
        $response->assertStatus(201);
    }

    public function testShow(): void
    {
        $this->createAndAutenticateUser();
        $person = Person::factory()->create();
        $response = $this->get(self::URL . '/' . $person->id);
        $response->assertStatus(200);
    }

    public function testUpdate(): void
    {
        $this->createAndAutenticateUser();
        $person = Person::factory()->create();
        $response = $this->postJson(self::URL . '/' . $person->id, [
            'user_id' => User::factory()->create()->id,
            'position_id' => Position::factory()->create()->id,
            'dependency_id' => Dependency::factory()->create()->id,
            'corporative_group_id' => CorporativeGroup::factory()->create()->id,
            'type_appointment_id' => TypeAppointment::factory()->create()->id,
            'first_name' => $this->faker->name(),
            'last_name' => $this->faker->name(),
            'gender' => $this->faker->randomElement(['male', 'female']),
            'with_people_charge' => $this->faker->boolean(),
            'age' => fake()->randomElement(array_keys(Person::AGE)),
            'seniority' => fake()->randomElement(array_keys(Person::SENIORITY)),
            'education_level' => fake()->randomElement(array_keys(Person::EDUCATION_LEVEL)),
            '_method' => 'PUT'
        ]);
        $response->assertStatus(200);
    }

    public function testDestroy(): void
    {
        $this->createAndAutenticateUser();
        $person = Person::factory()->create();
        $response = $this->postJson(self::URL . '/' . $person->id, [
            '_method' => 'DELETE'
        ]);
        $response->assertStatus(204);
    }
}
