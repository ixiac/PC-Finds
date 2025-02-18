@extends('paging.admin')

@section('content')

    <div class="container-fluid">

        <a href="{{ ('manage-category') }}" class="btn text-light">
            <i class="bi bi-arrow-left"></i> Go Back
        </a>

        <div class="d-flex justify-content-center">

            <div class="px-5 py-1 rounded-2" style="width:600px; border: solid 1px; border-color: rgba(255, 255, 255, 0.2) !important;">

                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf

                    <p class="d-flex fw-bold mb-3 justify-content-center"
                        style="color: #2FA572; font-size: 32px; margin: 0;">Add Category</p>

                    <!-- Category Name Field -->
                    <div class="mb-2">
                        <label for="categoryName" class="form-label"
                            style="color: white; margin: 0; font-size: 14px;">Category
                            Name</label>
                        <input type="text" class="d-inline-block form-control" id="categoryName" name="category_name"
                            style="height: 26px; font-size: 12px;" required>
                    </div>

                    <!-- Image Preview -->
                    <div class="mt-4 mb-2 text-center">
                        <img class="img-fluid rounded-3" id="imagePreview"
                            src="https://media.istockphoto.com/id/1147544807/vector/thumbnail-image-vector-graphic.jpg?s=612x612&w=0&k=20&c=rnCKVbdxqkjlcs3xH87-9gocETqpspHFXu5dIGB4wuM="
                            alt="Image Preview"
                            style="width: 100%; max-height: 200px; object-fit: cover; border: 1px solid #ccc;">
                    </div>

                    <!-- category Image Field -->
                    <div class="mb-1">
                        <label for="categoryImage" class="form-label" style="color: white; margin: 0; font-size: 14px;">Add
                            Image</label>
                        <input type="file" class="form-control pt-1" name="category_image" id="categoryImage"
                            style="height: 26px; font-size: 12px; color: grey;" accept="image/*"
                            onchange="previewImage(event)">
                    </div>

                    <!-- Add Button -->
                    <div class="d-flex mb-3 justify-content-center" style="margin-top: 40px;">
                        <button type="submit" class="btn btn-primary border-0 pt-1"
                            style="width: 160px; background-color: #2FA572; color: white; font-size: 16px;">Add
                            Category</button>
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