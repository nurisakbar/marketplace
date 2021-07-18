<?php

namespace App\Listeners;

use App\Events\UserRegisterEvent;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserHashPasswordListener
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
        $array = (array) $event;
        $user = User::find($array['user']['id']);
        $user->password = Hash::make($user->password);
        $user->save();
    }
}
