<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use Illuminate\Support\Facades\Hash;

class RegistrationControl extends Controller
{
    public function account_register(Request $request)
    {
        $request->validate([
            'username' => [
                'required',
                'unique:account,username',
                'regex:/^[a-zA-Z0-9_-]+$/',
                'min:4',
                'max:20'
            ],
            'password' => [
                'required',
                'min:8',
                'max:16',
                'regex:/[a-z]/',
                'regex:/[A-Z]/',
                'regex:/[0-9]/',
                'regex:/[@$!%*?&]/',
                'confirmed'
            ],
            'first_name' => 'required|max:50',
            'last_name' => 'required|max:50',
            'email' => [
                'required',
                'email',
                'unique:account,email',
                'regex:/[@]/',
                'regex:/\.(com|net|org)$/'
            ],
            'sex' => 'required',
            'contact_number' => 'required|digits:11|unique:account,contact_number',
            'address' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            # Username
            'username.required' => 'Username is required.',
            'username.unique' => 'Username is taken.',
            'username.regex' => 'Only letters, numbers, _ and - allowed.',
            'username.min' => 'Must be at least 4 characters.',
            'username.max' => 'Cannot exceed 20 characters.',

            # Password
            'password.required' => 'Password is required.',
            'password.min' => 'Must be at least 8 characters.',
            'password.max' => 'Cannot exceed 16 characters.',
            'password.regex' => 'Must include uppercase, lowercase, number, and special character (@$!%*?&).',
            'password.confirmed' => 'Passwords do not match.',

            # First Name & Last Name
            'first_name.required' => 'First name is required.',
            'last_name.required' => 'Last name is required.',

            # Email
            'email.required' => 'Email is required.',
            'email.email' => 'Enter a valid email.',
            'email.unique' => 'Email is already registered.',
            'email.regex' => 'Email must contain "@" and end in .com, .net, or .org.',

            # Sex
            'sex.required' => 'Select a gender.',

            # Contact Number
            'contact_number.required' => 'Contact number is required.',
            'contact_number.digits' => 'Must be exactly 11 digits.',
            'contact_number.unique' => 'Contact Number is already used.',

            # Address
            'address.required' => 'Address is required.',

            # Image Upload
            'image.image' => 'File must be an image.',
            'image.mimes' => 'Only JPEG, PNG, JPG, and GIF allowed.',
            'image.max' => 'Max size is 2MB.',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $imageName);
            $imagePath = 'uploads/' . $imageName;
        } else {
            $imagePath = null;
        }

        # Insert into database
        $account = Account::create([
            'username' => strip_tags($request->username),
            'password' => Hash::make($request->password), // Hash password
            'role' => 1, // Default role
            'first_name' => strip_tags($request->first_name),
            'last_name' => strip_tags($request->last_name),
            'email' => strip_tags($request->email),
            'sex' => $request->sex,
            'contact_number' => $request->contact_number,
            'address' => strip_tags($request->address),
            'date_created' => now(),
            'image' => $imagePath,
        ]);

        return redirect()->route('account_register_route')->with('success', true);
    }

    public function admin_account_register(Request $request)
    {
        $request->validate([
            'username' => [
                'required',
                'unique:account,username',
                'regex:/^[a-zA-Z0-9_-]+$/',
                'min:4',
                'max:20'
            ],
            'password' => [
                'required',
                'min:8',
                'max:16',
                'regex:/[a-z]/',
                'regex:/[A-Z]/',
                'regex:/[0-9]/',
                'regex:/[@$!%*?&]/',
                'confirmed'
            ],
            'first_name' => 'required|max:50',
            'last_name' => 'required|max:50',
            'email' => [
                'required',
                'email',
                'unique:account,email',
                'regex:/[@]/',
                'regex:/\.(com|net|org)$/'
            ],
            'sex' => 'required',
            'contact_number' => 'required|digits:11',
            'address' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            # Username
            'username.required' => 'The username is required.',
            'username.unique' => 'This username is already taken.',
            'username.regex' => 'The username can only contain letters, numbers, _ and -.',
            'username.min' => 'The username must be at least 4 characters long.',
            'username.max' => 'The username cannot be more than 20 characters long.',

            # Password
            'password.required' => 'The password is required.',
            'password.min' => 'The password must be at least 8 characters long.',
            'password.max' => 'The password cannot be more than 16 characters long.',
            'password.regex' => 'The password must include at least one lowercase, one uppercase, one number, and one special character (@$!%*?&).',
            'password.confirmed' => 'The password confirmation does not match.',

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

            # Image Upload
            'image.image' => 'The uploaded file must be an image.',
            'image.mimes' => 'Only JPEG, PNG, JPG, and GIF formats are allowed.',
            'image.max' => 'The image size must not exceed 2MB.',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $imageName);
            $imagePath = 'uploads/' . $imageName;
        } else {
            $imagePath = null;
        }

        # Insert into database
        $account = Account::create([
            'username' => strip_tags($request->username),
            'password' => Hash::make($request->password), // Hash password
            'role' => 2, // Default role
            'first_name' => strip_tags($request->first_name),
            'last_name' => strip_tags($request->last_name),
            'email' => strip_tags($request->email),
            'sex' => $request->sex,
            'contact_number' => $request->contact_number,
            'address' => strip_tags($request->address),
            'date_created' => now(),
            'image' => $imagePath,
        ]);

        return redirect()->route('add-admin')->with('success', 'Form submitted successfully!');
    }
}
