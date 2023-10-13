<?php

namespace LaravelLiberu\Core\Listeners;

use Carbon\Carbon;

class PasswordResetListener
{
    public function handle($event)
    {
        if ((int) config('liberu.auth.password.lifetime') > 0) {
            $event->user->password_updated_at = Carbon::now();
            $event->user->save();
        }
    }
}
