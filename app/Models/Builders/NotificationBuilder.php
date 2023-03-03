<?php

declare(strict_types=1);

namespace App\Models\Builders;

use Illuminate\Database\Eloquent\Builder;

class NotificationBuilder extends Builder
{
    public function notificationsByUser(string $user_id): self
    {
        return $this->where('user_id', $user_id)
            ->where('readed', false);
    }
}
