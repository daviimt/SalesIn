<?php

namespace App\Http\Middleware;

use Closure;

class AccessUser
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
        if (auth()->check() && auth()->user()->type === 'u' || auth()->user()->type === 'U')
        return $next($request);
        return redirect('/')->with('error','Only a user can access');
    }
}
