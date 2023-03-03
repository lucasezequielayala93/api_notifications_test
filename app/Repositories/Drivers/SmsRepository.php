<?php

declare(strict_types=1);

namespace App\Repositories\Drivers;

use App\Models\User;
use App\Models\Notification;
use App\Contracts\DriverNotificationInterface;
use App\Facades\Sms;

class SmsRepository implements DriverNotificationInterface
{
    public function sendNotification(Notification $notification): void
    {
        $user = User::findOrFail($notification->user_id);
        $phone = $user->phone;
        Sms::send($phone, $notification->description);
    }
}
