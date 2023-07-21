<?php

namespace Tests\Feature\Models;

use App\Models\Company;
use App\Models\TypeAppointment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TypeAppointmentTest extends TestCase
{
    use WithFaker;
    const URL = '/api/type-appointments';

    public function testIndex(): void
    {
        $this->createAndAutenticateUser();
        $typeAppointments = TypeAppointment::factory()->count(3)->create();
        $response = $this->get(self::URL);
        $content = $this->getContentResponse($response);
        $response->assertStatus(200);
        $this->assertEquals(count($typeAppointments), count($content->data));
    }

    public function testStore(): void
    {
        $this->createAndAutenticateUser();
        $response = $this->post(self::URL, [
            'company_id' => Company::factory()->create()->id,
            'name' => $this->faker->name(),
        ]);
        $content = $this->getContentResponse($response);
        $response->assertStatus(201);
    }

    public function testShow(): void
    {
        $this->createAndAutenticateUser();
        $typeAppointment = TypeAppointment::factory()->create();
        $response = $this->get(self::URL . '/' . $typeAppointment->id);
        $response->assertStatus(200);
    }

    public function testUpdate(): void
    {
        $this->createAndAutenticateUser();
        $typeAppointment = TypeAppointment::factory()->create();
        $response = $this->postJson(self::URL . '/' . $typeAppointment->id, [
            'company_id' => Company::factory()->create()->id,
            'name' => $this->faker->name(),
            '_method' => 'PUT'
        ]);
        $response->assertStatus(200);
    }

    public function testDestroy(): void
    {
        $this->createAndAutenticateUser();
        $typeAppointment = TypeAppointment::factory()->create();
        $response = $this->postJson(self::URL . '/' . $typeAppointment->id, [
            '_method' => 'DELETE'
        ]);
        $response->assertStatus(204);
    }
}
