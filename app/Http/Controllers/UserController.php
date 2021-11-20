<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserController extends Controller
{
    public function register(UserRequest $request)
    {
        $user = User::create($request->validated());
        $token = JWTAuth::fromUser($user);
        return response()->json(compact('user','token'), 201);
    }
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'Credenciales invalidas'], 400);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }
        return response()->json(['token' => $token]);
    }
    public function getAuthenticatedUser()
    {
        try {
            return response()->json(auth()->user());
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
