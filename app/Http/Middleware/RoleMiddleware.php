<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next,$role)
    {
        if($request->user() && $request->user()->role !== $role){
           //return redirect()->intended(RouteServiceProvider::HOME)->with('error','you do not have permission');
            return abort(403,'Unauthorized action');
        }

        return $next($request);
    }
}
