<nav class="sidebar vh-100 border-end pt-2"
    style="transition: all 0.3s; background-color: #343A40; border-color: rgba(255, 255, 255, 0.2) !important; padding: 0 12px 0 0;">

    <div class="sidebar-header text-center py-3 mb-3">

        <a href="{{ route('admin-dashboard') }}">
            <img src="{{ asset('img/PC Finds - Logo.png') }}" alt="Logo" class="logo img-fluid"
                style="max-width: 85% !important;">
        </a>

    </div>

    <ul class="nav flex-column row-gap-3">

        <li class="nav-item">

            <a class="nav-link text-light" href="{{ route('admin-dashboard') }}">
                <i class="bi bi-house-door"></i> Dashboard
            </a>

        </li>

        <li class="nav-item">

            <a class="nav-link text-light d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
                href="#manageUsersCollapse" role="button" aria-expanded="false" aria-controls="manageUsersCollapse">
                <span><i class="bi bi-people"></i> Manage Users</span>
                <i class="bi bi-chevron-down"></i>
            </a>

            <div class="collapse" id="manageUsersCollapse">
                <ul class="list-unstyled ps-3 submenu">
                    <li><a class="nav-link text-light submenu-item" href="{{ route('admin-table') }}">Admin Account</a></li>
                    <li><a class="nav-link text-light submenu-item" href="{{ route('customer-table') }}">Customer</a></li>
                </ul>
            </div>

        </li>

        <li class="nav-item">

            <a class="nav-link text-light d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
                href="#refundCollapse" role="button" aria-expanded="false" aria-controls="refundCollapse">
                <span><i class="bi bi-cart-x"></i> Refund</span>
                <i class="bi bi-chevron-down"></i>
            </a>

            <div class="collapse" id="refundCollapse">
                <ul class="list-unstyled ps-3 submenu">
                    <li>
                        <a class="nav-link text-light submenu-item" href="{{ ('refund-product-tickets') }}">Refund
                            Tickets</a>
                    </li>
                    <li>
                        <a class="nav-link text-light submenu-item" href="{{ ('refund-product-list') }}">Refund List</a>
                    </li>
                </ul>
            </div>

        </li>
        
        <li class="nav-item">

            <a class="nav-link text-light" href="{{ route('manage-product') }}">
                <i class="bi bi-boxes"></i> Manage Product
            </a>

        </li>

        <li class="nav-item">

            <a class="nav-link text-light" href="{{ route('admin-logs') }}">
                <i class="bi bi-list-check"></i> Logs
            </a>

        </li>

    </ul>

</nav>

<style>
    .sidebar a.nav-link:hover {
        border-radius: 10px;
        background-color: rgba(255, 255, 255, 0.1);
    }

    .rotate-180 {
        transform: rotate(180deg);
        transition: transform 0.3s ease;
    }

    .submenu-item {
        opacity: 0;
        transform: translateY(-5px);
        transition: opacity 0.3s ease, transform 0.5s ease;
    }

    .show .submenu-item {
        opacity: 1;
        transform: translateY(0);
    }
</style>

<script>

    document.addEventListener("DOMContentLoaded", function () {
        let manageUsersLink = document.querySelector('[href="#manageUsersCollapse"]');
        let arrowIcon = manageUsersLink.querySelector('.bi-chevron-down');

        manageUsersLink.addEventListener("click", function () {
            arrowIcon.classList.toggle("rotate-180");
        });
    });

</script>