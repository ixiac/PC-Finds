<header class="mb-3" style="padding: 0;">

    <div class="d-flex flex-row justify-content-between pe-3" style="padding-top: 35px;">

        <div>
            <h1 class="text-light ms-3">Admin Control Panel</h1>
        </div>

        <div class="d-flex flex-row column-gap-3">
            <!-- Username and role displayed -->
            <p class="text-light text-end">

                {{ Auth::user()->username }} <br> @if (Auth::user()->role == 2)
                    (Admin)
                @endif

                @if (Auth::user()->role == 3)
                    (Super Admin)
                @endif

            </p>

            <!-- Avatar and dropdown -->
            <div class="dropdown">
                <img src="{{ Auth::user()->image }}" alt="pic" class="object-fit-cover rounded-5" style="width: 50px; height: 50px; margin: 0 20px 0 0;
                    border: solid 2px white;" id="userDropdownButton" data-bs-toggle="dropdown" aria-expanded="false">
                <ul class="dropdown-menu mt-1" aria-labelledby="userDropdownButton">
                    @auth
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item">Sign-out</button>
                            </form>
                        </li>
                    @endauth
                </ul>

            </div>

        </div>

    </div>

</header>

<style>
    #userDropdownButton {
        transition: filter 0.3s ease;
    }

    #userDropdownButton:hover {
        filter: brightness(65%);
        /* Slightly darkens the image */
        cursor: pointer;
    }
</style>