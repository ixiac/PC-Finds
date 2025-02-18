@extends('paging.admin')

@section('content')

    <div class="container">

        <div class="row">

            <h3 class="mb-4" style="color: #2fa572;">Product List</h3>

            <a href="{{ ('add-product') }}" class="btn btn-primary btn-sm add-btn position-absolute border-0"
                style="width: 140px; margin-top: 58px; right: 280px; background-color: #2fa572;">Add New Product</a>

            <a href="{{ ('admin-product-logs') }}" class="btn btn-primary btn-sm add-btn position-absolute border-0"
                style="width: 120px; margin-top: 58px; right: 430px; background-color: #2fa572;">Product Logs</a>

            <table id="productTable" class="table table-striped">

                <thead class="table-dark">

                    <tr>
                        <th>Product ID</th>
                        <th class="p-0"></th>
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

                    <tr>
                        <td class="align-middle">R12345</td>
                        <td class="p-1">
                            <img src="{{ asset('img/default_avatar.jpg') }}" alt="pic" style="max-height: 40px; border-radius: 50px;">
                        </td class="align-middle">
                        <td class="align-middle">Ryzen 5</td>
                        <td class="align-middle">CPU</td>
                        <td class="align-middle">$90.00</td>
                        <td class="align-middle">$100.00</td>
                        <td class="align-middle">200</td>
                        <td class="align-middle">2025-02-15</td>
                        <td class="align-middle text-center">
                            <button class="btn btn-success btn-sm">Edit</button>
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </td>
                    </tr>

                </tbody>

            </table>

        </div>

    </div>

    <script>

        $(document).ready(function () {
            $('#productTable').DataTable();
        });

    </script>

@endsection