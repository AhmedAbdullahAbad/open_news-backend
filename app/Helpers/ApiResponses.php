<?php

declare(strict_types=1);

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\JsonResponse;

/**
 * Returns a success HTTP JSON response.
 */
function sendSuccessResponse(string $message = 'OK', array|Arrayable|JsonSerializable|null $data = null, int $code = 200): JsonResponse
{
    $response = [
        'success' => true,
        'message' => $message,
        'data' => $data,
        'code' => $code,
    ];

    return response()->json(
        $response,
        $code
    );
}

/**
 * Returns a failed HTTP JSON response.
 */
function sendFailedResponse(string $message = 'Error', array|Arrayable|JsonSerializable|null $data = null, int $code = 404): JsonResponse
{
    $response = [
        'success' => false,
        'message' => $message,
        'data' => $data,
        'code' => $code,
    ];

    return response()->json(
        $response,
        $code
    );
}
