@php

    use Illuminate\Support\Facades\DB;
    $product = DB::table('product')->where('product_id', $id)->first();

@endphp

@extends('customer.dashboard')

@section('content')

    <div class="container mt-5">
        <div class="go-back" style="margin-bottom: 100px;">
            <a style="color: #2fa572;" href="{{ url('product-page') }}">← Go Back</a>
        </div>
        <div class="row">
            <!-- Product Image -->
            <div class="col-md-6">
                <img src="{{ asset('images/' . $product->image) }}" class="img-fluid img-thumbnail"
                    style="width: 500px; height: 450px;" alt="{{ $product->product_name }}">
            </div>

            <!-- Product Details -->
            <div class="col-md-6">
                <h1 class="">{{ $product->product_name }}</h1>
                <h2 class="text-success mt-3">₱{{ number_format($product->selling_price, 2) }}</h2>
                <p class="mt-3">{{ $product->description }}</p>
                <p class="mt-3 text-secondary">Quantity Left: {{ $product->quantity }}</p>

                <div class="row">
                    <!-- Quantity Input -->
                    <div class="col-md-6 mt-3">
                        <label for="quantity">Quantity:</label>
                        <input type="number" id="quantity" class="form-control" value="1" min="1" style="width: 100px;">
                    </div>

                    <!-- Add to Cart Button -->
                    <div class="col-md-6 d-flex justify-content-end">
                        @if ($product->quantity > 0)
                            <button class="btn btn-lg add-to-cart"
                                style="background-color: #2fa572; color: white; margin-top: 45px;"
                                data-id="{{ $product->product_id }}">
                                Add to Cart
                            </button>
                        @else
                            <button class="btn btn-lg btn-outline-secondary"
                                style="background-color: rgb(244, 244, 244); color: #fb0d09; margin-top: 45px;" disabled>
                                Out of Stock
                            </button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- AJAX Script -->
    <script>
        $(document).ready(function () {
            $(".add-to-cart").on("click", function () {
                var productId = $(this).data("id");
                var quantity = $("#quantity").val();

                $.ajax({
                    url: "{{ url('/add-to-cart') }}",
                    type: "POST",
                    data: {
                        product_id: productId,
                        quantity: quantity,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function (response) {
                        Swal.fire({
                            icon: "success",
                            title: "Added to Cart!",
                            text: response.message,
                            showConfirmButton: false,
                            closeOnClickOutside: false,
                            timer: 1500
                        });
                    },
                    error: function (xhr) {
                        let errorMessage = "Failed to add product.";
                        if (xhr.responseJSON && xhr.responseJSON.error) {
                            errorMessage = xhr.responseJSON.error;
                        }

                        Swal.fire({
                            icon: "error",
                            title: "Error!",
                            text: errorMessage,
                            confirmButtonColor: "#d33"
                        });
                    }
                });
            });
        });
    </script>

@endsection