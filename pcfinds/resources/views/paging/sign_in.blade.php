<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In - PC Finds</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>

<body>
    <div class="container">

        <form action="" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row postion-relative">

                <div class="col-md-12 pt-5 position-absolute top-50 start-50 translate-middle rounded-3 shadow-sm border" style="background-color: #343a40; padding: 75px; width: 500px;">

                    <p class="d-flex justify-content-center fw-bold" style="color: #2FA572; font-size: 32px; margin: 0;">Sign In</p>

                    <!-- Username Field -->
                    <div class="my-2">
                        <label for="username" class="form-label" style="color: white; margin: 0; font-size: 14px;">Username</label>
                        <input type="text" class="d-inline-block form-control" id="username" name="username" style="height: 26px; font-size: 12px;" required>
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
                    </div>

                    <!-- Signup Button -->
                    <div class="d-flex justify-content-center" style="margin-top: 40px;">
                        <button type="submit" class="btn btn-primary border-0 pt-1" style="width: 160px; background-color: #2FA572; color: white; font-size: 16px;">Sign In</button>
                    </div>

                    <p class="mt-3" style="color: white; font-size: 12px;">Don't have an account? <a href="{{ route('sign-up') }}" style="color: #2FA572;">Sign Up</a></p>

                </div>

            </div>

        </form>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

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