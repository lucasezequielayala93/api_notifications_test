<?php

declare(strict_types=1);

namespace App\Observers;

use App\Models\Notification;
use App\Repositories\NotificationRepository;
use App\Jobs\SendNotificationJob;

class NotificationObserver
{
    public function __construct(
        protected NotificationRepository $repository
    ) {
        $this->repository = $repository;
    }

    public function created(Notification $notification): void
    {
        if ($notification->isDispatchable()) {
            dispatch(new SendNotificationJob($this->repository, $notification));
        }
    }
}
