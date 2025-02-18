<header class="mb-3" style="padding: 0;">
    <div class="d-flex flex-row justify-content-between pe-3" style="padding-top: 35px;">
        <div>
            <h1 class="text-light ms-3">Admin Control Panel</h1>
        </div>

        <div class="d-flex flex-row column-gap-5">
            <!-- Username and role displayed -->
            <p class="text-light">
                Username <br> Role
            </p>

            <!-- Avatar and dropdown -->
            <div class="dropdown">
                <img src="{{ asset('img/default_avatar.jpg') }}" alt="pic" style="max-width: 50px; max-height: 50px; border-radius: 50px; margin: 0 20px 0 0;" id="userDropdownButton" data-bs-toggle="dropdown" aria-expanded="false">
                <ul class="dropdown-menu mt-1" aria-labelledby="userDropdownButton">
                    <li><a class="dropdown-item" href="logout.php">Sign-out</a></li>
                </ul>
            </div>
        </div>
    </div>
</header>
