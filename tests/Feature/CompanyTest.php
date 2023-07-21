<?php

namespace Tests\Feature;

use App\Models\Company;
use Tests\TestCase;

class CompanyTest extends TestCase
{
    const URL = '/api/companies';

    public function testIndex(): void
    {
        $this->createAndAutenticateUser();
        $companies = Company::factory()->count(3)->create();
        $response = $this->get(self::URL);
        $content = $this->getContentResponse($response);
        $response->assertStatus(200);
        $this->assertEquals(count($companies), count($content->data));
    }

    public function testStore(): void
    {
        $this->createAndAutenticateUser();
        $response = $this->post(self::URL, [
            'name' => 'Empresa 1',
        ]);
        $content = $this->getContentResponse($response);
        $response->assertStatus(201);
    }

    public function testShow(): void
    {
        $this->createAndAutenticateUser();
        $company = Company::factory()->create();
        $response = $this->get(self::URL . '/' . $company->id);
        $response->assertStatus(200);
    }

    public function testUpdate(): void
    {
        $this->createAndAutenticateUser();
        $company = Company::factory()->create();
        $response = $this->postJson(self::URL . '/' . $company->id, [
            'name' => 'Empresa 2',
            '_method' => 'PUT'
        ]);
        $response->assertStatus(200);
    }

    public function testDestroy(): void
    {
        $this->createAndAutenticateUser();
        $company = Company::factory()->create();
        $response = $this->postJson(self::URL . '/' . $company->id, [
            '_method' => 'DELETE'
        ]);
        $response->assertStatus(204);
    }
}
