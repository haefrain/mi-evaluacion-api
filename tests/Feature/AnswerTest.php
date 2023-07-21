<?php

namespace Tests\Feature;

use App\Models\Answer;
use App\Models\Option;
use App\Models\Question;
use App\Models\User;
use Tests\TestCase;

class AnswerTest extends TestCase
{
    const URL = '/api/answers';

    public function testIndex(): void
    {
        $this->createAndAutenticateUser();
        $answers = Answer::factory()->count(3)->create();
        $response = $this->get(self::URL);
        $content = $this->getContentResponse($response);
        $response->assertStatus(200);
        $this->assertEquals(count($answers), count($content->data));
    }

    public function testStore(): void
    {
        $this->createAndAutenticateUser();
        $questionId = Question::factory()->create()->id;
        $response = $this->post(self::URL, [
            'question_id' => $questionId,
            'user_id' => User::factory()->create()->id,
            'option_id' => Option::factory()->create(['question_id' => $questionId])->id,
        ]);
        $content = $this->getContentResponse($response);
        $response->assertStatus(201);
    }

    public function testShow(): void
    {
        $this->createAndAutenticateUser();
        $answer = Answer::factory()->create();
        $response = $this->get(self::URL . '/' . $answer->id);
        $response->assertStatus(200);
    }

    public function testUpdate(): void
    {
        $this->createAndAutenticateUser();
        $answer = Answer::factory()->create();
        $response = $this->postJson(self::URL . '/' . $answer->id, [
            'user_id' => User::factory()->create()->id,
            '_method' => 'PUT'
        ]);
        $response->assertStatus(200);
    }

    public function testDestroy(): void
    {
        $this->createAndAutenticateUser();
        $answer = Answer::factory()->create();
        $response = $this->postJson(self::URL . '/' . $answer->id, [
            '_method' => 'DELETE'
        ]);
        $response->assertStatus(204);
    }
}
