<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

// use \resources\views\components\progressBar;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        \Validator::extend('phone_number', function ($attribute, $value, $parameters) {
            return substr($value, 0, 2) == '01';
        });
        // Blade::component('progress-bar', progressBar::class);
    }
}
