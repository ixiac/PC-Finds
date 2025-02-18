<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - PC Finds</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>

<body>
    <div class="container">

        <form action="{{ route('account_register_route') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row postion-relative">


                <div class="col-md-12 pt-3 position-absolute top-50 start-50 translate-middle rounded-3 shadow-sm border" style="background-color: #343a40; padding: 0 75px; width: 500px; max-height: 800px;">

                    <p class="d-flex justify-content-center fw-bold" style="color: #2FA572; font-size: 32px; margin: 0;">Sign Up</p>

                    <!-- First Name and Last Name Field -->
                    <div class="mb-2 d-flex flex-row column-gap-3">

                        <div>
                            <label for="firstName" class="form-label" style="color: white; margin: 0; font-size: 14px;">First Name</label>
                            <input type="text" class="d-inline-block form-control" id="firstName" style="height: 26px; font-size: 12px;" name="first_name" style="height: 30px" value="{{ old('first_name') }}" required>
                            @error('first_name')<span class="text-danger" style="color: red; font-size: 12px;">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label for="lastName" class="form-label" style="color: white; margin: 0; font-size: 14px;">Last Name</label>
                            <input type="text" class="d-inline-block form-control" id="lastName" style="height: 26px; font-size: 12px;" name="last_name" value="{{ old('last_name') }}" required>
                            @error('last_name')<span class="text-danger" style="color: red; font-size: 12px;">{{ $message }}</span> @enderror
                        </div>

                    </div>

                    <!-- Username Field -->
                    <div class="mb-2">
                        <label for="username" class="form-label" style="color: white; margin: 0; font-size: 14px;">Username</label>
                        <input type="text" class="d-inline-block form-control" id="username" name="username" style="height: 26px; font-size: 12px;" value="{{ old('username') }}" required>
                        @error('username')<span class="text-danger" style="color: red; font-size: 12px;">{{ $message }}</span> @enderror
                    </div>

                    <!-- Password Field -->
                    <div class="mb-2 position-relative">
                        <label for="password" class="form-label" style="color: white; margin: 0; font-size: 14px;">Password</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="password" style="height: 26px; font-size: 12px;" name="password" required>
                            <span class="input-group-text toggle-password" data-target="password" style="cursor: pointer; width: 26px; height: 26px; padding: 0 0 0 6px;">
                                <i class="bi bi-eye" style="font-size: 14px; color: grey;"></i>
                            </span>
                        </div>
                        @error('password')<span class="text-danger" style="color: red; font-size: 10px;">{{ $message }}</span> @enderror
                    </div>

                    <!-- Confirm Password Field -->
                    <div class="mb-2 position-relative">
                        <label for="confirmPassword" class="form-label" style="color: white; margin: 0; font-size: 14px;">Confirm Password</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="confirmPassword" style="height: 26px; font-size: 12px;" name="password_confirmation" required>
                            <span class="input-group-text toggle-password" data-target="confirmPassword" style="cursor: pointer; width: 26px; height: 26px; padding: 0 0 0 6px;"">
                                <i class=" bi bi-eye" style="font-size: 14px; color: grey;"></i>
                            </span>
                        </div>
                    </div>

                    <!-- Email Field -->
                    <div class="mb-1">
                        <label for="email" class="form-label" style="color: white; margin: 0; font-size: 14px;">Email Address</label>
                        <input type="email" class="form-control" id="email" style="height: 26px; font-size: 12px;" name="email" aria-describedby="emailHelp" value="{{ old('email') }}" required>
                        <span id="emailHelp" class="form-text" style="color: gray; font-size: 12px;">Please enter a valid email address.</span>
                        @error('email')<span class="text-danger" style="color: red; font-size: 12px;">{{ $message }}</span> @enderror
                    </div>

                    <!-- Contact Number and Sex Field -->
                    <div class="mb-2 d-flex flex-row column-gap-3">

                        <div style="width: 228px;">
                            <label for="contactNumber" class="form-label" style="color: white; margin: 0; font-size: 14px;">Contact Number</label>
                            <input type="number" class="d-inline-block form-control" id="contactNumber" style="width: 220px; height: 26px; font-size: 12px;" name="contact_number" value="{{ old('contact_number') }}" required>
                            @error('contact_number')<span class="text-danger" style="color: red; font-size: 12px;">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label for="sex" class="form-label" style="color: white; margin: 0; font-size: 14px;">Sex</label>
                            <select class="d-inline-block form-select pt-1" id="sex" style="width: 110px; height: 26px; font-size: 12px;" name="sex" value="{{ old('sex') }}" required>
                                <option selected>Select Sex</option>
                                <option value="M">Male</option>
                                <option value="F">Female</option>
                            </select>
                            @error('sex')<span class="text-danger" style="color: red; font-size: 12px;">{{ $message }}</span> @enderror
                        </div>

                    </div>

                    <!-- Address Field -->
                    <div class="mb-1">
                        <label for="address" class="form-label" style="color: white; margin: 0; font-size: 14px;">Address</label>
                        <input type="text" class="form-control" id="address" style="height: 26px; font-size: 12px;" name="address" aria-describedby="addressHelp" value="{{ old('address') }}" required>
                        <span id="addressHelp" class="form-text" style="color: gray; font-size: 12px;">Enter your complete and accurate address.</span>
                        @error('address')<span class="text-danger" style="color: red; font-size: 12px;">{{ $message }}</span> @enderror
                    </div>

                    <!-- Profile Picture Field -->
                    <div class="mb-1">
                        <label for="profilePicture" class="form-label" style="color: white; margin: 0; font-size: 14px;">Add a Profile Pic</label>
                        <input type="file" class="form-control pt-1" name="image" id="profilePicture" style=" height: 30px; font-size: 12px; color: grey;" accept="image/*" value="{{ old('image') }}">
                        @error('image')<span class="text-danger" style="color: red; font-size: 12px;">{{ $message }}</span> @enderror
                    </div>

                    <!-- Signup Button -->
                    <div class="d-flex justify-content-center" style="margin-top: 40px;">
                        <button type="submit" class="btn btn-primary border-0 pt-1" style="width: 160px; background-color: #2FA572; color: white; font-size: 16px;">Create account</button>
                    </div>

                    <p class="mt-2" style="color: white; font-size: 12px;">Already have an account? <a href="{{ route('sign-in')}}" style="color: #2FA572;">Sign In</a></p>

                </div>

            </div>

        </form>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    @if(session('success'))

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            Swal.fire({
                title: "Registration Successful!",
                text: "You have successfully registered. Click OK to sign in.",
                icon: "success",
                confirmButtonText: "OK",
                allowOutsideClick: false
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "{{ route('sign-in') }}"; // Change 'sign_in' to your actual sign-in route
                }
            });
        });
    </script>
    @endif

    <script>
        document.querySelectorAll(".toggle-password").forEach(function(element) {
            element.addEventListener("click", function() {
                let targetId = this.getAttribute("data-target");
                let passwordInput = document.getElementById(targetId);
                let icon = this.querySelector("i");

                if (passwordInput.type === "password") {
                    passwordInput.type = "text";
                    icon.classList.remove("bi-eye");
                    icon.classList.add("bi-eye-slash");
                } else {
                    passwordInput.type = "password";
                    icon.classList.remove("bi-eye-slash");
                    icon.classList.add("bi-eye");
                }
            });
        });
    </script>

</body>

</html>