<?php

namespace Tests\Feature;

use App\Models\Company;
use App\Models\Dependency;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DependencyTest extends TestCase
{
    use WithFaker;

    const URL = '/api/dependencies';

    public function testIndex(): void
    {
        $this->createAndAutenticateUser();
        $dependencies = Dependency::factory()->count(3)->create();
        $response = $this->get(self::URL);
        $content = $this->getContentResponse($response);
        $response->assertStatus(200);
        $this->assertEquals(count($dependencies), count($content->data));
    }

    public function testStore(): void
    {
        $this->createAndAutenticateUser();
        $response = $this->post(self::URL, [
           'company_id' => Company::factory()->create()->id,
           'name' => fake()->name(),
        ]);
        $content = $this->getContentResponse($response);
        $response->assertStatus(201);
    }

    public function testShow(): void
    {
        $this->createAndAutenticateUser();
        $dependency = Dependency::factory()->create();
        $response = $this->get(self::URL . '/' . $dependency->id);
        $response->assertStatus(200);
    }

    public function testUpdate(): void
    {
        $this->createAndAutenticateUser();
        $dependency = Dependency::factory()->create();
        $response = $this->postJson(self::URL . '/' . $dependency->id, [
            'company_id' => Company::factory()->create()->id,
            'name' => fake()->name(),
            '_method' => 'PUT'
        ]);
        $response->assertStatus(200);
    }

    public function testDestroy(): void
    {
        $this->createAndAutenticateUser();
        $dependency = Dependency::factory()->create();
        $response = $this->postJson(self::URL . '/' . $dependency->id, [
            '_method' => 'DELETE'
        ]);
        $response->assertStatus(204);
    }
}
