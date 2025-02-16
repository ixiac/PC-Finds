<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Control Panel - PC Finds</title>
    <!-- Include Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="{{ asset('/css/admin.css') }}">
</head>

<body>

    <div class="container-fluid">

        <div class="row">

            <!-- Sidebar -->
            <div class="col-md-2" style="background-color: #343a40;"">
                @include('layout.admin_sidebar')
            </div>

            <!-- Main Content -->
            <div class="col-md-10 d-flex flex-column justify-content-between" style="background-color: #343a40;">

                <!-- Header -->
                <div class="row g-0">
                    @include('layout.admin_header')
                </div>

                <!-- Content -->
                <div class="row g-0 flex-grow-1">
                    <div class="content overflow-y-auto" style="max-height: 550px;">
                        @yield('content')
                    </div>
                </div>

                <!-- Footer -->
                <div class="row g-0">
                    @include('layout.admin_footer')
            </div>

        </div>

    </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>