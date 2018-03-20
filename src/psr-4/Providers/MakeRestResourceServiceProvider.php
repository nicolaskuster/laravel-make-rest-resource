<?php

namespace Nicolaskuster\MakeRestResource\Providers;

use Illuminate\Support\ServiceProvider;
use Nicolaskuster\MakeRestResource\Console\Commands\MakeRestResourceCommand;

class MakeRestResourceServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                MakeRestResourceCommand::class
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
        //
    }
}
