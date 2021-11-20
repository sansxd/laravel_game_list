<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
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
        return response()->json(compact('user', 'token'), 201);
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

    public function logout()
    {
        try {
            // JWTAuth::invalidate($request->token);
            JWTAuth::invalidate(JWTAuth::getToken());
            return response()->json([
                'success' => true,
                'message' => 'User has been logged out'
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function getAuthenticatedUser(Request $request)
    {
        try {
            // $user = JWTAuth::toUser();
            // return response()->json(['user' => $user]);
            return new UserResource(auth()->user());
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
