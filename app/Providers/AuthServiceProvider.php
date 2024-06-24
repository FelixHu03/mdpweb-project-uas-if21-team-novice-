<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    protected $policies = [
        'App\Models'=> 'App\policies\ModelsPolicy',
    ];

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
