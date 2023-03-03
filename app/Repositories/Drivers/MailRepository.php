<?php

declare(strict_types=1);

namespace App\Repositories\Drivers;

use App\Models\User;
use App\Models\Notification;
use App\Contracts\DriverNotificationInterface;
use App\Mail\NotificationMail;
use Illuminate\Support\Facades\Mail;

class MailRepository implements DriverNotificationInterface
{
    public function sendNotification(Notification $notification): void
    {
        $user = User::findOrFail($notification->user_id);
        $email = $user->email;
        Mail::to($email)->send(new NotificationMail($notification));
    }
}
