<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;

class BaseController extends Controller
{
    public function sendSuccessResponse(array $data, string|null $message = null)
    {
        $response = [
            'success' => true,
            'data'    => $data,
        ];
        if ($message) {
            $response["message"] = $message;
        }

        return response()->json($response, 200);
    }


    /**
     * return error response.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendErrorResponse(string $error, array $error_data = [], $code = 200)
    {
        $response = [
            'success' => false,
            'message' => $error,
        ];

        if ($error_data && sizeof($error_data) > 0) {
            $response['data'] = $error_data;
        }

        return response()->json($response, $code);
    }
}