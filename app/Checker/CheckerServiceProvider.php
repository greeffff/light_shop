<?php

namespace App\Checker;

use Illuminate\Support\ServiceProvider;

class CheckerServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {

    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Register the blade directives
     *
     * @return void
     */
    private function bladeDirectives()
    {
        if (!class_exists('\Blade')) return;

        // Call to Entrust::hasRole
        \Blade::directive('role', function($expression) {
            return "<?php if (\\Checker::hasRole({$expression})) : ?>";
        });

        \Blade::directive('endrole', function($expression) {
            return "<?php endif; // Checker::hasRole ?>";
        });

        // Call to Entrust::can
        \Blade::directive('permission', function($expression) {
            return "<?php if (\\Checker::can({$expression})) : ?>";
        });

        \Blade::directive('endpermission', function($expression) {
            return "<?php endif; // Entrust::can ?>";
        });

        // Call to Entrust::ability
        \Blade::directive('ability', function($expression) {
            return "<?php if (\\Checker::ability({$expression})) : ?>";
        });

        \Blade::directive('endability', function($expression) {
            return "<?php endif; // Checker::ability ?>";
        });
    }

    /**
     * Register the application bindings.
     *
     * @return void
     */
    private function registerEntrust()
    {
        $this->app->bind('checker', function ($app) {
            return new Checker($app);
        });

        $this->app->alias('checker', 'App\Checker');
    }

    /**
     * Register the artisan commands.
     *
     * @return void
     */
    private function registerCommands()
    {
        $this->app->singleton('command.checker.migration', function ($app) {
            return new MigrationCommand();
        });
    }

    /**
     * Merges user's and entrust's configs.
     *
     * @return void
     */

    /**
     * Get the services provided.
     *
     * @return array
     */
    public function provides()
    {
        return [
            'command.checker.migration'
        ];
    }
}
