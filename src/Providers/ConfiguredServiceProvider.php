<?php

namespace Dreadkopp\LaravelConfigured\Providers;

use Illuminate\Foundation\Bootstrap\LoadConfiguration;
use Illuminate\Support\ServiceProvider;

class ConfiguredServiceProvider extends ServiceProvider
{

    public function boot() :void {
        $this->app->singleton('configured', function () {
            $originalConfig = $this->app['config'];

            $clonedApp = clone $this->app;
            $clonedApp->dontMergeFrameworkConfiguration();

            (new LoadConfiguration())->bootstrap($clonedApp);
            $configuredConfig = $clonedApp['config'];

            $this->app->instance('config', $originalConfig);

            return $configuredConfig;
        });
    }

}