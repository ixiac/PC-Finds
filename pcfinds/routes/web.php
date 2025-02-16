<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationControl;
use App\Http\Controllers\SignInController;

// Sign Up

# Route for the sign-up form
Route::get('/sign-up', function () {
    return view('paging.sign_up');
})->name('sign-up');

# Route for form sign-up submission
Route::post('/sign-up', [RegistrationControl::class, 'account_register'])->name('account_register_route');



// Sign In

# Route for the sign-in form
Route::get('/sign-in', function () {
    return view('paging.sign_in');
})->name('sign-in');

# Route for form sign-in submission
Route::post('/sign-in', [SignInController::class, 'account_sign_in'])->name('account_sign_in_route');

# Route for the sign-in form
Route::get('/admin-control-panel', function () {
    return view('paging.admin');
})->name('admin');

#Route for admin dashboard
Route::get('/admin-dashboard', function () {
    return view('content.admin_dashboard');
})->name('admin-dashboard');

#Route for add admin
Route::get('/add-admin', function () {
    return view('content.add_admin');
})->name('add-admin');