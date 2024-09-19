<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Log;
use Closure;

class RequestLog
{
    public function handle($request, Closure $next)
    {
        Log::info('request', ['request' => $request]);
        return $next($request);
    }
}