<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Account;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Validate username and password
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Find the user by username
        $user = Account::where('username', $request->input('username'))->first();

        // Check if user exists and password is correct
        if ($user && Hash::check($request->input('password'), $user->password)) {
            Auth::login($user);
            $request->session()->regenerate();

            // Redirect based on user role
            $role = Auth::user()->role;
            if ($role == 2 || $role == 3) {
                return redirect()->route('admin-dashboard');
            }

            return redirect()->route('customer.dashboard');
        }

        // If authentication fails, redirect back with error message
        return back()->with('error', 'Invalid username or password.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
