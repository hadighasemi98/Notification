<?php

namespace App\Providers;

use App\Services\EmailNotification\EmailNotification;
use App\Services\SmsNotification\SmsNotification;
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
        // $this->app->bind('App\Contracts\Notifications\NotificationInterface', function() {
        //     return new EmailNotification;
        // });
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
