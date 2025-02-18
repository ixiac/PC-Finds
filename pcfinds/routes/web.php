<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationControl;
use App\Http\Controllers\SignInController;
use App\Http\Controllers\AdminSignInController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductSearchController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductDetailsController;

// Sign Up


# Route for the sign-up form
Route::get('/sign-up', function () {
    return view('paging.sign_up');
})->name('sign-up');

# Route for form sign-up submission
Route::post('/sign-up', [RegistrationControl::class, 'account_register'])->name('account_register_route');


// Sign In


# Route for the sign-in form
// Route::get('/sign-in', function () {
//     return view('paging.sign_in');
// })->name('sign-in');

# Route for form sign-in submission

Route::get('/sign-in', function () {
    return view('paging.sign_in');
})->name('sign-in');

Route::post('/sign-in', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

#Middleware for the user role
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('customer.dashboard');
    })->name('customer.dashboard');

    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard')->middleware('role:admin');

    Route::get('/super-admin/dashboard', function () {
        return view('superadmin.dashboard');
    })->name('super-admin.dashboard')->middleware('role:super-admin');
});


// Admin


# Route for admin sign-in form
Route::get('/admin-sign-in', function () {
    return view('paging.admin_sign_in');
})->name('admin-sign-in');

# Route for admin sign-in submission
Route::post('/admin-sign-in', [AdminSignInController::class, 'admin_sign_in'])->name('admin_sign_in_route');
=======
# Route for the home page
Route::get('/', function () {
    return view('welcome');
});

# Route for the products page
Route::get('/products_page', function () {
    return view('products_page');
});

Route::get('/cbe', function () {
    return view('cbe');
})->name('cbe'); // Serves the Blade file

Route::get('/cbe/data', [ProductController::class, 'getData'])->name('cbe.data');

Route::get('/search-products', [ProductSearchController::class, 'search'])->name('search.products');

Route::get('/getCategoryProducts/{categoryId}', [ProductCategoryController::class, 'getCategoryProducts']);

Route::get('/product-details-{id}', [ProductDetailsController::class, 'show'])->name('product-details');


#Route for product details
Route::get('/product-details', function () {
    return view('content.product_details');
})->name('product-details');

#Route for product details
Route::get('/product-page', function () {
    return view('content.product_page_default');
})->name('product-page');

