<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark vw-100">
    <div class="container-fluid" style="margin: 0 100px;">
        <a class="navbar-brand mb-2" href="#" style="height: 50px;">
            <img src="{{ asset('images/PC_FINDS_Logo.png') }}" alt="PC Find Logo">
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link {{ $active == 'home' ? 'active' : '' }}" href="{{ url('/') }}">Home</a>
                </li>

                <li class="nav-item {{ $active == 'products' ? 'active' : '' }}">
                    @auth
                        <a class="nav-link" href="{{ url('product-page') }}">Products</a>
                    @else
                        <a class="nav-link" href="javascript:void(0);" id="products-link">Products</a>
                    @endauth
                </li>
            </ul>

            <ul class="navbar-nav ml-auto" style="margin-left: auto;">
                <!-- Check if user is logged in -->
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->username }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item">Sign-out</button>
                            </form>
                        </div>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('sign-up') }}">Sign-up</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('sign-in') }}">Sign-in</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    document.getElementById('products-link').addEventListener('click', function(event) {
        event.preventDefault();

        Swal.fire({
            title: 'Sign-in Required',
            text: 'You must be signed in to view the Products page.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Sign-in',
            cancelButtonText: 'Cancel',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '{{ route('sign-in') }}';
            }
        });
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
