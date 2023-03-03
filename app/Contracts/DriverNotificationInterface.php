<?php

declare(strict_types=1);

namespace App\Contracts;

use App\Models\Notification;

interface DriverNotificationInterface
{
    public function sendNotification(Notification $notification): void;
}
