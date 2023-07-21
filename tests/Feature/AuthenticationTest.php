<?php

namespace Tests\Feature;

use App\Http\Controllers\AuthenticationController;
use App\Http\Requests\LoginRequest;
use App\Http\Responses\ApiErrorResponse;
use App\Http\Responses\ApiSuccessResponse;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Mockery;
use Throwable;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use  WithFaker, DatabaseTransactions;

    protected function setUp(): void
    {
        parent::setUp();
        $this->withoutExceptionHandling();
    }

    public function testLoginSuccessful()
    {
        $user = User::factory()->create(['password' => bcrypt('password123')]);
        $credentials = [
            'document_number' => $user->document_number,
            'password' => 'password123',
        ];

        $response = $this->postJson('/api/login', $credentials);
        $response->assertStatus(Response::HTTP_OK);
        $this->assertIsString($this->getContentResponse($response)->data->token);

    }

    public function testLoginInvalidCredentials()
    {
        $user = User::factory()->create(['password' => bcrypt('password123')]);
        $credentials = [
            'document_number' => 123123123,
            'password' => 'invalid_password',
        ];

        $response = $this->postJson('/api/login', $credentials);

        $content = $this->getContentResponse($response);

        $this->assertEquals(Response::HTTP_INTERNAL_SERVER_ERROR, $response->status());
        $this->assertEquals('Usuario o contraseña incorrecto', $content->message);
    }

    public function testLogout()
    {
        $user = User::factory()->create(['password' => bcrypt('password123')]);
        $credentials = [
            'document_number' => $user->document_number,
            'password' => 'password123',
        ];

        $response = $this->postJson('/api/login', $credentials);
        $content = $this->getContentResponse($response);

        $responseLogout = $this->postJson('/api/logout', [], ['Authorization' => 'Bearer ' . $content->data->token]);
        $responseLogout->assertStatus(Response::HTTP_NO_CONTENT);
    }
}
