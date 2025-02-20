@extends('paging.admin')

@section('content')

    <div class="container-fluid">

        <a href="{{ route('manage-product') }}" class="btn text-light">
            <i class="bi bi-arrow-left"></i> Go Back
        </a>

        <div class="d-flex justify-content-center">

            <div class="px-5 py-1 rounded-2 mb-5"
                style="width:600px; border: solid 1px; border-color: rgba(255, 255, 255, 0.2) !important;">

                <form action="{{ route('update-product', $product->product_id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <p class="d-flex fw-bold mb-3 justify-content-center"
                        style="color: #2FA572; font-size: 32px; margin: 0;">Edit Product</p>

                    <!-- Product Name Field -->
                    <div class="mb-2">
                        <label for="productName" class="form-label"
                            style="color: white; margin: 0; font-size: 14px;">Product Name</label>
                        <!-- Product Name Field -->
                        <input type="text" class="d-inline-block form-control" id="productName" name="product_name"
                            style="height: 26px; font-size: 12px;" value="{{ $product->product_name }}" required
                            @if(Auth::user()->role == 2) disabled @endif>
                        @error('product_name')
                            <div class="text-danger" style="font-size: 12px;">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Retail and Selling Price Fields -->
                    <div class="mb-2 row">

                        <div class="col-md-6">
                            <label for="retailPrice" class="form-label text-white" style="font-size: 14px;">Retail
                                Price</label>
                            <input type="text" class="form-control" id="retailPrice" name="retail_price"
                                style="height: 26px; font-size: 12px;" value="{{ $product->retail_price }}" required
                                @if(Auth::user()->role == 2) disabled @endif>
                            @error('retail_price')
                                <div class="text-danger" style="font-size: 12px;">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="sellingPrice" class="form-label text-white" style="font-size: 14px;">Selling
                                Price</label>
                            <input type="text" class="form-control" id="sellingPrice" name="selling_price"
                                style="height: 26px; font-size: 12px;" value="{{ $product->selling_price }}" required
                                @if(Auth::user()->role == 2) disabled @endif>
                            @error('selling_price')
                                <div class="text-danger" style="font-size: 12px;">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>

                    <!-- Product Stock Field -->
                    <div class="mb-2">
                        <label for="productStock" class="form-label" style="color: white; margin: 0; font-size: 14px;">Add
                            stocks</label>
                        <input type="number" class="d-inline-block form-control"
                            placeholder=" Current Total: {{ $product->quantity }}" id="productStock" name="quantity"
                            style="height: 26px; font-size: 12px;">
                        @error('quantity')
                            <div class="text-danger" style="font-size: 12px;">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Category Field -->
                    <div class="mb-2">
                        <label for="Category" class="form-label"
                            style="color: white; margin: 0; font-size: 14px;">Category</label>
                        <select class="d-inline-block form-select" id="Category"
                            style="height: 26px; font-size: 12px; padding: 1px 0 0 10px;" name="category_id" required
                            @if(Auth::user()->role == 2) disabled @endif>
                            @foreach ($categories as $category)
                                <option value="{{ $category->category_id }}" {{ $product->category_id == $category->category_id ? 'selected' : '' }}>
                                    {{ $category->category_name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="text-danger" style="font-size: 12px;">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-2">
                        <label for="productDescription" class="form-label"
                            style="color: white; margin: 0; font-size: 14px;">Product Description</label>
                        <textarea class="d-inline-block form-control" id="productDescription" name="description"
                            style="height: 150px; font-size: 12px; resize: vertical;" required @if(Auth::user()->role == 2)
                            disabled @endif>{{ old('description', $product->description ?? '') }}</textarea>
                        @error('description')
                            <div class="text-danger" style="font-size: 12px;">{{ $message }}</div>
                        @enderror
                    </div>


                    <!-- Image Preview -->
                    <div class="mt-4 mb-2 text-center">
                        <img class="img-fluid rounded-3" id="imagePreview" src="{{ asset($product->image) }}"
                            alt="Image Preview"
                            style="width: 100%; max-height: 200px; object-fit: contain; border: 1px solid #ccc;">
                    </div>

                    <!-- Product Image Field -->
                    <div class="mb-1">
                        <label for="productImage" class="form-label" style="color: white; margin: 0; font-size: 14px;"
                            @if(Auth::user()->role == 2) hidden @endif>Change
                            Image</label>
                        <input type="file" class="form-control pt-1" name="image" id="productImage"
                            style="height: 26px; font-size: 12px; color: grey;" accept="image/*"
                            onchange="previewImage(event)" @if(Auth::user()->role == 2) hidden @endif>
                        @error('image')
                            <div class="text-danger" style="font-size: 12px;">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Add Button -->
                    <div class="d-flex mb-3 justify-content-center" style="margin-top: 40px;">
                        <button type="submit" class="btn btn-primary border-0 pt-1"
                            style="width: 160px; background-color: #2FA572; color: white; font-size: 16px;">Update
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
                // If no file is selected, revert back to the original saved image or placeholder.
                imagePreview.src = "{{ $product->image }}";
            }
        }
    </script>

    @if(session('success'))

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script>
            document.addEventListener("DOMContentLoaded", function () {
                Swal.fire({
                    title: "Product Updated!",
                    text: "The product has been successfully updated.",
                    icon: "success",
                    showConfirmButton: false,
                    allowOutsideClick: false,
                    timer: 2000
                }).then(() => {
                    window.location.href = "{{ route('manage-product') }}";
                });
            });
        </script>

    @endif

@endsection