<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Notification;
use App\Strategies\DriverStrategy;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class NotificationRepository
{
    public function __construct(
        protected Notification $model,
        protected DriverStrategy $strategy
    ) {
        $this->model = $model;
        $this->strategy = $strategy;
    }

    public function getNotificationsByUser(string $userId): Collection
    {
        return $this->model->notificationsByUser($userId)->get();
    }

    public function checkOfReaded(Notification $notification): bool
    {
        if ($notification->user_id === Auth::user()->ID) {
            $notification->readed = true;
            $notification->save();
            return true;
        }
        return throw new \Exception('the user is not authorized to perform this action');
    }

    public function createNotification(Request $request): Notification
    {
        return $this->model->create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => $request->user_id,
            'readed' => false,
            'driver' => $request->driver,
        ]);
    }

    public function sendNotification(string $driver, Notification $notification): void
    {
        $model = $this->strategy->init($driver);
        $model->sendNotification($notification);
    }
}
