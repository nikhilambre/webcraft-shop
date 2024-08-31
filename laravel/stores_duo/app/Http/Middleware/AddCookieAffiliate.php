<?php

namespace App\Http\Middleware;

use Closure;

class AddCookieAffiliate
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
        $affi = $request->affi;

        if($request->hasCookie('id_a'))
        {
            return $next($request);
        }
        elseif(!$affi)
        {
            return $next($request);
        }
        else
        {
            $response = $next($request);
            return $response->withCookie(cookie()->forever('id_a', $affi));
        }
    }
}
