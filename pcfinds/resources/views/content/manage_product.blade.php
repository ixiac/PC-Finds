@extends('paging.admin')

@section('content')

    <div class="container">

        <div class="row">

            <h3 class="mb-4" style="color: #2fa572;">Product List</h3>

            <a href="{{ ('add-product') }}" class="btn btn-primary btn-sm add-btn position-absolute border-0"
                style="width: 140px; margin-top: 58px; right: 280px; background-color: #2fa572;">Add New Product</a>

            <a href="{{ ('add-product') }}" class="btn btn-primary btn-sm add-btn position-absolute border-0"
                style="width: 120px; margin-top: 58px; right: 430px; background-color: #2fa572;">Product Logs</a>

            <table id="productTable" class="table table-striped">

                <thead class="table-dark">

                    <tr>
                        <th>Product ID</th>
                        <th>Product Name</th>
                        <th>Category</th>
                        <th>Retail</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th></th>
                        <th>Date Created</th>
                        <th>Actions</th>
                    </tr>

                </thead>

                <tbody>

                    <tr>
                        <td>R12345</td>
                        <td>Ryzen 5</td>
                        <td>CPU</td>
                        <td>$90.00</td>
                        <td>$100.00</td>
                        <td>200</td>
                        <td class="pe-4">
                            <img src="{{ asset('img/default_avatar.jpg') }}" alt="pic"
                                style="max-height: 50px; border-radius: 50px;">
                        </td>
                        <td>2025-02-15</td>
                        <td>
                            <button class="btn btn-success btn-sm">Edit</button>
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </td>
                    </tr>

                    <tr>
                        <td>R12355</td>
                        <td>NVIDIA RTX 3090</td>
                        <td>GPU</td>
                        <td>$180.00</td>
                        <td>$210.00</td>
                        <td>200</td>
                        <td></td>
                        <td>2025-02-15</td>
                        <td>
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