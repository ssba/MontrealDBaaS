<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App;

class CustomerActionsServiceProvider extends ServiceProvider
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
        App::bind('CustomerActions', function()
        {
            return new \App\Helpers\CustomerActions\CustomerActions;
        });
    }
}
