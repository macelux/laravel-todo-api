<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function responseJson(bool $status = true, int $responseCode = 200, string $message = "", $data = []): JsonResponse
    {
        return response()->json([
            'status'         =>  $status,
            'message'       => $message,
            'data'          =>  $data
        ], $responseCode);
    }
}
