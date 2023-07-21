<?php

namespace Tests\Feature;

use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Str;
use Tests\TestCase;

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
        $response->assertStatus(Response::HTTP_OK);
        $this->assertCount(4, $content->data);
    }

    public function testStore(): void
    {
        $role = Role::factory()->create();
        $documentNumber = $this->faker->randomNumber();
        $user = [
            'name' => $this->faker->name(),
            'role_id' => $role->id,
            'email' => $this->faker->unique()->safeEmail(),
            'type_document' => $this->faker->randomElement(['CC', 'TI']),
            'document_number' => $documentNumber,
            'email_verified_at' => now(),
            'password' => bcrypt($documentNumber), // password
            'remember_token' => Str::random(10),
        ];

        $this->createAndAutenticateUser();
        $response = $this->post(self::URL, $user);

        $response->assertStatus(201);
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
        $role = Role::factory()->create();
        $this->createAndAutenticateUser();
        $documentNumber = $this->faker->randomNumber();
        $updatedUser = [
            'name' => $this->faker->name(),
            'role_id' => $role->id,
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
}
