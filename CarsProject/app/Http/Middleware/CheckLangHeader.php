<?php

namespace App\Http\Middleware;

use Closure;

class CheckLangHeader
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
        if ($request->query->has('lang')) {
            return $next($request);
        } else {
            return response()->view('errors.missing');
        }
    }
}
