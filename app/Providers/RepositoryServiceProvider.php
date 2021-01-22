<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        // Mail
        $this->app->bind(
            'App\Interfaces\MailInterface',
            'App\Repositories\MailRepository'
        );

        // php artisan config:clear
        // php artisan config:clear
    }
}
