<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check()) {
            $allowedRoles = [1, 2, 3];
            $userRole = auth()->user()->role;

            if (in_array($userRole, $allowedRoles)) {
                return $next($request);
            } else {
                return redirect()->route('getLogin')->with('error', 'You do not have permission to access this page');
            }
        } else {
            return redirect()->route('getLogin')->with('error', 'You have to be logged in to access this page');
        }
    }
}
