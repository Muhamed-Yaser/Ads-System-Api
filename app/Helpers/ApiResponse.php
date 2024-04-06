<?php

namespace  App\Helpers;

use Illuminate\Http\JsonResponse;

class ApiResponse
{
    public static function success($statusCode = 200, $msg = null, $data = []) :JsonResponse
    {

        return response()->json([
            'status' => $statusCode,
            'message' => $msg,
            'data' => $data
        ], $statusCode);
    }

    public static function error($statusCode = 200, $msg = null , $data=[])
    {

        return response()->json([
            'status' => $statusCode,
            'message' => $msg,
            'data' => $data
        ], $statusCode);
    }
}
