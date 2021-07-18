<?php

namespace App\Observers;

use Log;
use Illuminate\Support\Facades\Hash;

trait UserObserver
{
    protected static function boot()
    {
        parent::boot();

        static::created(function ($user) {
            $user->password = Hash::make($user->password);
            $user->save();
        });
    }
}
