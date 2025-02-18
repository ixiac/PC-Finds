@extends('paging.admin')

@section('content')

    <div class="container">
        <div class="row">
            <h3 class="mb-4" style="color: #2fa572;">Customer Account Management</h3>

            <table id="customerTable" class="table table-striped">
                <thead class="table-dark">
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
                    @foreach($customer_accounts as $customer_account)
                        <tr>
                            <td>{{ $customer_account->username }}</td>
                            <td>{{ $customer_account->first_name }}</td>
                            <td>{{ $customer_account->last_name }}</td>
                            <td>{{ $customer_account->email }}</td>
                            <td>{{ $customer_account->sex }}</td>
                            <td>{{ $customer_account->contact_number }}</td>
                            <td>{{ $customer_account->address }}</td>
                            <td>
                                <div class="d-flex gap-2">
                                    <!-- Edit Row -->
                                    <a href="{{ route('edit_customer_account_table_route', $customer_account->id) }}"
                                        class="btn btn-success btn-sm">Edit</a>

                                    <!-- Delete Row -->
                                    <form action="{{ route('delete_customer_account_table_route', $customer_account->id) }}"
                                        method="POST" class="delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>

    <script>
        $(document).ready(function () {
            // Initialize DataTable on the customerTable
            $('#customerTable').DataTable({
                paging: true,
                searching: true,
                ordering: true,
                info: true
            });

            // SweetAlert delete confirmation for delete forms.
            $('.delete-form').on('submit', function (e) {
                e.preventDefault(); // Prevent immediate form submission.
                const form = this;
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