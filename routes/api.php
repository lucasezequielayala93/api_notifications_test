<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NotificationController;

Route::group(['middleware' => 'auth.custom'], function () {

    Route::prefix('notifications')->group(function () {
        Route::get('/{notificationId}', [NotificationController::class, 'getNotification']);
        Route::get('/by-user/{userId}', [NotificationController::class, 'getNotificationsByUser']);
        Route::get('/check-of-readed/{notificationId}', [NotificationController::class, 'checkOfReaded']);
        Route::post('/', [NotificationController::class, 'createNotification']);
    });

    Route::prefix('users')->group(function () {
        Route::post('/', [UserController::class, 'createUser']);
    });
});

Route::fallback(function () {
    return failed('Page not found', 404);
});
