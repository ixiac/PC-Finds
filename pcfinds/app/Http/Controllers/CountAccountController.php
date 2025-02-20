<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;

class CountAccountController extends Controller
{
    public function adminDashboard()
    {
        $totalUsers = Account::count(); // Count all users
        $totalCustomers = Account::where('role', 1)->count(); // Count customers
        $totalAdmins = Account::where('role', 2)->count(); // Count admins

        return view('content.admin_dashboard', compact('totalUsers', 'totalCustomers', 'totalAdmins'));
    }
}
