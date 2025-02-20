@extends('paging.admin')

@section('content')

    <div class="container">

        <div class="row">

            <h3 class="mb-4" style="color: #2fa572;">Refund Products</h3>

            <table id="refundListTable" class="table table-striped">

                <thead class="table-dark">

                    <tr>
                        <th>Customer Name</th>
                        <th>Product Name</th>
                        <th>Details</th>
                        <th>Date of Refund</th>
                        <th>Status</th>
                    </tr>

                </thead>

                <tbody>

                    <tr>
                        <td>John Doe</td>
                        <td>Ryzen i5 13th Gen</td>
                        <td><button type="button" class="btn btn-sm btn-primary text-primary" data-bs-toggle="modal"
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
                        <td><span class="badge rounded-pill"
                                style="background-color:rgba(22, 142, 58, 0.65); border: solid 1px green;">Approved</span>
                        </td>
                    </tr>

                    <tr>
                        <td>Jane Smith</td>
                        <td>AMD RX1310</td>
                        <td><button type="button" class="btn btn-sm btn-primary text-primary" data-bs-toggle="modal"
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
                        <td>2025-02-16</td>
                        <td><span class="badge rounded-pill"
                                style="background-color:rgba(22, 142, 58, 0.65); border: solid 1px green;">Approved</span>
                        </td>
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