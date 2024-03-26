<?php

namespace App\Traits;

use Symfony\Component\HttpFoundation\JsonResponse;

trait ApiResponseTrait
{
    protected $statusCode;
    protected function setStatusCode($statusCode): static
    {
        $this->statusCode = $statusCode;
        return $this;
    }


    protected static function success($data = [],  $msg = null, $statusCode = 200): JsonResponse
    {
        if (!empty($data)) {
            return response()->json([
                'data' => $data,
                'message' => $msg,
            ], $statusCode);
        }

        return response()->json([
            'message' => $msg,
        ], $statusCode);
    }

    protected static function error($msg = null, $statusCode = 200): JsonResponse
    {
        return response()->json([
            'message' => $msg,
        ], $statusCode);
    }

    protected function respondWithCollection(mixed $collection, int $statusCode = null, $headers = []): mixed
    {
        $statusCode = $statusCode ?? 200;
        return $this->setStatusCode($statusCode)->respond($collection, $headers);
    }

    
}
