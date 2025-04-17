<?php

namespace LiranCo\NotificationSubscriptions\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Notifications\Events\NotificationSending;
use LiranCo\NotificationSubscriptions\Listeners\NotificationSendingListener;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        NotificationSending::class => [
            NotificationSendingListener::class,
        ],
    ];

    public function boot()
    {
        parent::boot();
    }
}
