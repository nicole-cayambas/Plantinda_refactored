<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckUserType
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $user_type='')
    {
        $userType = auth()->user()->user_type;
        if($userType == 'admin') {
            return $next($request);
        }
        else if($userType == $user_type && $user_type=='seller') {
            return $next($request);
        } else {
            return redirect()->back();
        }
        // return $next($request);
    }
}
