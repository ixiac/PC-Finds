@extends('paging.admin')

@section('content')

    <div class="container-fluid d-flex justify-content-center align-items-center min-vh-100 bg-dark text-white">
        <div class="w-100 p-4">
            <h2 class="text-center text-success">Edit Account</h2>
            <form action="{{ route('update_admin_account_table_route', ['id' => $account->id]) }}" method="POST"
                enctype="multipart/form-data" class="mx-auto" style="max-width: 600px;">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="firstName" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="firstName" name="first_name"
                        value="{{ old('first_name', $account->first_name) }}" required>
                    @error('first_name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="lastName" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="lastName" name="last_name"
                        value="{{ old('last_name', $account->last_name) }}" required>
                    @error('last_name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username"
                        value="{{ old('username', $account->username) }}" required>
                    @error('username')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" class="form-control" id="email" name="email"
                        value="{{ old('email', $account->email) }}" required>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="contactNumber" class="form-label">Contact Number</label>
                    <input type="number" class="form-control" id="contactNumber" name="contact_number"
                        value="{{ old('contact_number', $account->contact_number) }}" required>
                    @error('contact_number')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="sex" class="form-label">Sex</label>
                    <select class="form-select" id="sex" name="sex" required>
                        <option value="M" {{ (trim(strtoupper($account->sex)) == 'M') ? 'selected' : '' }}>Male
                        </option>
                        <option value="F" {{ (trim(strtoupper($account->sex)) == 'F') ? 'selected' : '' }}>Female
                        </option>
                    </select>
                    
                    @error('sex')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" id="address" name="address"
                        value="{{ old('address', $account->address) }}" required>
                    @error('address')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-success mt-3">Submit</button>
                </div>
            </form>
        </div>
    </div>

    @if(session('success'))

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script>
            document.addEventListener("DOMContentLoaded", function () {
                Swal.fire({
                    title: "Edit Successful!",
                    text: "You have successfully edited information.",
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