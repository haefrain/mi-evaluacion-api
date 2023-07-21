<?php

namespace Tests\Feature\Models;

use App\Models\Company;
use App\Models\Position;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PositionTest extends TestCase
{
    use WithFaker;

    const URL = '/api/positions';

    public function testIndex(): void
    {
        $this->createAndAutenticateUser();
        $positions = Position::factory()->count(3)->create();
        $response = $this->get(self::URL);
        $content = $this->getContentResponse($response);
        $response->assertStatus(200);
        $this->assertEquals(count($positions), count($content->data));
    }

    public function testStore(): void
    {
        $this->createAndAutenticateUser();
        $response = $this->post(self::URL, [
            'company_id' => Company::factory()->create()->id,
            'title' => $this->faker->sentence(),
        ]);
        $content = $this->getContentResponse($response);
        $response->assertStatus(201);
    }

    public function testShow(): void
    {
        $this->createAndAutenticateUser();
        $position = Position::factory()->create();
        $response = $this->get(self::URL . '/' . $position->id);
        $response->assertStatus(200);
    }

    public function testUpdate(): void
    {
        $this->createAndAutenticateUser();
        $position = Position::factory()->create();
        $response = $this->postJson(self::URL . '/' . $position->id, [
            'title' => $this->faker->sentence(),
            '_method' => 'PUT'
        ]);
        $response->assertStatus(200);
    }

    public function testDestroy(): void
    {
        $this->createAndAutenticateUser();
        $position = Position::factory()->create();
        $response = $this->postJson(self::URL . '/' . $position->id, [
            '_method' => 'DELETE'
        ]);
        $response->assertStatus(204);
    }
}
