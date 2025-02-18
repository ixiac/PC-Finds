<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        $user = auth()->user();

        if (!$user || ($role == 'admin' && $user->role != 2) || ($role == 'admin' && $user->role != 2) || ($role == 'super-admin' && $user->role != 3)) {
            return redirect('/')->with('error', 'Access Denied');
        }

        return $next($request);
    }
}
