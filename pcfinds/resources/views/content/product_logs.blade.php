@extends('paging.admin')

@section('content')

    <div class="container">

        <div class="row">

            <h3 class="mb-2" style="color: #2fa572;">Product Logs</h3>
            <a href="{{ ('manage-product') }}" class="btn text-light mb-4 text-nowrap me-2"
                style="width: 100px; padding: 5px 50px 5px 10px;">
                <i class="bi bi-arrow-left"></i> Go Back
            </a>
            <table id="productLogsTable" class="table table-striped">

                <thead class="table-dark">

                    <tr>
                        <th>Log ID</th>
                        <th>Product Name</th>
                        <th>Category</th>
                        <th>Quantity in Stock</th>
                        <th>Quantity Added</th>
                        <th>Quantity Total</th>
                        <th>Restocked By</th>
                        <th>Date Restocked</th>
                    </tr>

                </thead>

                <tbody>

                    @foreach($logs as $log)

                        <tr>

                            <td>{{ $log->log_id }}</td>
                            <td>{{ $log->product_name }}</td>
                            <td>{{ $log->category_name }}</td>
                            <td>{{ $log->quantity_in_stock }}</td>
                            <td>{{ $log->quantity_added }}</td>
                            <td>{{ $log->quantity_total }}</td>
                            <td>{{ $log->restocked_by }}</td>
                            <td>{{ \Carbon\Carbon::parse($log->date_restocked)->format('F d, Y H:i') }}</td>

                        </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    </div>

    <script>

        $(document).ready(function () {
            $('#productLogsTable').DataTable();
            "order": [[0, "desc"]]
        });

    </script>

@endsection