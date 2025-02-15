<nav class="sidebar bg-dark vh-100 position-fixed">
    <div class="sidebar-header text-center py-3">
        <a href="{{ route('dashboard') }}">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="logo img-fluid">
        </a>
    </div>

    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link text-light" href="{{ route('dashboard') }}">
                <i class="bi bi-house-door"></i> Dashboard
            </a>
        </li>

        <!-- @if($user->role === 'admin') -->
            <li class="nav-item">
                <a class="nav-link text-light" href="{{ route('manage.users') }}">
                    <i class="bi bi-people"></i> Manage Users
                </a>
            </li>
        <!-- @endif -->

        <li class="nav-item">
            <a class="nav-link text-light" href="{{ route('profile') }}">
                <i class="bi bi-person"></i> Profile
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link text-light" href="{{ route('logout') }}">
                <i class="bi bi-box-arrow-right"></i> Logout
            </a>
        </li>
    </ul>
</nav>

<style>
    .sidebar {
        width: 250px;
        transition: all 0.3s;
    }
    .sidebar .logo {
        max-width: 150px;
    }
    .sidebar a.nav-link:hover {
        background-color: rgba(255, 255, 255, 0.1);
    }
</style>
