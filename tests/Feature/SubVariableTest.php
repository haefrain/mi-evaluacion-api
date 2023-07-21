<?php

namespace Tests\Feature;

use App\Models\SubVariable;
use App\Models\Variable;
use Tests\TestCase;

class SubVariableTest extends TestCase
{
    const URL = '/api/sub-variables';

    public function testIndex(): void
    {
        $this->createAndAutenticateUser();
        $subVariables = SubVariable::factory()->count(3)->create();
        $response = $this->get(self::URL);
        $content = $this->getContentResponse($response);
        $response->assertStatus(200);
        $this->assertEquals(count($subVariables), count($content->data));
    }

    public function testStore(): void
    {
        $this->createAndAutenticateUser();
        $variable = Variable::factory()->create();
        $response = $this->post(self::URL, [
            'variable_id' => $variable->id,
            'name' => 'SubVariable',
        ]);
        $content = $this->getContentResponse($response);
        $response->assertStatus(201);
    }

    public function testShow(): void
    {
        $this->createAndAutenticateUser();
        $subVariable = SubVariable::factory()->create();
        $response = $this->get(self::URL . '/' . $subVariable->id);
        $response->assertStatus(200);
    }

    public function testUpdate(): void
    {
        $this->createAndAutenticateUser();
        $subVariable = SubVariable::factory()->create();
        $response = $this->postJson(self::URL . '/' . $subVariable->id, [
            'name' => 'SubVariable Edited',
            '_method' => 'PUT'
        ]);
        $response->assertStatus(200);
    }

    public function testDestroy(): void
    {
        $this->createAndAutenticateUser();
        $subVariable = SubVariable::factory()->create();
        $response = $this->postJson(self::URL . '/' . $subVariable->id, [
            '_method' => 'DELETE'
        ]);
        $response->assertStatus(204);
    }
}
