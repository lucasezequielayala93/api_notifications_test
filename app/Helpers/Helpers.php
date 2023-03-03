<?php

use Illuminate\Http\JsonResponse;

if (!function_exists('success')) {
    function success(string $message, $data, $status = 200): JsonResponse
    {
        return response()->json(
            [
                'success' => true,
                'status' => $status,
                'data' => $data,
                'message' => $message,
            ],
            $status
        );
    }
}
if (!function_exists('failed')) {
    function failed(string $message, $status = 422): JsonResponse
    {
        return response()->json(
            [
                'success' => false,
                'status' => $status,
                'message' => $message,
            ],
            $status
        );
    }
}
