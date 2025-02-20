<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;

class CountAccountController extends Controller
{
    public function adminDashboard()
    {
        // Debugging
        $accounts = Account::all();
        $totalCustomers = Account::where('role', 1)->count();
        $totalAdmins = Account::where('role', 2)->count();
        $totalUsers = $totalCustomers + $totalAdmins;

        return view('content.admin_dashboard', compact('totalUsers', 'totalCustomers', 'totalAdmins'));
    }
}




