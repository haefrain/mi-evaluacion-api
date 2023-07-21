<?php

namespace Tests\Feature;

use App\Models\Group;
use App\Models\Variable;
use Tests\TestCase;

class VariableTest extends TestCase
{
    const URL = '/api/variables';

    public function testIndex(): void
    {
        $this->createAndAutenticateUser();
        $variables = Variable::factory()->count(3)->create();
        $response = $this->get(self::URL);
        $content = $this->getContentResponse($response);
        $response->assertStatus(200);
        $this->assertEquals(count($variables), count($content->data));
    }

    public function testStore(): void
    {
        $this->createAndAutenticateUser();
        $group = Group::factory()->create();
        $response = $this->post(self::URL, [
            'group_id' => $group->id,
            'name' => 'Variable',
        ]);
        $content = $this->getContentResponse($response);
        $response->assertStatus(201);
    }

    public function testShow(): void
    {
        $this->createAndAutenticateUser();
        $variable = Variable::factory()->create();
        $response = $this->get(self::URL . '/' . $variable->id);
        $response->assertStatus(200);
    }

    public function testUpdate(): void
    {
        $this->createAndAutenticateUser();
        $variable = Variable::factory()->create();
        $response = $this->postJson(self::URL . '/' . $variable->id, [
            'name' => 'Variable Edited',
            '_method' => 'PUT'
        ]);
        $response->assertStatus(200);
    }

    public function testDestroy(): void
    {
        $this->createAndAutenticateUser();
        $variable = Variable::factory()->create();
        $response = $this->postJson(self::URL . '/' . $variable->id, [
            '_method' => 'DELETE'
        ]);
        $response->assertStatus(204);
    }
}
