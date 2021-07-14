<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ...$roles)
    {
        // Get User
        $user = Auth::user();
        // Check Roles
        foreach ($roles as $role) {
            if ($user->role == $role) {
                 return $next($request);
            }
        }
        // Redirect Back
        return redirect()->back();

    }
}
