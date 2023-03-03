<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\User;
use Illuminate\Http\Request;

final class UserRepository
{
    public function __construct(
        protected User $model,
    ) {
        $this->model = $model;
    }

    public function createUser(Request $request): User
    {
        return $this->model->create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone
        ]);
    }
}
