<?php

namespace Tests\Feature\Models;

use App\Models\Company;
use App\Models\Instrument;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class InstrumentTest extends TestCase
{
    use WithFaker;

    const URL = '/api/instruments';

    public function testIndex(): void
    {
        $this->createAndAutenticateUser();
        $instruments = Instrument::factory()->count(3)->create();
        $response = $this->get(self::URL);
        $content = $this->getContentResponse($response);
        $response->assertStatus(200);
        $this->assertEquals(count($instruments), count($content->data));
    }

    public function testStore(): void
    {
        $this->createAndAutenticateUser();
        $response = $this->post(self::URL, [
           'company_id' => Company::factory()->create()->id,
           'title' => $this->faker->sentence(),
           'description' => $this->faker->paragraph(),
        ]);
        $content = $this->getContentResponse($response);
        $response->assertStatus(201);
    }

    public function testShow(): void
    {
        $this->createAndAutenticateUser();
        $instrument = Instrument::factory()->create();
        $response = $this->get(self::URL . '/' . $instrument->id);
        $response->assertStatus(200);
    }

    public function testUpdate(): void
    {
        $this->createAndAutenticateUser();
        $instrument = Instrument::factory()->create();
        $response = $this->postJson(self::URL . '/' . $instrument->id, [
            'title' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            '_method' => 'PUT'
        ]);
        $response->assertStatus(200);
    }

    public function testDestroy(): void
    {
        $this->createAndAutenticateUser();
        $instrument = Instrument::factory()->create();
        $response = $this->postJson(self::URL . '/' . $instrument->id, [
            '_method' => 'DELETE'
        ]);
        $response->assertStatus(204);
    }
}
