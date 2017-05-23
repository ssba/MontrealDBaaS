<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App;

class RequestStatsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        App::bind('RequestStats', function()
        {
            return new \App\Helpers\RequestStats\RequestStats;
        });
    }
}
