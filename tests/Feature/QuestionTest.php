<?php

namespace Tests\Feature;

use App\Models\Question;
use App\Models\SubVariable;
use Tests\TestCase;

class QuestionTest extends TestCase
{
    const URL = '/api/questions';

    public function testIndex(): void
    {
        $this->createAndAutenticateUser();
        $questions = Question::factory()->count(3)->create();
        $response = $this->get(self::URL);
        $content = $this->getContentResponse($response);
        $response->assertStatus(200);
        $this->assertEquals(count($questions), count($content->data));
    }

    public function testStore(): void
    {
        $this->createAndAutenticateUser();
        $subVariable = SubVariable::factory()->create();
        $response = $this->post(self::URL, [
            'sub_variable_id' => $subVariable->id,
            'title' => 'Pregunta Numero 1: Que es la vida?',
            'description' => 'Pregunta Numero 1 Esta es la descripcion',
            'sort' => 1
        ]);
        $content = $this->getContentResponse($response);
        $response->assertStatus(201);
    }

    public function testShow(): void
    {
        $this->createAndAutenticateUser();
        $question = Question::factory()->create();
        $response = $this->get(self::URL . '/' . $question->id);
        $response->assertStatus(200);
    }

    public function testUpdate(): void
    {
        $this->createAndAutenticateUser();
        $question = Question::factory()->create();
        $response = $this->postJson(self::URL . '/' . $question->id, [
            'title' => 'Pregunta Numero 1: Que es la vida?',
            'description' => 'Pregunta Numero 1 Esta es la descripcion',
            '_method' => 'PUT'
        ]);
        $response->assertStatus(200);
    }

    public function testDestroy(): void
    {
        $this->createAndAutenticateUser();
        $question = Question::factory()->create();
        $response = $this->postJson(self::URL . '/' . $question->id, [
            '_method' => 'DELETE'
        ]);
        $response->assertStatus(204);
    }
}
