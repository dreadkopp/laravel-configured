<?php

namespace Tests;

use Dreadkopp\LaravelConfigured\Providers\ConfiguredServiceProvider;
use Illuminate\Config\Repository;
use Orchestra\Testbench\TestCase;

/**
 * @covers \Dreadkopp\LaravelConfigured\Providers\ConfiguredServiceProvider
 */
class ServiceProviderTest extends TestCase
{
    
    public function testConfiguredInstanceIsRegistered() : void
    {
        $this->app->useConfigPath(__DIR__.'/fixtures/config');
        (new ConfiguredServiceProvider($this->app))->boot();
        self::assertInstanceOf(Repository::class, $this->app['configured']);
        /** @var Repository $repository */
        $repository = $this->app['configured'];
        // configured should only contain sqlite
        self::assertCount(1,$repository->get('database.connections'));
        // default will contain all connections
        self::assertGreaterThan(1,$this->app['config']->get('database.connections'));
    }

}