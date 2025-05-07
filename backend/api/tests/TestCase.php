<?php

namespace Tests;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Queue;
use Mockery;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Notification;

abstract class TestCase extends BaseTestCase {

    use DatabaseTransactions;

    protected function setUp(): void
    {
        parent::setUp();

        Event::fake();

        Queue::fake();

        Notification::fake();

        $this->validateTestEnvironment();

        $this->generateEncryptKey();
    }

    protected function tearDown(): void
    {
        Mockery::close();

        parent::tearDown();
    }

    private function validateTestEnvironment(): void
    {
        if (in_array(RefreshDatabase::class, class_uses_recursive(static::class))) {
            $this->markTestSkipped('Este teste está utilizando a trait RefreshDatabase.');
        }

        if ( ! in_array(DatabaseTransactions::class, class_uses_recursive(static::class))) {
            $this->markTestSkipped('Este teste não está utilizando a trait DatabaseTransactions.');
        }

        if ( ! file_exists(base_path('.env.testing'))) {
            $this->markTestSkipped('Arquivo .env.testing não encontrado. Os testes não serão executados.');
        }
    }

    /**
     * Set the config key for tests
     **** DONT USE THIS KEY IN PRODUCTION*****
     */
    private function generateEncryptKey(): void
    {
        Config::set('encrypt.key', 'U8j9BRpqtOXdh5dHlaiBvbR95frfbEgsqOxcgBsS86c=');
    }
}
