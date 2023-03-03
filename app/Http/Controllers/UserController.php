<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Repositories\UserRepository;
use App\Http\Requests\UserCreateRequest;

class UserController extends Controller
{
    public function __construct(protected UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function createUser(UserCreateRequest $request): JsonResponse
    {
        $user = $this->repository->createUser($request);
        return success('success', $user);
    }
}
