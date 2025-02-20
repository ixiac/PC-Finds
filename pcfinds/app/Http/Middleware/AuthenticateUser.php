<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Account;

class AuthenticateUser
{
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is already authenticated
        if (Auth::check()) {
            return $next($request);  // If already authenticated, pass the request to the next middleware
        }

        // Check if username and password are in the request
        if ($request->has('username') && $request->has('password')) {
            $username = $request->input('username');
            $password = $request->input('password');

            // Retrieve the user from the account table using Eloquent
            $user = Account::where('username', $username)->first();

            // If user found and password is correct
            if ($user && password_verify($password, $user->password)) {
                // Log the user in
                Auth::loginUsingId($user->id);

                // Redirect based on role
                $role = $user->role;
                if ($role == 1) {
                    return redirect()->route('customer.dashboard');
                } elseif ($role == 2 || $role == 3) {
                    return redirect()->route('admin-dashboard');
                }
            }
        }

        // If authentication fails, redirect to the custom sign-in page
        return redirect()->route('paging.sign_in')->with('error', 'Invalid credentials.');
    }
}