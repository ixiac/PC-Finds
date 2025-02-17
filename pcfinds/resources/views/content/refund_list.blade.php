@extends('paging.admin')

@section('content')

    <div class="container">

        <div class="row">

            <h3 class="mb-4" style="color: #2fa572;">Refund Products</h3>

            <table id="refundListTable" class="table table-striped">

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
                        <th>Status</th>
                    </tr>

                </thead>

                <tbody>

                    <tr>
                        <td>R12345</td>
                        <td>Ryzen i5 13th Gen</td>
                        <td>CPU</td>
                        <td>John Doe</td>
                        <td>$50.00</td>
                        <td>1</td>
                        <td>Product Defect</td>
                        <td>2025-02-15</td>
                        <td><span class="badge rounded-pill" style="background-color:rgba(22, 142, 58, 0.65); border: solid 1px green;">Approved</span></td>
                    </tr>

                    <tr>
                        <td>R12346</td>
                        <td>AMD RX1310</td>
                        <td>GPU</td>
                        <td>Jane Smith</td>
                        <td>$30.00</td>
                        <td>1</td>
                        <td>Incorrect Item</td>
                        <td>2025-02-16</td>
                        <td><span class="badge rounded-pill" style="background-color:rgba(22, 142, 58, 0.65); border: solid 1px green;">Approved</span></td>
                    </tr>

                </tbody>

            </table>

        </div>

    </div>

    <script>

        $(document).ready(function () {
            $('#refundListTable').DataTable();

            // Edit button click event
            $('.edit-btn').click(function () {
                alert('Edit function triggered');
            });

            // Delete button click event
            $('.delete-btn').click(function () {
                if (confirm('Are you sure you want to delete this refund entry?')) {
                    $(this).closest('tr').remove();
                }
            });
        });

    </script>

@endsection
