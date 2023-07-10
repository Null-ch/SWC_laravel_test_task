<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;

class LoginController extends BaseController
{
    public function login(Request $request)
    {
        $data = [
            'login' => $request->login,
            'password' => $request->password
        ];

        if (auth()->attempt($data)) {
            $token = auth()->user()->createToken('EventsTable')->accessToken;
            $message = 'Вы успешно авторизировались!';
            return response()->json(['token' => $token, 'message' => $message], 200);
        } else {
            return response()->json(['error' => 'Unauthorised'], 401);
        }
    }
}
