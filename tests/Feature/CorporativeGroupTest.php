<?php

namespace Tests\Feature;

use App\Models\Company;
use App\Models\CorporativeGroup;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CorporativeGroupTest extends TestCase
{
    use WithFaker;
    const URL = '/api/corporative-groups';

    public function testIndex(): void
    {
        $this->createAndAutenticateUser();
        $corporativeGroups = CorporativeGroup::factory()->count(3)->create();
        $response = $this->get(self::URL);
        $content = $this->getContentResponse($response);
        $response->assertStatus(200);
        $this->assertEquals(count($corporativeGroups), count($content->data));
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
        $corporativeGroup = CorporativeGroup::factory()->create();
        $response = $this->get(self::URL . '/' . $corporativeGroup->id);
        $response->assertStatus(200);
    }

    public function testUpdate(): void
    {
        $this->createAndAutenticateUser();
        $corporativeGroup = CorporativeGroup::factory()->create();
        $response = $this->postJson(self::URL . '/' . $corporativeGroup->id, [
            'company_id' => Company::factory()->create()->id,
            'name' => $this->faker->name(),
            '_method' => 'PUT'
        ]);
        $response->assertStatus(200);
    }

    public function testDestroy(): void
    {
        $this->createAndAutenticateUser();
        $corporativeGroup = CorporativeGroup::factory()->create();
        $response = $this->postJson(self::URL . '/' . $corporativeGroup->id, [
            '_method' => 'DELETE'
        ]);
        $response->assertStatus(204);
    }
}
