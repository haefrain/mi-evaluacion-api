<?php

namespace Tests\Feature\Models;

use Illuminate\Foundation\Testing\WithFaker;
use Str;
use Tests\TestCase;
use App\Models\Role;
use App\Models\User;

class UserTest extends TestCase
{
    use WithFaker;
    const URL = '/api/users';

    public function testIndex(): void
    {
        $this->createAndAutenticateUser();
        $users = User::factory()->count(3)->create();
        $response = $this->get(self::URL);
        $content = $this->getContentResponse($response);
        $response->assertStatus(200);
        $this->assertSameSize($users, $content->data);
    }

    public function testStore(): void
    {
        $documentNumber = $this->faker->randomNumber();
        $user = [
            'name' => $this->faker->name(),
            'role_id' => 3,
            'email' => $this->faker->unique()->safeEmail(),
            'type_document' => $this->faker->randomElement(['CC', 'TI']),
            'document_number' => $documentNumber,
            'email_verified_at' => now(),
            'password' => bcrypt($documentNumber), // password
            'remember_token' => Str::random(10),
        ];

        $this->createAndAutenticateUser();
        $response = $this->post(self::URL, $user);
        $content = $this->getContentResponse($response);

        $response->assertStatus(201);
        $this->assertEquals($user, $content->data);
    }

    public function testShow(): void
    {
        $this->createAndAutenticateUser();
        $user = User::factory()->create();
        $response = $this->get(self::URL . '/' . $user->id);

        $response->assertStatus(200);
        $this->assertEquals($user->document_number, $this->getContentResponse($response)->data->document_number);
    }

    public function testUpdate(): void
    {
        $this->createAndAutenticateUser();
        $documentNumber = $this->faker->randomNumber();
        $updatedUser = [
            'name' => $this->faker->name(),
            'role_id' => 3,
            'email' => $this->faker->unique()->safeEmail(),
            'type_document' => $this->faker->randomElement(['CC', 'TI']),
            'document_number' => $documentNumber,
            'email_verified_at' => now(),
            'password' => bcrypt($documentNumber), // password
            'remember_token' => Str::random(10),
            '_method' => 'PUT'
        ];
        $user = User::factory()->create();
        $response = $this->postJson(self::URL . '/' . $user->id, $updatedUser);
        $response->assertStatus(200);
        $this->assertEquals($updatedUser['name'], $this->getContentResponse($response)->data->name);
    }

    public function testDestroy(): void
    {
        $this->createAndAutenticateUser();
        $user = User::factory()->create();
        $response = $this->postJson(self::URL . '/' . $user->id, [
            '_method' => 'DELETE'
        ]);
        $response->assertStatus(204);
    }

    private function getContentResponse($response)
    {
        return json_decode($response->getContent());
    }

    private function createAndAutenticateUser() {
        $user = User::factory()->create(['role_id' => 1]);
        $this->actingAs($user);
    }
}
