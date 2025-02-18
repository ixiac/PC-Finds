<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

        // Try to find the user by username
        $user = Account::where('username', $request->input('username'))->first();

        // If the user exists and the password is correct
        if ($user && Auth::attempt(['username' => $user->username, 'password' => $request->input('password')])) {
            $request->session()->regenerate();

            // Redirect based on role
            $role = Auth::user()->role;
            if ($role == 2) {
                return redirect()->route('admin.dashboard');
            } elseif ($role == 3) {
                return redirect()->route('super-admin.dashboard');
            }

            return redirect()->route('customer.dashboard');
        }

        // If authentication fails, redirect back with an error
        return back()->with('error', 'Invalid username or password.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('/');
    }
}
