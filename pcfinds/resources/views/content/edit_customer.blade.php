@extends('paging.admin')

@section('content')

    <div class="container-fluid text-white">

        <a href="{{ route('admin-table') }}" class="btn text-light">
            <i class="bi bi-arrow-left"></i> Go Back
        </a>

        <div class="d-flex justify-content-center">

            <div class="px-5 py-1 rounded-2 mb-5"
                style="width:600px; border: solid 1px; border-color: rgba(255, 255, 255, 0.2) !important;">
                
                <h2 class="text-center text-success my-3">Edit Account</h2>
                <form action="{{ route('update_customer_account_table_route', ['id' => $customer_account->id]) }}"
                    method="POST" enctype="multipart/form-data" class="mx-auto" style="max-width: 600px;">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="firstName" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="firstName" name="first_name"
                            value="{{ old('first_name', $customer_account->first_name) }}" required>
                        @error('first_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="lastName" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="lastName" name="last_name"
                            value="{{ old('last_name', $customer_account->last_name) }}" required>
                        @error('last_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username"
                            value="{{ old('username', $customer_account->username) }}" required>
                        @error('username')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="email" name="email"
                            value="{{ old('email', $customer_account->email) }}" required>
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="contactNumber" class="form-label">Contact Number</label>
                        <input type="number" class="form-control" id="contactNumber" name="contact_number"
                            value="{{ old('contact_number', $customer_account->contact_number) }}" required>
                        @error('contact_number')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="sex" class="form-label">Sex</label>
                        <select class="form-select" id="sex" name="sex" required>
                            <option value="M" {{ (trim(strtoupper($customer_account->sex)) == 'M') ? 'selected' : '' }}>Male
                            </option>
                            <option value="F" {{ (trim(strtoupper($customer_account->sex)) == 'F') ? 'selected' : '' }}>Female
                            </option>
                        </select>
                        @error('sex')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" name="address"
                            value="{{ old('address', $customer_account->address) }}" required>
                        @error('address')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-success my-3">Submit</button>
                    </div>
                </form>
            </div>
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
                    window.location.href = "{{ route('customer-table') }}";
                });
            });
        </script>

    @endif

@endsection