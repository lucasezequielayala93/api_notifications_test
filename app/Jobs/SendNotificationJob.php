<?php

declare(strict_types=1);

namespace App\Jobs;

use App\Repositories\NotificationRepository;
use App\Models\Notification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendNotificationJob implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    protected string $driver;

    public function __construct(
        protected NotificationRepository $repository,
        protected Notification $notification
    ) {
        $this->repository = $repository;
        $this->notification = $notification;
        $this->driver = $notification->driver;
    }

    public function handle(): void
    {
        $this->repository->sendNotification($this->driver, $this->notification);
    }
}
