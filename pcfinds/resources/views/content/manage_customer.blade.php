@extends('paging.admin')

@section('content')

    <div class="container-fluid">

        <div class="row px-5">

            <form action="" method="POST" enctype="multipart/form-data">
                @csrf

                <p class="d-flex justify-content-center fw-bold mb-3" style="color: #2FA572; font-size: 32px; margin: 0;">Admin
                    Sign
                    Up</p>

                <!-- First Name and Last Name Field -->
                <div class="mb-2 row">

                    <div class="col-md-6">
                        <label for="firstName" class="form-label text-white" style="font-size: 14px;">First Name</label>
                        <input type="text" class="form-control" id="firstName" name="first_name"
                            style="height: 26px; font-size: 12px;" required>
                    </div>

                    <div class="col-md-6">
                        <label for="lastName" class="form-label text-white" style="font-size: 14px;">Last Name</label>
                        <input type="text" class="form-control" id="lastName" name="last_name"
                            style="height: 26px; font-size: 12px;" required>
                    </div>

                </div>

                <!-- Username Field -->
                <div class="mb-2">
                    <label for="username" class="form-label"
                        style="color: white; margin: 0; font-size: 14px;">Username</label>
                    <input type="text" class="d-inline-block form-control" id="username" name="username"
                        style="height: 26px; font-size: 12px;" required>
                </div>

                <!-- Password Field -->
                <div class="mb-2 position-relative">
                    <label for="password" class="form-label"
                        style="color: white; margin: 0; font-size: 14px;">Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="password" style="height: 26px; font-size: 12px;"
                            name="password" required>
                        <span class="input-group-text toggle-password" data-target="password"
                            style="cursor: pointer; width: 26px; height: 26px; padding: 0 0 0 6px;">
                            <i class="bi bi-eye" style="font-size: 14px; color: grey;"></i>
                        </span>
                    </div>
                </div>

                <!-- Confirm Password Field -->
                <div class="mb-2 position-relative">
                    <label for="confirmPassword" class="form-label"
                        style="color: white; margin: 0; font-size: 14px;">Confirm
                        Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="confirmPassword"
                            style="height: 26px; font-size: 12px;" name="confirmPassword" required>
                        <span class="input-group-text toggle-password" data-target="confirmPassword"
                            style="cursor: pointer; width: 26px; height: 26px; padding: 0 0 0 6px;"">
                                                                <i class=" bi bi-eye"
                            style="font-size: 14px; color: grey;"></i>
                        </span>
                    </div>
                </div>

                <!-- Email Field -->
                <div class="mb-1">

                    <label for="email" class="form-label" style="color: white; margin: 0; font-size: 14px;">Email
                        Address</label>
                    <input type="email" class="form-control" id="email" style="height: 26px; font-size: 12px;" name="email"
                        aria-describedby="emailHelp" required>
                    <span id="emailHelp" class="form-text" style="color: gray; font-size: 12px;">Please enter a valid email
                        address.</span>

                </div>

                <!-- Contact Number and Sex Field -->
                <div class="mb-2 row">

                    <div class="col-md-6">
                        <label for="contactNumber" class="form-label text-white" style="margin: 0; font-size: 14px;">Contact
                            Number</label>
                        <input type="number" class="form-control" id="contactNumber" name="contact_number"
                            style="height: 26px; font-size: 12px;" required>
                    </div>

                    <div class="col-md-6">
                        <label for="sex" class="form-label text-white" style="margin: 0; font-size: 14px;">Sex</label>
                        <select class="form-select pt-1" id="sex" name="sex" style="height: 26px; font-size: 12px;"
                            required>
                            <option selected>Select Sex</option>
                            <option value="M">Male</option>
                            <option value="F">Female</option>
                        </select>
                    </div>

                </div>

                <!-- Address Field -->
                <div class="mb-1">

                    <label for="address" class="form-label"
                        style="color: white; margin: 0; font-size: 14px;">Address</label>
                    <input type="text" class="form-control" id="address" style="height: 26px; font-size: 12px;"
                        name="address" aria-describedby="addressHelp" required>
                    <span id="addressHelp" class="form-text" style="color: gray; font-size: 12px;">Enter your complete and
                        accurate address.</span>

                </div>

                <!-- Profile Picture Field -->
                <div class="mb-1">
                    <label for="profilePicture" class="form-label" style="color: white; margin: 0; font-size: 14px;">Add a
                        Profile Pic</label>
                    <input type="file" class="form-control pt-1" name="profile_picture" id="profilePicture"
                        style=" height: 30px; font-size: 12px; color: grey;" accept="image/*">
                </div>

                <!-- Signup Button -->
                <div class="d-flex justify-content-center mb-3" style="margin-top: 40px;">
                    <button type="submit" class="btn btn-primary border-0 pt-1"
                        style="width: 160px; background-color: #2FA572; color: white; font-size: 16px;">Create
                        account</button>
                </div>

            </form>

        </div>

    </div>

@endsection