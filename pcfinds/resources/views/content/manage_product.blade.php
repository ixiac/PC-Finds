@extends('paging.admin')

@section('content')

    <div class="container">
        <div class="row">
            <h3 class="mb-4" style="color: #2fa572;">Product List</h3>

            @if (Auth::user()->role == 3)

                <a href="{{ ('add-product') }}" class="btn btn-primary btn-sm add-btn position-absolute border-0"
                    style="width: 140px; margin-top: 58px; right: 280px; background-color: #2fa572;">Add New Product</a>

                <a href="{{ ('admin-product-logs') }}" class="btn btn-primary btn-sm add-btn position-absolute border-0"
                    style="width: 120px; margin-top: 58px; right: 430px; background-color: #2fa572;">Product Logs</a>

            @endif

            <table id="productTable" class="table table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>Product ID</th>
                        <th>Product Name</th>
                        <th>Category</th>
                        <th>Retail</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Date Created</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->product_id }}</td>
                            <td>{{ $product->product_name }}</td>
                            <td>{{ $product->category->category_name ?? 'No Category' }}</td>
                            <td>${{ number_format($product->retail_price, 2) }}</td>
                            <td>${{ number_format($product->selling_price, 2) }}</td>
                            <td>{{ $product->quantity }}</td>
                            <td>{{ $product->date_added }}</td>
                            <td>
                                <a href="{{ route('edit-product', $product->product_id) }}"
                                    class="btn btn-success btn-sm">Edit</a>
                                <form action="{{ route('delete-product', $product->product_id) }}" method="POST"
                                    class="d-inline-block delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function () {
            $('#productTable').DataTable({
                "paging": true,
                "searching": true,
                "ordering": true,
                "info": true
            });

            // SweetAlert delete confirmation for delete forms.
            $('.delete-form').on('submit', function (e) {
                e.preventDefault(); // Prevent the form from submitting immediately.
                var form = this;
                Swal.fire({
                    title: 'Are you sure you want to delete this account?',
                    text: "This action cannot be undone.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>


    <!-- SweetAlert for success message after editing/updating -->
    @if(session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                    title: 'Success!',
                    text: '{{ session("success") }}',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 2000
                });
            });
        </script>
    @endif

    <!-- SweetAlert for successful deletion -->
    @if(session('deleted'))
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                    title: 'Deleted!',
                    text: '{{ session("deleted") }}',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 2000
                });
            });
        </script>
    @endif

@endsection