@extends('paging.admin')

@section('content')

    <div class="container mt-4">
        <h2>Admin Accounts</h2>
        <table id="adminTable" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Sex</th>
                    <th>Contact Number</th>
                    <th>Address</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($accounts as $account)
                    <tr>
                        <td>{{ $account->username }}</td>
                        <td>{{ $account->first_name }}</td>
                        <td>{{ $account->last_name }}</td>
                        <td>{{ $account->email }}</td>
                        <td>{{ $account->sex }}</td>
                        <td>{{ $account->contact_number }}</td>
                        <td>{{ $account->address }}</td>
                        <td>
                            <!-- Edit Row -->
                            <a href="{{ route('edit_admin_account_table_route', $account->id) }}"
                                class="btn btn-primary btn-sm">Edit</a>

                            <!-- Delete Row -->
                            <form action="{{ route('delete_admin_account_table_route', $account->id) }}" method="POST"
                                class="d-inline-block delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Include SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Include DataTables and Bootstrap JavaScript -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">

    <script>
        $(document).ready(function () {
            $('#adminTable').DataTable({
                "paging": true,
                "searching": true,
                "ordering": true,
                "info": true
            });

            // SweetAlert delete confirmation for delete forms.
            $('.delete-form').on('submit', function (e) {
                e.preventDefault(); // Prevent the form from submitting immediately.
                var form = this;
                Swal.fire({
                    title: 'Are you sure you want to delete this account?',
                    text: "This action cannot be undone.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>

    @if(session('success'))
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                Swal.fire({
                    title: "Deletion Successful!",
                    text: "Admin account deleted successfully.",
                    icon: "success",
                    showConfirmButton: false,
                    allowOutsideClick: false,
                    timer: 2000
                }).then(() => {
                    window.location.href = "{{ route('admin-table') }}";
                });
            });
        </script>
    @endif

@endsection