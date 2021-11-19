<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Facades\JWTAuth;

class JwtMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        try {
            if (!JWTAuth::parseToken()->authenticate()) {
                return response()->json(['status'=>'Usuario no encontrado'], 404);
            }
        } catch (Exception $e) {
            // return response()->json(['status' => $e->getMessage()]);
            if ($e instanceof TokenInvalidException) {
                return response()->json(['status' => 'El Token es invalido']);
            } else if ($e instanceof TokenExpiredException) {
                return response()->json(['status' => 'El Token a expirado']);
            } else {
                return response()->json(['status' => 'Token de autorizacion no encontrado']);
            }
        }
        return $next($request);
    }
}
