<?php

namespace LaravelLiberu\Core\State;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use LaravelLiberu\Core\Contracts\ProvidesState;
use LaravelLiberu\Core\Services\Inspiring;

class Meta implements ProvidesState
{
    public function mutation(): string
    {
        return 'setMeta';
    }

    public function state(): mixed
    {
        return [
            'appName' => Config::get('app.name'),
            'appUrl' => url('/').'/',
            'csrfToken' => csrf_token(),
            'dateFormat' => Config::get('liberu.config.dateFormat'),
            'dateTimeFormat' => Config::get('liberu.config.dateFormat').' H:i:s',
            'env' => App::environment(),
            'extendedDocumentTitle' => Config::get('liberu.config.extendedDocumentTitle'),
            'quote' => Inspiring::quote(),
            'sentryDsn' => Config::get('sentry.dsn'),
            'version' => Config::get('liberu.config.version'),
        ];
    }
}
