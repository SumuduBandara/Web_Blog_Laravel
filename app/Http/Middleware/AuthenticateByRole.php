<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthenticateByRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {

      

        if (auth()->check() && in_array( auth()->user()->role, explode("||",$role))) {
            return $next($request);
        }
        return redirect()->route('home')->with('err_msg', 'Unauthorized Access!');
    }
}
