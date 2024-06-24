<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
// use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Response;

class CorsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // return $next($request)
        //     ->header('Access-Control-Allow-Origin', '*')
        //     ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
        //     ->header('Access-Control-Allow-Headers', 'Content-Type, X-Auth-Token, Authorization, Origin');
        $response = $next($request);
        $response->header('Access-Control-Allow-Origin', '*')
                 ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
                 ->header('Access-Control-Allow-Headers', 'Content-Type, X-Auth-Token, Authorization, Origin');
        
        if ($request->getMethod() === 'OPTIONS') {
            $response->setStatusCode(200);
        }
        
        return $response;
    }
}
