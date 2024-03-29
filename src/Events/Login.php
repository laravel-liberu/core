<?php

namespace LaravelLiberu\Core\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use LaravelLiberu\Users\Models\User;

class Login
{
    use Dispatchable, SerializesModels;

    public function __construct(
        private User $user,
        private string $ip,
        private string $userAgent
    ) {
    }

    public function user(): User
    {
        return $this->user;
    }

    public function ip(): string
    {
        return $this->ip;
    }

    public function userAgent(): string
    {
        return $this->userAgent;
    }
}
