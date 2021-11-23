<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserController extends Controller
{
    public function register(UserRequest $request)
    {
        $user = User::create($request->validated());
        $tokenUser = JWTAuth::fromUser($user);
        $token = $this->respondWithToken($tokenUser);
        return response()->json(compact('user', 'token'), 201);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'Credenciales invalidas'], 401);
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        return response()->json($this->respondWithToken($token));
    }

    public function logout()
    {
        try {
            JWTAuth::invalidate(JWTAuth::getToken());
            return response()->json([
                'success' => true,
                'message' => 'El usuario ha sido desconectado'
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function getAuthenticatedUser(Request $request)
    {
        try {
            return new UserResource(auth()->user());
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    // respuesta de token con expire_in y token_type
    protected function respondWithToken($token)
    {
        return [
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => JWTAuth::factory()->getTTL()
        ];
    }
}
