<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Helpers\LaravelLoggerProxy;

use Pusher\Pusher;

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
        // $pusher = $this->app->make('pusher');
        // $pusher->set_logger( new LaravelLoggerProxy() );
    }
}
