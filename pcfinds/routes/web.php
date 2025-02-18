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
// Route::get('/sign-in', function () {
//     return view('paging.sign_in');
// })->name('sign-in');

# Route for form sign-in submission
use App\Http\Controllers\AuthController;

Route::get('/sign-in', function () {
    return view('paging.sign_in');
})->name('sign-in');

Route::post('/sign-in', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');


# Route for the home page
Route::get('/', function () {
    return view('welcome');
});

# Route for the products page
Route::get('/products_page', function () {
    return view('products_page');
});

use App\Http\Controllers\ProductController;

Route::get('/cbe', function () {
    return view('cbe');
})->name('cbe'); // Serves the Blade file

Route::get('/cbe/data', [ProductController::class, 'getData'])->name('cbe.data');

use App\Http\Controllers\ProductSearchController;

Route::get('/search-products', [ProductSearchController::class, 'search'])->name('search.products');

use App\Http\Controllers\ProductCategoryController;

Route::get('/getCategoryProducts/{categoryId}', [ProductCategoryController::class, 'getCategoryProducts']);

use App\Http\Controllers\ProductDetailsController;

Route::get('/product-details-{id}', [ProductDetailsController::class, 'show'])->name('product-details');


#Route for product details
Route::get('/product-details', function () {
    return view('content.product_details');
})->name('product-details');

#Route for product details
Route::get('/product-page', function () {
    return view('content.product_page_default');
})->name('product-page');

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
