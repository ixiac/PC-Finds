@extends('paging.admin')

@section('content')

    <div class="container-fluid">

        <a href="{{ ('manage-product') }}" class="btn text-light">
            <i class="bi bi-arrow-left"></i> Go Back
        </a>

        <div class="d-flex justify-content-center">

            <div class="px-5 py-1 rounded-2 mb-5"
                style="width:600px; border: solid 1px; border-color: rgba(255, 255, 255, 0.2) !important;">

                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf

                    <p class="d-flex fw-bold mb-3 justify-content-center"
                        style="color: #2FA572; font-size: 32px; margin: 0;">Add Product</p>

                    <!-- Product Name Field -->
                    <div class="mb-2">
                        <label for="productName" class="form-label"
                            style="color: white; margin: 0; font-size: 14px;">Product
                            Name</label>
                        <input type="text" class="d-inline-block form-control" id="productName" name="product_name"
                            style="height: 26px; font-size: 12px;" required>
                    </div>

                    <!-- Retail and Selling Price Field -->
                    <div class="mb-2 row">

                        <div class="col-md-6">
                            <label for="retailPrice" class="form-label text-white" style="font-size: 14px;">Retail Price</label>
                            <input type="text" class="form-control" id="retailPrice" name="retail_price"
                                style="height: 26px; font-size: 12px;" required>
                        </div>

                        <div class="col-md-6">
                            <label for="sellingPrice" class="form-label text-white" style="font-size: 14px;">Selling Price</label>
                            <input type="text" class="form-control" id="sellingPrice" name="selling_price"
                                style="height: 26px; font-size: 12px;" required>
                        </div>

                    </div>

                    <!-- Product Stock Price Field -->
                    <div class="mb-2">
                        <label for="productStock" class="form-label"
                            style="color: white; margin: 0; font-size: 14px;">Stock</label>
                        <input type="number" class="d-inline-block form-control" id="productStock" name="product_stock"
                            style="height: 26px; font-size: 12px;" required>
                    </div>

                    <!-- Category Field -->
                    <div>
                        <label for="Category" class="form-label"
                            style="color: white; margin: 0; font-size: 14px;">Category</label>
                        <select class="d-inline-block form-select" id="Category"
                            style="height: 26px; font-size: 12px; padding: 1px 0 0 10px;" name="Category" required>
                            <option selected>Select Category</option>
                            <option value="">CPU</option>
                            <option value="">GPU</option>
                        </select>
                    </div>

                    <!-- Image Preview -->
                    <div class="mt-4 mb-2 text-center">
                        <img class="img-fluid rounded-3" id="imagePreview"
                            src="https://media.istockphoto.com/id/1147544807/vector/thumbnail-image-vector-graphic.jpg?s=612x612&w=0&k=20&c=rnCKVbdxqkjlcs3xH87-9gocETqpspHFXu5dIGB4wuM="
                            alt="Image Preview"
                            style="width: 100%; max-height: 200px; object-fit: cover; border: 1px solid #ccc;">
                    </div>

                    <!-- Product Image Field -->
                    <div class="mb-1">
                        <label for="productImage" class="form-label" style="color: white; margin: 0; font-size: 14px;">Add
                            Image</label>
                        <input type="file" class="form-control pt-1" name="product_image" id="productImage"
                            style="height: 26px; font-size: 12px; color: grey;" accept="image/*"
                            onchange="previewImage(event)">
                    </div>

                    <!-- Add Button -->
                    <div class="d-flex mb-3 justify-content-center" style="margin-top: 40px;">
                        <button type="submit" class="btn btn-primary border-0 pt-1"
                            style="width: 160px; background-color: #2FA572; color: white; font-size: 16px;">Add
                            Product</button>
                    </div>

                </form>

            </div>

        </div>

    </div>

    <script>

        function previewImage(event) {
            const file = event.target.files[0];
            const reader = new FileReader();
            const imagePreview = document.getElementById('imagePreview');

            reader.onload = function () {
                imagePreview.src = reader.result;
            }

            if (file) {
                reader.readAsDataURL(file);
            } else {
                imagePreview.src = "https://media.istockphoto.com/id/1147544807/vector/thumbnail-image-vector-graphic.jpg?s=612x612&w=0&k=20&c=rnCKVbdxqkjlcs3xH87-9gocETqpspHFXu5dIGB4wuM="; // Reset to placeholder
            }
        }

    </script>

@endsection