<?php

namespace Tests\Feature;

use App\Models\Option;
use App\Models\Question;
use Tests\TestCase;

class OptionTest extends TestCase
{
    const URL = '/api/options';

    public function testIndex(): void
    {
        $this->createAndAutenticateUser();
        $options = Option::factory()->count(3)->create();
        $response = $this->get(self::URL);
        $content = $this->getContentResponse($response);
        $response->assertStatus(200);
        $this->assertEquals(count($options), count($content->data));
    }

    public function testStore(): void
    {
        $this->createAndAutenticateUser();
        $question = Question::factory()->create();
        $response = $this->post(self::URL, [
            'question_id' => $question->id,
            'title' => 'Respuesta Numero 1: Que es la vida?',
            'description' => 'Respuesta Numero 1 Esta es la descripcion',
            'value' => '1',
        ]);
        $content = $this->getContentResponse($response);
        $response->assertStatus(201);
    }

    public function testShow(): void
    {
        $this->createAndAutenticateUser();
        $option = Option::factory()->create();
        $response = $this->get(self::URL . '/' . $option->id);
        $response->assertStatus(200);
    }

    public function testUpdate(): void
    {
        $this->createAndAutenticateUser();
        $option = Option::factory()->create();
        $response = $this->postJson(self::URL . '/' . $option->id, [
            'title' => 'Respuesta Numero 1: Que es la vida?',
            'description' => 'Respuesta Numero 1 Esta es la descripcion',
            'value' => '1',
            '_method' => 'PUT'
        ]);
        $response->assertStatus(200);
    }

    public function testDestroy(): void
    {
        $this->createAndAutenticateUser();
        $option = Option::factory()->create();
        $response = $this->postJson(self::URL . '/' . $option->id, [
            '_method' => 'DELETE'
        ]);
        $response->assertStatus(204);
    }
}
