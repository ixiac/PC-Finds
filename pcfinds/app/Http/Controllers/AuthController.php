<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Account;
use App\Models\AccountLog;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = Account::where('username', $request->username)->first();


        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);
            $request->session()->regenerate();

            // Log the login activity
            AccountLog::create([
                'id' => $user->id,
                'activity' => 'Logged In',
                'updated_at' => now()->setTimezone('Asia/Manila')->format('Y-m-d H:i:s')
            ]);

            return ($user->role == 2 || $user->role == 3)
                ? redirect()->route('admin-dashboard')
                : redirect()->route('customer-dashboard');
        }

        return back()->with('error', 'Invalid username or password.');
    }

    public function logout(Request $request)
    {
        $user = Auth::user();

        if ($user) {
            AccountLog::create([
                'id' => $user->id,
                'activity' => 'Signed Out',
                'updated_at' => now()->setTimezone('Asia/Manila')->format('Y-m-d H:i:s')
            ]);
        }

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }


    public function index()
    {
        $logs = AccountLog::with('account')->orderBy('account_log_id', 'desc')->get();
        return view('content.admin_logs', compact('logs'));
    }

}
