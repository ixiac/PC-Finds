@extends('paging.admin')

@section('content')

    <div class="container">

        <div class="row">

            <h3 class="mb-4" style="color: #2fa572;">Orders</h3>

                <table id="orderTable" class="table table-striped">

                <thead class="table-dark">

                    <tr>
                        <th>Customer Name</th>
                        <th>Product Name</th>
                        <th>Category</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>Address</th>
                        <th>Date Ordered</th>
                        <th>Actions</th>
                    </tr>

                </thead>

                <tbody>

                    <tr>
                        <td>Jann Angelo Dimaano</td>
                        <td>Ryzen 5</td>
                        <td>CPU</td>
                        <td>1</td>
                        <td>$100.00</td>
                        <td>C. Tirona St., Batangas City</td>
                        <td>2025-04-15</td>
                        <td>
                            
                        </td>
                    </tr>

                </tbody>

            </table>

        </div>

    </div>

    <script>

        $(document).ready(function () {
            $('#orderTable').DataTable();
        });

    </script>

@endsection