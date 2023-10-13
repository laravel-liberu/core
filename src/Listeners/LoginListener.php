<?php

namespace LaravelLiberu\Core\Listeners;

use LaravelLiberu\Core\Events\Login as Event;
use LaravelLiberu\Core\Models\Login;
use LaravelLiberu\Core\Notifications\PasswordExpiresSoon;

class LoginListener
{
    public function handle(Event $event)
    {
        Login::create([
            'user_id' => $event->user()->id,
            'ip' => $event->ip(),
            'user_agent' => $event->userAgent(),
        ]);

        if ($event->user()->needsPasswordChange()) {
            $event->user()->notify((new PasswordExpiresSoon())
                ->onQueue('notifications'));
        }
    }
}
