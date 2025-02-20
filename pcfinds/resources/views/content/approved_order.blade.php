@extends('paging.admin')

@section('content')

    <div class="container">
        <div class="row">
            <h3 class="mb-4" style="color: #2fa572;">Approved Orders</h3>
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
                    @foreach($approved_orders as $order)
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
                                <button class="btn btn-success btn-sm to-deliver-order" data-id="{{ $order->order_history_id }}"
                                    style="margin-right: 5px;">To Deliver</button>
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
        });
    </script>

    <script>
        $('.to-deliver-order').click(function () {
            let orderId = $(this).data('id');
            Swal.fire({
                title: 'Are you sure?',
                text: "Do you want to mark this order as to deliver?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#17a2b8',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, To Deliver!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('orders.to_deliver') }}",
                        type: "POST",
                        data: {
                            _token: "{{ csrf_token() }}",
                            order_id: orderId
                        },
                        success: function (response) {
                            Swal.fire('Updated!', 'The order is now marked as to deliver.', 'success').then(() => {
                                location.reload();
                            });
                        },
                        error: function (xhr, status, error) {
                            console.error('To Deliver Error:', xhr.responseText);
                        }
                    });
                }
            });
        });
    </script>

@endsection