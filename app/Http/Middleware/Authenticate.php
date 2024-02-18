<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;    

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request, $guard = null): ?string
    {
        if (!$request->expectsJson()) {
            if (auth()->guard('admin')->check()) {
                return route('admin.dashboard');
            } elseif (auth()->guard('user')->check()) {
                return route('user.dashboard');
            }
            return route('login');
        }
    
    }
}
