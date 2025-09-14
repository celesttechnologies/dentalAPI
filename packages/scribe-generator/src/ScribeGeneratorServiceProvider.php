<?php

namespace WFX\ScribeGenerator;

use Illuminate\Support\ServiceProvider;
use WFX\ScribeGenerator\Console\Commands\GenerateScribeDocsCommand;

class ScribeGeneratorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // Publish configuration
        $this->publishes([
            __DIR__.'/../config/scribe-generator.php' => config_path('scribe-generator.php'),
        ], 'config');

        // Register commands
        if ($this->app->runningInConsole()) {
            $this->commands([
                GenerateScribeDocsCommand::class,
            ]);
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        // Merge configuration
        $this->mergeConfigFrom(
            __DIR__.'/../config/scribe-generator.php', 'scribe-generator'
        );
    }
}