<?php

namespace Tests;

use App\Models\User;
use Illuminate\Contracts\Console\Kernel;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Artisan;

trait CreatesApplication
{
    /**
     * Creates the application.
     */
    public function createApplication(): Application
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Kernel::class)->bootstrap();

        $this->setUpDatabase();

        return $app;
    }

    protected function setUpDatabase()
    {
        config(['database.default' => 'sqlite']);
        config(['database.connections.sqlite.database' => ':memory:']);
        Artisan::call('migrate');
    }

    protected function tearDown(): void
    {
        Artisan::call('migrate:reset');
        parent::tearDown();
    }

    public function getContentResponse($response)
    {
        return json_decode($response->getContent());
    }

    public function createAndAutenticateUser() {
        $user = User::factory()->create();
        $this->actingAs($user);
    }
}
