<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class Admin
{
    public function handle(Request $request, Closure $next)
    {
        // Check if user doesn't have admin and redirect him to the home pace
        if (!Auth::user()->admin) {
            return redirect('/');
        }

        // Redirect the user with admin to the dashboard
        return $next($request);
    }
}
