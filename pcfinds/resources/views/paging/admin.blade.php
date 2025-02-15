<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super Admin Panel - PC Finds</title>
</head>

<body>

    @include('admin_header')
    @include('layouts.sidebar')

    <div class="content">
        @yield('content')  <!-- Dynamic content goes here -->
    </div>

    @include('layouts.footer')

</body>

</html>