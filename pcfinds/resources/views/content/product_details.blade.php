@php
    $product = DB::table('product')->where('product_id', $id)->first();
@endphp

@extends('products_page')

@section('content')

    <div class="container mt-5">
        <div class="go-back" style="margin-bottom: 100px;">
            <a style="color: #2fa572;" href="{{ ('product-page') }}">← Go Back</a>
        </div>
        <div class="row">
            <!-- Product Image -->
            <div class="col-md-6">
                <div class="container-fluid" style="border: 1px solid #2fa572; border-radius: 10px; padding: 10px; width: 500px;  height: 400px;">
                    <img src="{{ asset('images/' . $product->image) }}" class="img-fluid"
                        style="width: 480px; height: 380px;" alt="{{ $product->product_name }}">
                </div>
            </div>

            <!-- Product Details -->
            <div class="col-md-6">
                <h1 class="mt-5">{{ $product->product_name }}</h1>
                <h2 class="text-success mt-3">₱{{ number_format($product->selling_price, 2) }}</h2>
                <p class="mt-3">{{ $product->description }}</p>

                <button class="btn btn-lg add-to-cart mt-3" style="background-color: #2fa572; color: white" data-id="{{ $product->product_id }}">Add to
                    Cart</button>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $(".add-to-cart").on("click", function () {
                var productId = $(this).data("id");

                $.ajax({
                    url: "/add-to-cart",
                    type: "POST",
                    data: {
                        product_id: productId,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function (response) {
                        alert("Product added to cart!");
                    },
                    error: function () {
                        alert("Failed to add product to cart.");
                    }
                });
            });
        });
    </script>

@endsection