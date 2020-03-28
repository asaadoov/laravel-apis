<?php

namespace App\Http\Middleware;

use Closure;

class HttpHeader
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
        $response = $next($request);
        $response->header('X-JOBS', 'Come Work With Us.');
        return $response;
    }
}
