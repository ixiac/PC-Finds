@extends('paging.admin')

@section('content')

    <div class="container">

        <div class="row">

            <h3 class="mb-4" style="color: #2fa572;">Logs</h3>

            <table id="logsTable" class="table table-striped">

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

                    <tr>
                        <td>R12345</td>
                        <td>Ryzen 5</td>
                        <td>CPU</td>
                        <td>$90.00</td>
                        <td>$100.00</td>
                        <td>200</td>
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
            $('#logsTable').DataTable();
        });

    </script>

@endsection