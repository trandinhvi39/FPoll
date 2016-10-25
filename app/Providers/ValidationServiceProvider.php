<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Request;
use Illuminate\Support\Facades\Validator;

class ValidationServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extendImplicit('option', 'App\Services\PollValidator@option');
        Validator::extendImplicit('email_poll', 'App\Services\PollValidator@email');
        Validator::extendImplicit('setting', 'App\Services\PollValidator@setting');
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
