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

# Route for the home page
Route::get('/', function () {
    return view('welcome');
});

# Route for the products page
Route::get('/products_page', function () {
    return view('products_page');
});