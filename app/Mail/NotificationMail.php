<?php

declare(strict_types=1);

namespace App\Mail;

use App\Models\Notification;
use Illuminate\Mail\Mailable;

class NotificationMail extends Mailable
{
    public function __construct(
        public Notification $notification
    ) {
        $this->notification = $notification;
    }

    public function build(): self
    {
        return $this->view('notifications.email')
            ->with([
                'title' => $this->notification->title,
                'description' => $this->notification->description,
            ]);
    }
}
