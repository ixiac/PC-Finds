@extends('paging.admin')

@section('content')

    <div class="container">

        <div class="row">

            <h3 class="mb-4" style="color: #2fa572;">Admin Account Management</h3>

            <a href="{{ ('add-admin') }}" class="btn btn-primary btn-sm add-btn position-absolute border-0"
                style="width: 120px; margin-top: 58px; right: 280px; background-color: #2fa572;">Create Admin</a>

            <table id="adminTable" class="table table-striped">

                <thead class="table-dark">

                    <tr>
                        <th>Username</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Contact Number</th>
                        <th>Sex</th>
                        <th>Actions</th>
                    </tr>

                </thead>

                <tbody>

                    <tr>
                        <td>johndoe</td>
                        <td>John </td>
                        <td>Doe</td>
                        <td>johndoe@example.com</td>
                        <td>123 Main St</td>
                        <td>+1234567890</td>
                        <td>Male</td>
                        <td>
                            <button class="btn btn-sm edit-btn"
                                style="background-color: #2fa572; color: white;">Edit</button>
                            <button class="btn btn-danger btn-sm delete-btn">Delete</button>
                        </td>
                    </tr>

                    <tr>
                        <td>janesmith</td>
                        <td>Jane</td>
                        <td>Smith</td>
                        <td>janesmith@example.com</td>
                        <td>456 Oak St</td>
                        <td>+9876543210</td>
                        <td>Female</td>
                        <td>
                            <button class="btn btn-sm edit-btn"
                                style="background-color: #2fa572; color: white;">Edit</button>
                            <button class="btn btn-danger btn-sm delete-btn">Delete</button>
                        </td>
                    </tr>

                </tbody>

            </table>

        </div>

    </div>

    <script>

        $(document).ready(function () {
            $('#adminTable').DataTable();

            // Edit button click event
            $('.edit-btn').click(function () {
                alert('Edit function triggered');
            });

            // Delete button click event
            $('.delete-btn').click(function () {
                if (confirm('Are you sure you want to delete this user?')) {
                    $(this).closest('tr').remove();
                }
            });
        });

    </script>

@endsection