<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\PersonalAccessToken;

class AuthController extends BaseController
{
    public function logout(Request $request)
    {
        $token = PersonalAccessToken::findToken($request->bearerToken());
        $token->delete();

        return $this->sendSuccessResponse([], "User logged out");
    }

    function login(Request $request)
    {
        $request->validate([
            "email" => "required",
            "password" => "required"
        ]);
        $user = User::with("areas")->where('email', $request->email)->first();
        if (is_null($user)) {
            return $this->sendErrorResponse(__('auth.failed'));
        }
        if (Hash::check($request->password, $user->password) == false) {
            return $this->sendErrorResponse(__('auth.password'));
        }

        $token = $user->createToken(config('app.api_token_name'))->plainTextToken;

        return $this->sendSuccessResponse([
            'user' => $user,
            'token' => $token
        ], "Loggedin successfully");
    }

    public function user(Request $request)
    {
        $user = User::with("areas")->where('id', $request->user()->id)->first();
        return $this->sendSuccessResponse([
            'user' => $user
        ]);
    }
}