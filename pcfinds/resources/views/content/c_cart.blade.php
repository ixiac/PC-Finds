@extends('customer.dashboard')

@section('content')
    <div class="container mt-5">
        <div class="go-back mb-4">
            <a style="color: #2fa572;" href="{{ url('product-page') }}">← Go Back</a>
            <h2 class="text-center">Cart</h2>
        </div>

        @if($cartItems->isEmpty())
            <p class="text-center">Your cart is empty.</p>
        @else
            <div class="d-flex justify-content-between align-items-center mb-3">
                {{-- Select All Checkbox --}}
                <div class="d-flex align-items-center">
                    <input type="checkbox" id="selectAll" class="form-check-input mb-1 me-2">
                    <label for="selectAll" class="mb-0">Select All</label>
                </div>
            </div>

            <div class="row">
                @foreach($cartItems as $item)
                    <div class="col-12 mb-3">
                        <div class="card shadow-sm p-3">
                            <div class="card-body d-flex align-items-center">
                                {{-- Checkbox (Now Has a Proper Value) --}}
                                <div class="d-flex align-items-center justify-content-center me-4" style="min-width: 50px;">
                                    <input type="checkbox" class="form-check-input large-checkbox cart-checkbox"
                                        value="{{ $item->cart_id }}" {{-- Ensure each checkbox has a unique cart_id --}}
                                        data-name="{{ $item->product->product_name }}" data-quantity="{{ $item->quantity }}"
                                        data-price="{{ $item->product->selling_price }}">
                                </div>

                                {{-- Product Image --}}
                                <div class="me-4">
                                    <img src="{{ $item->product->image }}" alt="{{ $item->product->product_name }}" class="rounded"
                                        width="90" height="90">
                                </div>

                                {{-- Product Details --}}
                                <div class="flex-grow-1">
                                    <h5 class="mb-1">{{ $item->product->product_name }}</h5>
                                    <p class="mb-0">Quantity: <strong>{{ $item->quantity }}</strong></p>
                                    <p class="mb-0">Price: <strong>₱{{ number_format($item->product->selling_price, 2) }}</strong>
                                    </p>
                                    <p class="mb-0 text-success fw-bold">Total:
                                        ₱{{ number_format($item->quantity * $item->product->selling_price, 2) }}</p>
                                </div>

                                {{-- Delete Button --}}
                                <form action="{{ route('cart.remove', $item->cart_id) }}" method="POST" class="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger delete-btn"><i class="fas fa-trash"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Checkout Button --}}
            <div class="d-flex justify-content-end mt-4">
                <button type="button" class="btn btn-success btn-lg" id="checkoutBtn" disabled>Proceed to Checkout</button>
            </div>
        @endif
    </div>

    {{-- Checkout Modal --}}
    <div class="modal fade" id="checkoutModal" tabindex="-1" aria-labelledby="checkoutModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="checkoutModalLabel">Order Summary</h5>
                    <button type="button" class="btn" data-dismiss="modal" aria-label="Close" style="color: #d33;">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <ul class="list-group" id="checkoutList"></ul>
                    <h4 class="mt-3 text-end">Total: <span id="checkoutTotal" class="text-success fw-bold">₱0.00</span></h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>

                    <button type="button" class="btn btn-success" id="Orderbtn" data-dismiss="modal">Confirm
                        Checkout</button>
                    <button type="button" class="btn btn-success" id="Orderbtn">Confirm Checkout</button>

                    <button type="button" class="btn btn-success" id="Orderbtn">Confirm Checkout</button>

                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const checkboxes = document.querySelectorAll('.cart-checkbox');
            const selectAll = document.getElementById('selectAll');
            const checkoutBtn = document.getElementById('checkoutBtn');
            const checkoutList = document.getElementById('checkoutList');
            const checkoutTotal = document.getElementById('checkoutTotal');
            const checkoutModal = new bootstrap.Modal(document.getElementById('checkoutModal'));

            // Select All Functionality
            selectAll.addEventListener('change', function () {
                checkboxes.forEach(cb => cb.checked = selectAll.checked);
                updateCheckoutButton();
            });

            function updateCheckoutButton() {
                const anyChecked = [...checkboxes].some(cb => cb.checked);
                checkoutBtn.disabled = !anyChecked;
            }

            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', updateCheckoutButton);
            });

            // Checkout Modal Functionality
            checkoutBtn.addEventListener('click', function () {
                let total = 0;
                checkoutList.innerHTML = "";

                checkboxes.forEach(cb => {
                    if (cb.checked) {
                        const name = cb.dataset.name;
                        const quantity = parseInt(cb.dataset.quantity);
                        const price = parseFloat(cb.dataset.price);
                        const subtotal = quantity * price;

                        total += subtotal;

                        const listItem = document.createElement('li');
                        listItem.classList.add('list-group-item', 'd-flex', 'justify-content-between', 'align-items-center');

                        listItem.innerHTML = `
                                                <span>${name} (x${quantity})</span>
                                                <strong>₱${subtotal.toFixed(2)}</strong>
                                            `;

                        listItem.innerHTML = `<span>${name} (x${quantity})</span><strong>₱${subtotal.toFixed(2)}</strong>`;

                        checkoutList.appendChild(listItem);
                    }
                });

                checkoutTotal.textContent = `₱${total.toFixed(2)}`;
                checkoutModal.show();
            });

            // Checkout Confirmation
            document.getElementById("Orderbtn").addEventListener("click", function () {
                let selectedItems = Array.from(checkboxes)
                    .filter(cb => cb.checked)
                    .map(cb => cb.value);

                if (selectedItems.length > 0) {
                    let form = document.createElement("form");
                    form.method = "POST";
                    form.action = "{{ route('checkout') }}";
                    form.innerHTML = `@csrf ${selectedItems.map(id => `<input type="hidden" name="cartItems[]" value="${id}">`).join("")}`;
                    document.body.appendChild(form);
                    form.submit();
                }
            });

            function checkout(selectedItems) {
                let form = document.createElement("form");
                form.method = "POST";
                form.action = "{{ route('checkout') }}";
                form.innerHTML = `
                            @csrf
                            ${selectedItems.map(id => `<input type="hidden" name="cartItems[]" value="${id}">`).join("")}
                        `;
                document.body.appendChild(form);
                form.submit();
            }

        });
    </script>

    <style>
        .large-checkbox {
            width: 22px;
            height: 22px;
        }

        .form-check-input {
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
@endsection