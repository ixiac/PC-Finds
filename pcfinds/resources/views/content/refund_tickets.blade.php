@extends('paging.admin')

@section('content')

    <div class="container">

        <div class="row">

            <h3 class="mb-4" style="color: #2fa572;">Refund Management</h3>

            <table id="refundTable" class="table table-striped">

                <thead class="table-dark">

                    <tr>
                        <th>Refund ID</th>
                        <th>Product Name</th>
                        <th>Category Name</th>
                        <th>Customer Name</th>
                        <th>Quantity</th>
                        <th>Amount</th>
                        <th>Refund Reason</th>
                        <th>Date of Refund</th>
                        <th>Actions</th>
                    </tr>

                </thead>

                <tbody>

                    <tr>
                        <td>R12345</td>
                        <td>Deepkewl 39</td>
                        <td>CPU Fan</td>
                        <td>Dionela Marilag</td>
                        <td>2</td>
                        <td>$50.00</td>
                        <td>Product Defect</td>
                        <td>2025-02-15</td>
                        <td>
                            <button class="btn btn-success btn-sm">Approved</button>
                            <button class="btn btn-danger btn-sm">Declined</button>
                        </td>
                    </tr>

                    <tr>
                    <td>R12345</td>
                        <td>HyperEkis DDR98</td>
                        <td>RAM</td>
                        <td>Carlos Agasi</td>
                        <td>2</td>
                        <td>$50.00</td>
                        <td>Product Defect</td>
                        <td>2025-02-15</td>
                        <td>
                            <button class="btn btn-success btn-sm">Approved</button>
                            <button class="btn btn-danger btn-sm">Declined</button>
                        </td>
                    </tr>

                </tbody>

            </table>

        </div>

    </div>

    <script>

        $(document).ready(function () {
            $('#refundTable').DataTable();

            // Handle Approved button click event
            $('.btn-success').click(function () {
                alert('Refund Approved');
            });

            // Handle Declined button click event
            $('.btn-danger').click(function () {
                alert('Refund Declined');
            });
        });

    </script>

@endsection
