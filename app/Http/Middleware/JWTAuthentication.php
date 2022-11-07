<?php

namespace App\Http\Middleware;

use Closure;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class JWTAuthentication
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        try {
            // $user = JWTAuth::toUser($request->bearerToken('token'));
            $token = $request->bearerToken('token') ? $request->bearerToken('token') : $request->token;
            $user = JWTAuth::toUser($token);
        } catch (\Exception $e) {
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException) {
                return response()->json(['token_expired'],
                $e->getStatusCode());
            } elseif ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException) {
                return response()->json(['token_invalid'],
                $e->getStatusCode());
            } else {
                return response()->json(['error' => 'Sorry, Token is required']);
            }
        }

        return $next($request);
    }
}
