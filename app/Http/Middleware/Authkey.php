<?php

namespace App\Http\Middleware;

use Closure;

class Authkey
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
        $token = $request->header('Authorization');
        if ($token != 'f3OzQHpCuMxsW2NVCaQNLuhClr3WDfC1PDWhRA4E2L7dqcZB1A9CO9ml8gHW') {
            return response()->json(['message' => "Authorization is required"], 401);
        }
        return $next($request);
    }
}
