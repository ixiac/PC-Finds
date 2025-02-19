<?php

use App\Http\Controllers\AdminTableController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationControl;
use App\Http\Controllers\SignInController;
use App\Http\Controllers\ProductController;

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

# Route for form sign-in submission

// Sign In

# Route for the sign-in form
Route::get('/sign-in', function () {
    return view('paging.sign_in');
})->name('sign-in');

Route::post('/sign-in', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

#Middleware for the user role
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('content.product_page_default');
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


Route::middleware('auth')->group(function() {
    // Route for product details
    Route::get('/product-details', function () {
        return view('content.product_details');
    })->name('product-details');

    // Route for product page
    Route::get('/product-page', function () {
        return view('content.product_page_default');
    })->name('product-page');
});

# Route for form sign-in submission
Route::post('/sign-in', [SignInController::class, 'account_sign_in'])->name('account_sign_in_route');

# Route for the sign-in form
Route::get('/admin-control-panel', function () {
    return view('paging.admin');
})->name('admin');

# Route for admin dashboard
Route::get('/admin-dashboard', function () {
    return view('content.admin_dashboard');
})->name('admin-dashboard');


// Manage Account

#Admin Accounts

# Route for admin table
Route::get('/admin-table', [AdminTableController::class, 'admin_account_table'])
    ->name('admin-table');

# Route for add admin
Route::get('/add-admin', function () {
    return view('content.add_admin');
})->name('add-admin');

# Route for admin sign up form submission
Route::post('/add-admin', [RegistrationControl::class, 'admin_account_register'])->name('admin_account_register_route');

# Route for editing admin account
Route::get('/edit-admin/{id}', [AdminTableController::class, 'edit_admin_account_table'])->name('edit_admin_account_table_route');

# Route for updating admin account
Route::put('/update-admin/{id}', [AdminTableController::class, 'update_admin_account_table'])->name('update_admin_account_table_route');

# Route for deleting admin account
Route::delete('/delete-admin/{id}', [AdminTableController::class, 'delete_admin_account_table'])->name('delete_admin_account_table_route');

# Customer Accounts

# Route for customer table
Route::get('/customer-table', [AdminTableController::class, 'customer_account_table'])->name('customer-table');

# Route for editing customer account
Route::get('/edit-customer/{id}', [AdminTableController::class, 'edit_customer_account_table'])->name('edit_customer_account_table_route');

# Route for updating customer account
Route::put('/update-customer/{id}', [AdminTableController::class, 'update_customer_account_table'])->name('update_customer_account_table_route');

# Route for deleting customer account
Route::delete('/delete-customer/{id}', [AdminTableController::class, 'delete_customer_account_table'])->name('delete_customer_account_table_route');


#Route for customer account
Route::get('/customer-account', function () {
    return view('content.customer_account');
})->name('customer-account');

#Route for refund product tickets
Route::get('/refund-product-tickets', function () {
    return view('content.refund_tickets');
})->name('refund-product-tickets');

#Route for refund product list
Route::get('/refund-product-list', function () {
    return view('content.refund_list');
})->name('refund-product-list');

#Route for manage product
Route::get('/manage-product', [ProductController::class, 'product_table'])->name('manage-product');

#Route for add product
Route::get('/add-product', function () {
    return view('content.add_product');
})->name('add-product');


# Route for fetching categories
Route::get('/add-product', [ProductController::class, 'show_category'])->name('add-product');

# Route for Add Product submission
Route::post('/add-product', [ProductController::class, 'add_product'])->name('add-product');

# Route for edit product
Route::get('/edit-product/{product_id}', [ProductController::class, 'edit_product'])->name('edit-product');

# Route for update product
Route::put('/update-product/{product_id}', [ProductController::class, 'update_product'])->name('update-product');

# Route for deleting customer account
Route::delete('/delete-product/{product_id}', [ProductController::class, 'delete_product'])->name('delete-product');

#Route for account logs

Route::get('/admin-logs', function () {
    return view('content.admin_logs');
})->name('admin-logs');

#Route for product logs
Route::get('/admin-product-logs', function () {
    return view('content.product_logs');
})->name('admin-product-logs');

#Route for order logs
Route::get('/order-logs', function () {
    return view('content.order_logs');
})->name('order-logs');

#Route for reports
Route::get('/admin-report', function () {
    return view('content.report');
})->name('admin-report');

#Route for deleting customer account
Route::delete('/delete-customer/{id}', [AdminTableController::class, 'delete_customer_account_table'])->name('delete_customer_account_table_route');

