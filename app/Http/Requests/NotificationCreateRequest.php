<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use App\Enums\DriverNotificationEnum;
use Illuminate\Foundation\Http\FormRequest;

class NotificationCreateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'user_id' => ['required', 'integer'],
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
            'driver' => ['required', Rule::in(array_map(fn ($driver) => $driver->value, DriverNotificationEnum::cases()))]
        ];
    }
}
