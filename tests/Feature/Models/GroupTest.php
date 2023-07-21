<?php

namespace Tests\Feature\Models;

use App\Models\Group;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GroupTest extends TestCase
{
    const URL = '/api/groups';

    public function testIndex(): void
    {
        $this->createAndAutenticateUser();
        $groups = Group::factory()->count(3)->create();
        $response = $this->get(self::URL);
        $content = $this->getContentResponse($response);
        $response->assertStatus(200);
        $this->assertEquals(count($groups), count($content->data));
    }

    public function testStore(): void
    {
        $this->createAndAutenticateUser();
        $response = $this->post(self::URL, [
           'name' => 'Group'
        ]);
        $content = $this->getContentResponse($response);
        $response->assertStatus(201);
    }

    public function testShow(): void
    {
        $this->createAndAutenticateUser();
        $group = Group::factory()->create();
        $response = $this->get(self::URL . '/' . $group->id);
        $response->assertStatus(200);
    }

    public function testUpdate(): void
    {
        $this->createAndAutenticateUser();
        $group = Group::factory()->create();
        $response = $this->postJson(self::URL . '/' . $group->id, [
            'name' => 'Group Edited',
            '_method' => 'PUT'
        ]);
        $response->assertStatus(200);
    }

    public function testDestroy(): void
    {
        $this->createAndAutenticateUser();
        $group = Group::factory()->create();
        $response = $this->postJson(self::URL . '/' . $group->id, [
            '_method' => 'DELETE'
        ]);
        $response->assertStatus(204);
    }
}
