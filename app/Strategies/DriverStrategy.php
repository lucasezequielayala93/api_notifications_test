<?php

declare(strict_types=1);

namespace App\Strategies;

use App\Enums\DriverNotificationEnum;
use App\Repositories\Drivers\MailRepository as Mail;
use App\Repositories\Drivers\SmsRepository as Sms;

class DriverStrategy
{
    public function init(string $driver)
    {
        return match ($driver) {
            DriverNotificationEnum::EMAIL => new Mail(),
            DriverNotificationEnum::SMS => new Sms(),
            default => throw new \Exception('invalid driver'),
        };
    }
}
