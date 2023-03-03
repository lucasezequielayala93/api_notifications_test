<?php

declare(strict_types=1);

namespace App\Exceptions;

use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    public function register(): void
    {
        $this->reportable(function (\Exception $e) {
            Log::error($e->getMessage());
        });
        $this->reportable(function (ValidationException $e) {
            Log::error($e->getMessage());
        });

        $this->renderable(function (\Exception $e) {
            return failed($e->getMessage());
        });
        $this->renderable(function (ValidationException $e) {
            return failed($e->getMessage());
        });        
    }
}
