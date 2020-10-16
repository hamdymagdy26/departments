<?php

namespace App\Traits\General\ResponseHandler;

use Illuminate\Http\JsonResponse;

trait ResponseHandler
{
    /**
     * @param array $data
     * @param int $statusCode
     * @return JsonResponse
     */
    public function successResponse(
        array $data = [],
        int $statusCode = 200
    ): JsonResponse
    {
        return response()->json([
            'status' => 'success',
            'data' => $data
        ], $statusCode);
    }

    /**
     * @param string $data
     * @param int $statusCode
     * @return JsonResponse
     */
    public function errorResponse(
        string $data = 'something went wrong!',
        int $statusCode = 500
    ): JsonResponse
    {
        return response()->json([
            'status' => 'error',
            'data' => $data
        ], $statusCode);
    }
}
