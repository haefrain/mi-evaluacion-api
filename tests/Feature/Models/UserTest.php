<?php

namespace Tests\Feature\Models;

use Tests\TestCase;
use App\Models\Role;
use App\Models\User;

class UserTest extends TestCase
{
    const URL = '/api/users';

    public function testIndex(): void
    {
        $this->createAndAutenticateUser();
        $users = User::factory()->count(3)->create();
        $response = $this->get(self::URL);
        $content = $this->getContentResponse($response);
        $response->assertStatus(200);
        $this->assertEquals(count($users), count($content->data));
    }

    public function testStore(): void
    {
        $this->createAndAutenticateUser();
        $name = 'test';
        $response = $this->post(self::URL, [
            'name' => $name,
        ]);
        $content = $this->getContentResponse($response);

        $response->assertStatus(201);
        $this->assertEquals($name, $content->data->name);
    }

    public function testShow(): void
    {
        $this->createAndAutenticateUser();
        $role = User::factory()->create();
        $response = $this->get(self::URL . '/' . $role->id);

        $response->assertStatus(200);
        $this->assertEquals($role->name, $this->getContentResponse($response)->data->name);
    }

    public function testUpdate(): void
    {
        $this->createAndAutenticateUser();
        $name = 'edited';
        $role = User::factory()->create();
        $response = $this->postJson(self::URL . '/' . $role->id, [
            'name' => $name,
            '_method' => 'PUT'
        ]);
        $response->assertStatus(200);
        $this->assertNotEquals($role->name, $this->getContentResponse($response)->data->name);
        $this->assertEquals($name, $this->getContentResponse($response)->data->name);

    }

    public function testDestroy(): void
    {
        $this->createAndAutenticateUser();
        $role = User::factory()->create();
        $response = $this->postJson(self::URL . '/' . $role->id, [
            '_method' => 'DELETE'
        ]);
        $response->assertStatus(204);
    }

    public function testIndexNotAutenticated(): void
    {
        $response = $this->get(self::URL);
        $response->assertStatus(403);
    }

    public function testStoreNotAutenticated(): void
    {
        $name = 'test';
        $response = $this->post(self::URL, [
            'name' => $name,
        ]);
        $response->assertStatus(403);
    }

    public function testShowNotAutenticated(): void
    {
        $role = User::factory()->create();
        $response = $this->get(self::URL . '/' . $role->id);
        $response->assertStatus(403);
    }

    public function testUpdateNotAutenticated(): void
    {
        $role = User::factory()->create();
        $name = 'edited';
        $response = $this->postJson(self::URL . '/' . $role->id, [
            'name' => $name,
            '_method' => 'PUT'
        ]);
        $response->assertStatus(403);
    }

    public function testDestroyNotAutenticated(): void
    {
        $role = Role::factory()->create();
        $response = $this->postJson(self::URL . '/' . $role->id, [
            '_method' => 'DELETE'
        ]);
        $response->assertStatus(403);
    }

    private function getContentResponse($response)
    {
        return json_decode($response->getContent());
    }

    private function createAndAutenticateUser() {
        $user = User::factory()->create();
        $this->actingAs($user);
    }
}
