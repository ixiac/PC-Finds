@extends('paging.admin')

@section('content')

    <div class="container">

        <div class="row">

            <h3 class="mb-4" style="color: #2fa572;">Refund Management</h3>

            <table id="refundTable" class="table table-striped">

                <thead class="table-dark">

                    <tr>
                        <th width="300">Customer Name</th>
                        <th width="300">Product Name</th>
                        <th>Details</th>
                        <th>Date of Refund</th>
                        <th>Actions</th>
                    </tr>

                </thead>

                <tbody>

                    <tr>
                        <td>Dionela Marilag</td>
                        <td>Ryzen 18 5600 G</td>
                        <td>
                            <button type="button" class="btn btn-sm btn-primary text-primary" data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop" style="background-color: transparent;">
                                View
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content px-3">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-2" id="staticBackdropLabel">Refund Details</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <h3 class="text-center">Product Name</h3>
                                            <p>Refund Request by: Name</p>
                                            <p><b>Description</b> <br>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam id dolor id
                                                nibh ultricies vehicula ut id elit. Aenean eu leo quam. Pellentesque ornare
                                                sem lacinia quam venenatis vestibulum. Vestibulum id ligula porta felis
                                                euismod semper.

                                                Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Proin
                                                eget tortor risus. Sed porttitor lectus nibh. Donec rutrum congue leo eget
                                                malesuada.
                                            </p>

                                            <img src="" alt="refund-img" class="img-fluid object-fit-cover">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-success"
                                                data-bs-dismiss="modal">Back</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
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