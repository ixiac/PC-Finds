<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Control Panel - PC Finds</title>
</head>

<body>
    <div class="row">

        <!-- Sidebar -->
        <div class="col-md-4">
            @include('layouts.admin_sidebar')
        </div>

        <div class="col-md-8">

            <!-- Header -->
            <div class="row">
                @include('layout.admin_header')
            </div>

            <!-- Content -->
            <div class="row">

                <div class="content">
                    @yield('content')
                </div>

            </div>

            <!-- Footer -->
            <div class="row">
                @include('layouts.footer')
            </div>

        </div>

    </div>

</body>

</html>