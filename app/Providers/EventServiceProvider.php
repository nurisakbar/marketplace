<?php

namespace App\Providers;

use Laravel\Lumen\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        \App\Events\UserRegisterEvent::class => [
            \App\Listeners\UserHashPasswordListener::class,
            \App\Listeners\SendEmailSuccessRegister::class
        ],
    ];
}
