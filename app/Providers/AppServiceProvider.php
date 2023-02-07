<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Helpers\Contracts\SendFormCallBack;
use App\Helpers\Smtp;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(SendFormCallBack::class, function($app) {
            return new Smtp();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
