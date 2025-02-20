@extends('paging.admin')

@section('content')

    <div class="container">
        <div class="row">
            <h3 class="mb-4" style="color: #2fa572;">Pending Orders</h3>
            <table id="orderTable" class="table table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>Customer Name</th>
                        <th>Product Name</th>
                        <th>Category</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>Address</th>
                        <th>Date Ordered</th>
                        <th>Order Items</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pending_orders as $order)
                        <tr>
                            <td>{{ $order->customer_name }}</td>
                            <td class="align-middle" style="width: 140px;">
                                <div class="overflow-x-auto text-nowrap scroll-cell" style="max-width: 120px;">
                                    {{ $order->items->isNotEmpty() ? $order->items->first()->product_name : 'N/A' }}
                                </div>
                            </td>
                            <td>
                                {{ $order->items->isNotEmpty() ? $order->items->first()->category_name : 'N/A' }}
                            </td>
                            <td>
                                {{ $order->items->sum('quantity') }}
                            </td>
                            <td>
                                ₱{{ number_format($order->items->sum('subtotal'), 2) }}
                            </td>
                            <td class="align-middle" style="width: 100px;">
                                <div class="overflow-x-auto text-nowrap scroll-cell" style="max-width: 120px;">
                                    {{ $order->shipping_address }}
                                </div>
                            </td>
                            <td class="align-middle" style="width: 100px;">
                                <div class="overflow-x-auto text-nowrap scroll-cell" style="max-width: 120px;">
                                    {{ $order->date_order_history }}
                                </div>
                            </td>
                            <td>
                                @if($order->items->isNotEmpty())
                                    <ul>
                                        @foreach($order->items as $item)
                                            <li>{{ $item->quantity }}x {{ $item->product_name }}</li>
                                        @endforeach
                                    </ul>
                                @else
                                    No items
                                @endif
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Order Actions">
                                    <button class="btn btn-success btn-sm approve-order"
                                        data-id="{{ $order->order_history_id }}" style="margin-right: 5px;">Approve</button>
                                    <button class="btn btn-danger btn-sm cancel-order"
                                        data-id="{{ $order->order_history_id }}">Cancel</button>
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
            $('#orderTable').DataTable();

            $('.approve-order').click(function () {
                let orderId = $(this).data('id');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "Do you want to approve this order?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#28a745',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Approve!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "{{ route('orders.approve') }}",
                            type: "POST",
                            data: {
                                _token: "{{ csrf_token() }}",
                                order_id: orderId
                            },
                            success: function (response) {
                                Swal.fire('Approved!', 'The order has been approved.', 'success').then(() => {
                                    location.reload();
                                });
                            },
                            error: function (xhr, status, error) {
                                console.error('Approval Error:', xhr.responseText);
                            }
                        });
                    }
                });
            });

            $('.cancel-order').click(function () {
                let orderId = $(this).data('id');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "Do you want to cancel this order?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#28a745',
                    confirmButtonText: 'Yes, Cancel!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "{{ route('orders.cancel') }}",
                            type: "POST",
                            data: {
                                _token: "{{ csrf_token() }}",
                                order_id: orderId
                            },
                            success: function (response) {
                                Swal.fire('Cancelled!', 'The order has been cancelled.', 'success').then(() => {
                                    location.reload();
                                });
                            },
                            error: function (xhr, status, error) {
                                console.error('Cancel Error:', xhr.responseText);
                            }
                        });
                    }
                });
            });
        });
    </script>

@endsection