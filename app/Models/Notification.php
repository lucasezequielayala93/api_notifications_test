<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Enums\DriverNotificationEnum;
use App\Models\Builders\NotificationBuilder;

class Notification extends Model
{
    protected $casts = [
        'readed' => 'boolean',
        'driver' => DriverNotificationEnum::class
    ];

    protected $fillable = [
        'title',
        'description',
        'readed',
        'user_id',
        'driver',
    ];

    public function isDispatchable(): bool
    {
        return ($this->driver !== DriverNotificationEnum::EMAIL);
    }

    public function newEloquentBuilder($query): NotificationBuilder
    {
        return new NotificationBuilder($query);
    }
}
