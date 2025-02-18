@extends('paging.admin')

@section('content')

    <div class="container">

        <div class="row">

            <h3 class="mb-4" style="color: #2fa572;">Admin Account Management</h3>

            <a href="{{ route('admin_account_register_route') }}"
                class="btn btn-primary btn-sm add-btn position-absolute border-0"
                style="width: 120px; margin-top: 58px; right: 280px; background-color: #2fa572;">Create Admin</a>

            <table id="adminTable" class="table table-striped">

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

                    @foreach($accounts as $account)
                        <tr>
                            <td>{{ $account->username }}</td>
                            <td>{{ $account->first_name }}</td>
                            <td>{{ $account->last_name }}</td>
                            <td style="width: 100px;">
                                <div class="overflow-x-auto text-nowrap scroll-cell" style="width: 120px;">
                                    {{ $account->email }}
                                </div>
                            </td>
                            <td>
                                {{ $account->sex == 'M' ? 'Male' : 'Female' }}
                            </td>
                            <td style="width: 100px;">{{ $account->contact_number }}</td>
                            <td style="width: 100px;">
                                <div class="overflow-x-auto text-nowrap scroll-cell" style="max-width: 120px;">
                                    {{ $account->address }}

                                </div>
                            </td>
                            <td>
                                <!-- Edit Row -->
                                <a href="{{ route('edit_admin_account_table_route', $account->id) }}"
                                    class="btn btn-success btn-sm">Edit</a>

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

    </div>

    <!-- Include SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



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