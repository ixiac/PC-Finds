<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Account;
use Illuminate\Support\Facades\DB;

class AdminSignInController extends Controller
{
    public function admin_sign_in(Request $request)
    {
        // Validate input
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // Find user by username
        $user = Account::where('username', $request->username)->first();

        if ($user) {
            // Replace 'your_encryption_key' with your actual key.
            $decryptedPasswordResult = DB::selectOne(
                "SELECT pgp_sym_decrypt(?, ?) AS decrypted",
                [$user->password, 'your_encryption_key']
            );

            $decryptedPassword = $decryptedPasswordResult->decrypted ?? '';

            if ($request->password === $decryptedPassword && $user->role == 3) {
                session(['user' => $user->id]);
                return redirect()->route('admin-control-panel');
            }
        }

        return back()->withInput()->with('error', 'Invalid username, password, or insufficient permissions.');
    }
}
