<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

    <div class="container-fluid" style="margin: 0 100px;">

        <a class="navbar-brand mb-2" href="#" style="height: 50px; margin-left: -15px;">
            <img src="{{ asset('images/PC_FINDS_Logo.png') }}" alt="PC Find Logo">
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">

            <ul class="navbar-nav mr-auto">

                <li class="nav-item">
                    <a class="nav-link <?php if ($active == "home") {
                    echo "active";
                } ?>" href="{{ url(path: '/') }}">Home</a>
                </li>

                <li class="nav-item <?php if ($active == "products") {
                    echo "active";
                } ?>">
                    <a class="nav-link" href="{{ url('/products_page') }}">Products</a>
                </li>

            </ul>

            <ul class="navbar-nav ml-auto" style="margin-left: auto;">
                
                <li class="nav-item">
                    <a class="nav-link" href="#about">Sign-up</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#contact">Sign-in</a>
                </li>

                @if (Route::has('login'))
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/dashboard') }}">Dashboard</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Log in</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">Register</a>
                            </li>
                        @endif
                    @endauth
                @endif

            </ul>

        </div>
        
</nav>