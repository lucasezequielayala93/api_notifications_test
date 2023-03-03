<?php

declare(strict_types=1);

namespace App\Services;

use Twilio\Rest\Client;

final class SmsService
{
    protected $twilio;

    public function __construct()
    {
        $sid = env("TWILIO_ACCOUNT_SID");
        $token = env("TWILIO_AUTH_TOKEN");
        $this->twilio = new Client($sid, $token);
    }

    public function send(string $to, string $message): void
    {
        $this->twilio->messages
            ->create(
                $to,
                [
                    "body" => $message,
                ]
            );
    }
}
