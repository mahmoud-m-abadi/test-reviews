<?php

namespace App\Providers;

use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Request::macro('isClient', function () {
           return request()->segment(3) == 'client';
        });

        Request::macro('isManager', function () {
            return request()->segment(3) == 'manager';
        });
    }
}
