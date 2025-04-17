<?php

namespace LiranCo\NotificationSubscriptions;

use Illuminate\Support\ServiceProvider;

class NotificationSubscriptionsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/notification-subscriptions.php' => config_path('notification-subscriptions.php'),
            ], 'notification-subscriptions-config');

            $this->publishes([
                __DIR__.'/../database/migrations' => database_path('migrations'),
            ], 'notification-subscriptions-migrations');
        }

        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
    }

    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/notification-subscriptions.php',
            'notification-subscriptions'
        );

        $this->app->register(\LiranCo\NotificationSubscriptions\Providers\EventServiceProvider::class);
    }
}
