<?php

namespace garethnic\laracrypt;

use Illuminate\Support\ServiceProvider;

class LaraCryptServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */

    protected $defer = false;
    /**
     * The console commands.
     *
     * @var bool
     */
    protected $commands = 'garethnic\laracrypt\LaraCryptGenerate';

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
           __DIR__.'/config/laracrypt.php' => config_path('/laracrypt.php')
        ]);
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->commands($this->commands);
    }
}