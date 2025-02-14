<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationControl;
use App\Http\Controllers\SignInController;

// Sign Up

# Route for the sign-up form
Route::get('/form', function () {
    return view('sign_up');
});

# Route for form sign-up submission
Route::post('/form', [RegistrationControl::class, 'account_register'])->name('account_register_route');



// Sign in

# Route for the sign-in form
Route::get('/form-sign-in', function () {
    return view('sign_in');
});

Route::post('/form-sign-in', [SignInController::class, 'account_sign_in'])->name('account_sign_in_route');