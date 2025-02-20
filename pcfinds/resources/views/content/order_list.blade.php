@if($orders->isEmpty())
    <p class="text-center">No orders found.</p>
@else
    <div class="row">
        @foreach($orders as $order)
            <div class="col-12 mb-3">
                <div class="card shadow-sm p-3">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="mb-1">Order #{{ $order->order_history_id }}</h5>
                            <span style="color: white" class="badge 
                                                                                @if($order->order_status == 1) bg-warning 
                                                                                @elseif($order->order_status == 2) bg-primary 
                                                                                @elseif($order->order_status == 3) bg-info 
                                                                                @elseif($order->order_status == 4) bg-success 
                                                                                @elseif($order->order_status == 5) bg-danger 
                                                                                @elseif($order->order_status == 6) bg-secondary 
                                                                                @elseif($order->order_status == 7) bg-dark 
                                                                                @endif">
                                @if($order->order_status == 1) Pending
                                @elseif($order->order_status == 2) Approved
                                @elseif($order->order_status == 3) Ready to Deliver
                                @elseif($order->order_status == 4) Completed
                                @elseif($order->order_status == 5) Cancelled
                                @elseif($order->order_status == 6) Waiting for Refund
                                @elseif($order->order_status == 7) Refunded
                                @endif
                            </span>
                        </div>

                        <p class="mb-1"><strong>Date:</strong>
                            {{ date('F j, Y - g:i A', strtotime($order->date_order_history)) }}</p>
                        <p class="mb-1"><strong>Total Amount:</strong> ₱{{ number_format($order->total_amount, 2) }}</p>
                        <p class="mb-1"><strong>Shipping Address:</strong> {{ $order->shipping_address }}</p>

                        <hr>

                        {{-- Order Items --}}
                        <div class="row">
                            @foreach($order->items as $item)
                                <div class="col-12 mb-2">
                                    <div class="d-flex align-items-center">
                                        <div class="me-4">
                                            <img src="{{ asset('images/' . $item->product->image) }}"
                                                alt="{{ $item->product->product_name }}" class="rounded" width="90" height="90">
                                        </div>

                                        <div class="flex-grow-1 text-right">
                                            <h6 class="mb-1">{{ $item->product->product_name }}</h6>
                                            <p class="mb-1">₱{{ number_format($item->price, 2) }} x {{ $item->quantity }}</p>
                                            <p class="mb-0 text-success fw-bold">Total: ₱{{ number_format($item->subtotal, 2) }}</p>
                                        </div>
                                    </div>
                                    {{-- Cancel & Refund Buttons --}}
                                    @if($order->order_status == 1)
                                        <button class="btn btn-danger btn-sm float-right mt-2"
                                            onclick="cancelOrder({{ $item->item_id }})">
                                            Cancel
                                        </button>
                                    @elseif($order->order_status == 4)
                                        <button class="btn btn-danger btn-sm float-right mt-2" data-bs-toggle="modal"
                                            data-bs-target="#refundModal" data-item-id="{{ $item->item_id }}">
                                            Refund
                                        </button>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif
