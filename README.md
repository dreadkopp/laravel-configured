# CONFIGURED

With Laravel 11 by default configurations are merged from framework.

This might introduce some unexpected behavior since i.e. Config::get('database.connections') will now return not only the explicitly
configured connections but also a lot of defaults from the framework.

same for a handful of other configs.

While one could use a workaround by patching the bootstrap/app.php and calling $app->dontMergeFrameworkConfiguration() 
this package tries to provide a less intrusive approach, by registering a second config repository which only contains values
configured via config files in the ./config directory.

Both a Facade ( Dreadkopp\LaravelConfigured\Facades\Configured ) as well as a helper-function ( configured() ) are provided
which behave the same way as their original implementations ( Config || config() ) minus the set-functionality