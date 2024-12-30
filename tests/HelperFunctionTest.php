<?php

namespace Tests;

use Dreadkopp\LaravelConfigured\Providers\ConfiguredServiceProvider;
use Orchestra\Testbench\TestCase;


/**
 * @covers ::configured()
 */
class HelperFunctionTest extends TestCase
{

    protected function setUp(): void
    {
        parent::setUp();
        $this->app->useConfigPath(__DIR__ . '/fixtures/config');
        (new ConfiguredServiceProvider($this->app))->boot();
    }

    public function testHelperFunctionWorks(): void
    {

        self::assertEquals(
            [
                'file' => '/tmp/sqlite.db'
            ],
            configured('database.connections.sqlite')
        );

        self::assertNotEquals(
            [
                'file' => '/tmp/sqlite.db'
            ],
            config('database.connections.sqlite'));

        self::assertNull(configured('database.connections.pgsql'));

    }

}