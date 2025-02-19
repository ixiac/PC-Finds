@php 
    $active = "products";
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layout.head')

    <link rel="stylesheet" href="{{ asset('css/products_page.css') }}">
</head>

<body>
    <div class="container-fluid">

        <div class="row">
            @include('layout.navbar')
        </div>

        <div class="row">
            @yield('content')
        </div>

        <div class="row">
            @include('layout.footer')
        </div>

    </div>



    <!-- Bootstrap & jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function () {
            $("#searchBox").on("keyup", function () {
                var searchText = $(this).val().toLowerCase();
                var hasResults = false;

                if (searchText.length > 0) {
                    $("#defaultView, #promoBanner, #categoryProducts").hide();
                    $("#searchResults").empty().show().addClass('product-grid');

                    $(".product-card").each(function () {
                        var productName = $(this).data("name");
                        if (productName.includes(searchText)) {
                            var clonedCard = $(this).clone();
                            $("#searchResults").append(clonedCard);
                            hasResults = true;
                        }
                    });

                    if (!hasResults) {
                        $("#searchResults").html("<p class='text-center'>No products found.</p>");
                    }
                } else {
                    $("#searchResults").hide().removeClass('product-grid');
                    $("#defaultView, #promoBanner").show();
                }
            });

            // "See All" Button Click
            $(".see-all").on("click", function () {
                var categoryName = $(this).data("category");
                var categoryId = $(this).data("category-id");

                $("#defaultView, #promoBanner, #searchResults").hide();
                $("#categoryProducts").show();
                $("#categoryTitle").text(categoryName);

                $.ajax({
                    url: "/getCategoryProducts/" + categoryId,
                    type: "GET",
                    success: function (data) {
                        $("#allProducts").html(data);
                    }
                });
            });

            $("#backToCategories").on("click", function () {
                $("#categoryProducts, #searchResults").hide();
                $("#defaultView, #promoBanner").show();
            });

        });
    </script>

</body>

</html>