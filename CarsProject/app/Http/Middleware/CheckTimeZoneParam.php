<?php

namespace App\Http\Middleware;

use Closure;

class CheckTimeZoneParam
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
        if ($request->query->has('timezone')) {
            $request->request->add(['current_timestamp' => Date('Y-m-d H:i:s')]);
            return $next($request);
        } else {
            return response()->view('errors.missing');
        }
    }
}
