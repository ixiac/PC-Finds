<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
</head>
<body>

<div class="container mt-4">
    <h2 class="mb-4">Product List</h2>
    <table id="productTable" class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Quantity</th>
                <th>Retail Price</th>
                <th>Selling Price</th>
                <th>Category</th>
                <th>Date Added</th>
                <th>Actions</th>
            </tr>
        </thead>
    </table>
</div>

<script>
    $(document).ready(function() {
        $('#productTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('cbe.data') }}",
            columns: [
                { data: 'product_id', name: 'product_id' },
                { data: 'product_name', name: 'product_name' },
                { data: 'quantity', name: 'quantity' },
                { data: 'retail_price', name: 'retail_price' },
                { data: 'selling_price', name: 'selling_price' },
                { data: 'category', name: 'category' },
                { data: 'date_added', name: 'date_added' },
                { data: 'actions', name: 'actions', orderable: false, searchable: false }
            ]
        });
    });
</script>

</body>
</html>
