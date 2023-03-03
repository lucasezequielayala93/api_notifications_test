<?php

declare(strict_types=1);

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

final class Sms extends Facade
{
    /**
     * @method static void send(string $to, string $message)
     *
     * @see App\Services\SmsService
     */
    protected static function getFacadeAccessor()
    {
        return 'sms';
    }
}