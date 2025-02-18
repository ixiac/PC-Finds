@extends('paging.admin')

@section('content')

    <div class="container">

        <div class="row">

            <h3 class="mb-2" style="color: #2fa572;">Account Logs</h3>
            <a href="{{ ('manage-product') }}" class="btn text-light mb-4 text-nowrap me-2" style="width: 100px; padding: 5px 50px 5px 10px;">
                <i class="bi bi-arrow-left"></i> Go Back
            </a>
            <table id="productLogsTable" class="table table-striped">

                <thead class="table-dark">

                    <tr>
                        <th>Log ID</th>
                        <th>Product Name</th>
                        <th>Category</th>
                        <th>Quantity</th>
                        <th>Date Restocked</th>
                    </tr>

                </thead>

                <tbody>

                    <tr>
                        <td>PLID1002</td>
                        <td>Ryzen 5</td>
                        <td>CPU</td>
                        <td>200</td>
                        <td>2025-02-15</td>
                    </tr>

                </tbody>

            </table>

        </div>

    </div>

    <script>

        $(document).ready(function () {
            $('#productLogsTable').DataTable();
        });

    </script>

@endsection