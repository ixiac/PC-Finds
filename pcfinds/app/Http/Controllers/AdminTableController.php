<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use Validator;

class AdminTableController extends Controller
{
    public function admin_account_table()
    {
        $accounts = Account::where('role', 2)->get();

        return view('content.admin_table', compact('accounts'));
    }

    public function edit_admin_account_table($id)
    {
        $account = Account::findOrFail($id);
        return view('content.edit_admin', compact('account'));
    }

    public function update_admin_account_table(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'username' => [
                'required',
                'unique:account,username,' . $id,
                'regex:/^[a-zA-Z0-9_-]+$/',
                'min:4',
                'max:20'
            ],
            'email' => [
                'required',
                'email',
                'unique:account,email,' . $id,
                'regex:/[@]/',
                'regex:/\.(com|net|org)$/'
            ],
            'sex' => 'required',
            'contact_number' => 'required|numeric|digits:11',
            'address' => 'required|string|max:255',
        ], [
            # Username
            'username.required' => 'The username is required.',
            'username.unique' => 'This username is already taken.',
            'username.regex' => 'The username can only contain letters, numbers, _ and -.',
            'username.min' => 'The username must be at least 4 characters long.',
            'username.max' => 'The username cannot be more than 20 characters long.',

            # First Name & Last Name
            'first_name.required' => 'The first name is required.',
            'last_name.required' => 'The last name is required.',

            # Email
            'email.required' => 'The email address is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'This email is already registered.',
            'email.regex' => 'The email must contain "@" and end with ".com" or ".net" or ".org".',

            # Sex
            'sex.required' => 'Please select a gender.',

            # Contact Number
            'contact_number.required' => 'The contact number is required.',
            'contact_number.digits' => 'The contact number must be exactly 11 digits.',

            # Address
            'address.required' => 'The address is required.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Sanitize string inputs to prevent XSS or injection of HTML/PHP tags.
        $sanitized_data = [
            'first_name' => strip_tags($request->input('first_name')),
            'last_name' => strip_tags($request->input('last_name')),
            'username' => strip_tags($request->input('username')),
            'email' => strip_tags($request->input('email')),
            'sex' => $request->input('sex'), // Typically a select, so less risk.
            'contact_number' => $request->input('contact_number'),
            'address' => strip_tags($request->input('address')),
        ];

        // Find the account and update it with the sanitized data.
        $account = Account::findOrFail($id);
        $account->update($sanitized_data);

        return back()->with('success', 'Admin account updated successfully.');
    }

    public function delete_admin_account_table($id)
    {
        $account = Account::findOrFail($id);
        $account->delete();

        return back()->with('success', 'Admin account deleted successfully.');
    }
}
