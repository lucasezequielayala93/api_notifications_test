<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Repositories\NotificationRepository;
use App\Http\Requests\NotificationCreateRequest;
use App\Models\Notification;
use Illuminate\Http\JsonResponse;

class NotificationController extends Controller
{
    public function __construct(protected NotificationRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getNotification(Notification $notificationId): JsonResponse
    {
        return success('success', $notificationId);
    }

    public function getNotificationsByUser(string $userId): JsonResponse
    {
        $notifications = $this->repository->getNotificationsByUser($userId);
        return success('success', $notifications);
    }

    public function checkOfReaded(Notification $notificationId): JsonResponse
    {
        $notification = $this->repository->checkOfReaded($notificationId);
        return success('success', $notification);
    }

    public function createNotification(NotificationCreateRequest $request): JsonResponse
    {
        $notification = $this->repository->createNotification($request);
        return success('success', $notification);
    }
}
