<?php

namespace App\Http\Traits;

use Illuminate\Http\Response;

trait ResponseJson
{
    public function successResponse($data, $statusCode = Response::HTTP_OK)
    {
        return response()->json([
            'status' => true,
            'data'      => $data,
        ], $statusCode);
    }

    public function errorResponse($messages, $statusCode = Response::HTTP_BAD_REQUEST)
    {
        return response()->json([
            'status'    => false,
            'message'   => $messages,
        ], $statusCode);
    }
}
