<?php

namespace App\Helpers;

use App\Errors\ApiException;

class ResponseHandler
{
    public static function success(mixed $data, string $message, int $statusCode)
    {
        return response()->json([
            'statusCode' => $statusCode,
            'message' => $message,
            'data' => $data
        ], $statusCode);
    }

    public static function error(\Throwable $error)
    {
        $statusCode = $error instanceof ApiException ? $error->getStatusCode() : 500;

        return response()->json([
            'statusCode' => $statusCode,
            'message' => $error->getMessage(),
            'data' => null
        ], $statusCode);
    }
}
