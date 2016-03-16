<?php

namespace garethnic\laracrypt;

use Illuminate\Support\ServiceProvider;

class LaraCryptServiceProvider extends ServiceProvider
{
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

    }
}