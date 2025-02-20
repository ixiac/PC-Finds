@extends('customer.dashboard')

@section('content')
    <div class="container mt-5">
        <div class="go-back mb-4">
            <a style="color: #2fa572;" href="{{ url('product-page') }}">← Go Back</a>
            <h2 class="text-center mb-5">Order History</h2>
        </div>

        @if($orders->isEmpty())
            <p class="text-center">You have no order history.</p>
        @else
<<<<<<< HEAD
            <div class="row">
                @foreach($orders as $order)
                    <div class="col-12 mb-3">
                        <div class="card shadow-sm p-3">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h5 class="mb-1">Order #{{ $order->order_history_id }}</h5>
                                    <span style="color: white" class="badge 
                                                                                                    @if($order->order_status == 1) bg-warning 
                                                                                                    @elseif($order->order_status == 2) bg-success 
                                                                                                    @elseif($order->order_status == 3) bg-danger 
                                                                                                    @endif">
                                        @if($order->order_status == 1) Pending
                                        @elseif($order->order_status == 2) Completed
                                        @elseif($order->order_status == 3) Cancelled
                                        @endif
                                    </span>
                                </div>

                                <p class="mb-1"><strong>Date:</strong>
                                    {{ date('F j, Y - g:i A', strtotime($order->date_order_history)) }}</p>
                                <p class="mb-1"><strong>Total Amount:</strong> ₱{{ number_format($order->total_amount, 2) }}</p>
                                <p class="mb-1"><strong>Shipping Address:</strong> {{ $order->shipping_address }}</p>
=======
            <div class="mb-2">
                <ul class="nav nav-tabs nav-line nav-color-secondary" id="order-tabs" role="tablist">
                    <li class="nav-item submenu" role="presentation">
                        <a class="nav-link active" id="tab-pending" data-toggle="pill" href="#pending-orders" role="tab"
                            style="color: #2fa572">Pending</a>
                    </li>
                    <li class="nav-item submenu" role="presentation">
                        <a class="nav-link" id="tab-approved-ready" data-toggle="pill" href="#approved-ready-orders" role="tab"
                            style="color: #2fa572">Approved & Ready</a>
                    </li>
                    <li class="nav-item submenu" role="presentation">
                        <a class="nav-link" id="tab-completed" data-toggle="pill" href="#completed-orders" role="tab"
                            style="color: #2fa572">Completed</a>
                    </li>
                    <li class="nav-item submenu" role="presentation">
                        <a class="nav-link" id="tab-cancelled" data-toggle="pill" href="#cancelled-orders" role="tab"
                            style="color: #2fa572">Cancelled</a>
                    </li>
                    <li class="nav-item submenu" role="presentation">
                        <a class="nav-link" id="tab-refunds" data-toggle="pill" href="#refund-orders" role="tab"
                            style="color: #2fa572">Refunds</a>
                    </li>
                    <li class="nav-item submenu" role="presentation">
                        <a class="nav-link" id="tab-all" data-toggle="pill" href="#all-orders" role="tab"
                            style="color: #2fa572">All</a>
                    </li>
                </ul>
            </div>

            <div class="tab-content" id="order-tabs-content">
                @php
                    $groupedOrders = $orders->groupBy('order_status');
                @endphp
>>>>>>> 9238bfa2395eed16c45984b468468dd8e726cafe

                {{-- Pending Orders (Active by Default) --}}
                <div class="tab-pane fade show active" id="pending-orders" role="tabpanel">
                    @include('content.order_list', ['orders' => $groupedOrders->get(1, collect())])
                </div>

<<<<<<< HEAD
                                {{-- Order Items --}}
                                <div class="row">
                                    @foreach($order->items as $item)
                                        <div class="col-12 mb-2">
                                            <div class="d-flex align-items-center">
                                                {{-- Product Image --}}
                                                <div class="me-4">
                                                    <img src="{{ $item->product->image }}" alt="{{ $item->product->product_name }}"
                                                        class="rounded" width="90" height="90">
                                                </div>

                                                {{-- Product Details --}}
                                                <div class="flex-grow-1">
                                                    <h6 class="mb-1">{{ $item->product->product_name }}</h6>
                                                    <p class="mb-1">₱{{ number_format($item->price, 2) }} x {{ $item->quantity }}</p>
                                                    <p class="mb-0 text-success fw-bold">Total: ₱{{ number_format($item->subtotal, 2) }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
=======
                {{-- Approved & Ready to Deliver Orders --}}
                <div class="tab-pane fade" id="approved-ready-orders" role="tabpanel">
                    @include('content.order_list', ['orders' => $groupedOrders->get(2, collect())->merge($groupedOrders->get(3, collect()))])
                </div>

                {{-- Completed Orders --}}
                <div class="tab-pane fade" id="completed-orders" role="tabpanel">
                    @include('content.order_list', ['orders' => $groupedOrders->get(4, collect())])
                </div>

                {{-- Cancelled Orders --}}
                <div class="tab-pane fade" id="cancelled-orders" role="tabpanel">
                    @include('content.order_list', ['orders' => $groupedOrders->get(5, collect())])
                </div>

                {{-- Refunds (Waiting for Refund & Refunded) --}}
                <div class="tab-pane fade" id="refund-orders" role="tabpanel">
                    @include('content.order_list', ['orders' => $groupedOrders->get(6, collect())->merge($groupedOrders->get(7, collect()))])
                </div>

                {{-- All Orders --}}
                <div class="tab-pane fade" id="all-orders" role="tabpanel">
                    @include('content.order_list', ['orders' => $orders])
                </div>
            </div>
        @endif
    </div>

    <!-- Refund Request Modal -->
    <div class="modal fade" id="refundModal" tabindex="-1" aria-labelledby="refundModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="refundModalLabel">Request Refund</h5>
                    <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close" style="color: #d33;"><i
                            class="fas fa-times"></i></button>
                </div>
                <div class="modal-body">
                    <form id="refundForm" enctype="multipart/form-data">
                        <input type="hidden" id="refundItemId" name="item_id">

                        <div class="mb-3">
                            <label for="refund_reason" class="form-label">Reason for Refund</label>
                            <textarea class="form-control" id="refund_reason" name="refund_reason" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="refund_image" class="form-label">Upload Image (optional)</label>
                            <input type="file" class="form-control" id="refund_image" name="refund_image" accept="image/*">
                        </div>

                        <button type="submit" class="btn btn-success">Submit Request</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function cancelOrder(itemId) {
            Swal.fire({
                title: "Are you sure?",
                text: "This item will be removed from your order.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Yes, cancel it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch(`/orders/cancel/${itemId}`, {
                        method: "POST",
                        headers: {
                            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
                            "Content-Type": "application/json"
                        }
                    })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                Swal.fire("Canceled!", "The item has been removed.", "success")
                                    .then(() => location.reload());
                            } else {
                                Swal.fire("Error!", data.message, "error");
                            }
                        })
                        .catch(error => {
                            console.error("Error:", error);
                            Swal.fire("Oops!", "Something went wrong. Please try again.", "error");
                        });
                }
            });
        }

        document.addEventListener("DOMContentLoaded", function () {
            var refundModal = document.getElementById("refundModal");
            var refundItemIdInput = document.getElementById("refundItemId");

            refundModal.addEventListener("show.bs.modal", function (event) {
                var button = event.relatedTarget;
                var itemId = button.getAttribute("data-item-id");
                refundItemIdInput.value = itemId;
            });

            document.getElementById("refundForm").addEventListener("submit", function (event) {
                event.preventDefault();

                var formData = new FormData(this);
                var itemId = document.getElementById("refundItemId").value;

                fetch(`/orders/refund/${itemId}`, {
                    method: "POST",
                    headers: {
                        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
                    },
                    body: formData
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            Swal.fire("Requested!", "Your refund request has been submitted.", "success")
                                .then(() => location.reload());
                        } else {
                            Swal.fire("Error!", data.message, "error");
                        }
                    })
                    .catch(error => {
                        console.error("Error:", error);
                        Swal.fire("Oops!", "Something went wrong. Please try again.", "error");
                    });
            });
        });
    </script>

>>>>>>> 9238bfa2395eed16c45984b468468dd8e726cafe
@endsection