@extends('paging.admin')

@section('content')

    <div class="container">

        <div class="row">

            <h3 class="mb-4" style="color: #2fa572;">Category List</h3>

            <a href="{{ ('add-category') }}" class="btn btn-primary btn-sm add-btn position-absolute border-0"
                style="width: 140px; margin-top: 58px; right: 280px; background-color: #2fa572;">Add New Category</a>

            <table id="categoryTable" class="table table-striped">

                <thead class="table-dark">

                    <tr>
                        <th>Category ID</th>
                        <th>Category Name</th>
                        <th></th>
                        <th>Date Created</th>
                        <th>Actions</th>
                    </tr>

                </thead>

                <tbody>

                    <tr>
                        <td>R12345</td>
                        <td>CPU</td>
                        <td>
                            <img src="{{ asset('img/default_avatar.jpg') }}" alt="pic"
                                style="max-width: 50px; max-height: 50px; border-radius: 50px;">
                        </td>
                        <td>2025-02-15</td>
                        <td>
                            <button class="btn btn-success btn-sm">Edit</button>
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </td>
                    </tr>

                    <tr>
                        <td>R12355</td>
                        <td>GPU</td>
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
            $('#categoryTable').DataTable();
        });

    </script>

@endsection