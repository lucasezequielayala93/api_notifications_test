<?php

declare(strict_types=1);

namespace App\Providers;

use App\Models\Notification;
use Illuminate\Support\ServiceProvider;
use App\Observers\NotificationObserver;
use App\Services\SmsService;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind('sms', SmsService::class);
    }

    public function boot(): void
    {
        Notification::observe(NotificationObserver::class);
    }
}
