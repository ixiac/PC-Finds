<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Account;

class SignInController extends Controller
{
    public function account_sign_in(Request $request)
    {
        // Validate input
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // Find user
        $user = Account::where('username', $request->username)->first();

        // Check password
        if ($user && Hash::check($request->password, $user->password)) {
            session(['user' => $user->id]);
            return redirect()->route('new_dashboard');
        }

        // Return with error and username
        return back()->withInput()->with('error', 'Invalid username or password.');
    }
}
