<?php

use App\Http\Controllers\AdminTableController;
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

#Route for editing admin account
Route::get('/edit-admin/{id}', [AdminTableController::class, 'edit_admin_account_table'])->name('edit_admin_account_table_route');

# Route for updating admin account
Route::put('/update-admin/{id}', [AdminTableController::class, 'update_admin_account_table'])->name('update_admin_account_table_route');

#Route for deleting admin account
Route::delete('/delete-admin/{id}', [AdminTableController::class, 'delete_admin_account_table'])->name('delete_admin_account_table_route');

#Customer Accounts

#Route for customer table
Route::get('/customer-table', [AdminTableController::class, 'customer_account_table'])->name('customer-table');

#Route for editing customer account
Route::get('/edit-customer/{id}', [AdminTableController::class, 'edit_customer_account_table'])->name('edit_customer_account_table_route');

# Route for updating customer account
Route::put('/update-customer/{id}', [AdminTableController::class, 'update_customer_account_table'])->name('update_customer_account_table_route');


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
Route::get('/manage-product', function () {
    return view('content.manage_product');
})->name('manage-product');

#Route for add product
Route::get('/add-product', function () {
    return view('content.add_product');
})->name('add-product');

#Route for account logs
Route::get('/admin-logs', function () {
    return view('content.admin_logs');
})->name('admin-logs');

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

