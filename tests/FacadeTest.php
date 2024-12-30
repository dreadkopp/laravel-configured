<?php

namespace Tests;


use Dreadkopp\LaravelConfigured\Facades\Configured;
use Dreadkopp\LaravelConfigured\Providers\ConfiguredServiceProvider;
use Illuminate\Support\Facades\Config;
use Orchestra\Testbench\TestCase;

/**
 * @covers \Dreadkopp\LaravelConfigured\Facades\Configured
 */
class FacadeTest extends TestCase
{

    protected function setUp(): void
    {
        parent::setUp();
        $this->app->useConfigPath(__DIR__ . '/fixtures/config');
        (new ConfiguredServiceProvider($this->app))->boot();
    }

    public function testFacadeWorks(): void
    {

        self::assertEquals(
            [
                'file' => '/tmp/sqlite.db'
            ],
            Configured::get('database.connections.sqlite')
        );

        self::assertNotEquals(
            [
            'file' => '/tmp/sqlite.db'
        ],
            Config::get('database.connections.sqlite'));

        self::assertNull(Configured::get('database.connections.pgsql'));

    }

}