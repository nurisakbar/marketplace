<?php

namespace App\Listeners;

use App\Events\UserRegisterEvent;

class SendEmailSuccessRegister
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UserRegisterEvent  $event
     * @return void
     */
    public function handle(UserRegisterEvent $event)
    {
        \Log::info("send email success");
    }
}
