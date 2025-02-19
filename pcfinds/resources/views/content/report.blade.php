@extends('paging.admin')

@section('content')
    <div class="container d-flex flex-column align-items-center text-center gap-5">

        <!-- Profit per Category Chart -->
        <div style="width: 800px;" class="mb-4">
            <h2 class="text-light">Profit per Product Category</h2>
            <canvas id="profitPerCategory"></canvas>
        </div>

        <!-- Low Stock Chart -->
        <div style="width: 600px; height: 600px;" class="mb-4">
            <h2 class="text-light">Low Stock Inventory</h2>
            <canvas id="lowStock"></canvas>
        </div>

        <!-- Refunds Chart -->
        <div style="width: 600px; height: 600px;" class="mb-4">
            <h2 class="text-light">Refund Status</h2>
            <canvas id="refunds"></canvas>
        </div>

    </div>

    <script>

        document.addEventListener("DOMContentLoaded", function () {

            // Profit per Category (Bar Chart)
            new Chart(document.getElementById("profitPerCategory"), {
                type: "bar",
                data: {
                    labels: ["Keyboards", "Mice", "Monitors", "Headsets", "Graphics Cards"],
                    datasets: [{
                        label: "Profit ($)",
                        data: [2000, 3000, 5000, 3500, 7000],
                        backgroundColor: ["#FF5733", "#33B5E5", "#FFC107", "#8E44AD", "#2ECC71"]
                    }]
                },
                options: { responsive: true }
            });

            // Low Stock (Pie Chart)
            new Chart(document.getElementById("lowStock"), {
                type: "pie",
                data: {
                    labels: ["Keyboards", "Mice", "Monitors", "Headsets", "Graphics Cards"],
                    datasets: [{
                        data: [5, 3, 8, 2, 6],
                        backgroundColor: ["#FF5733", "#33B5E5", "#FFC107", "#8E44AD", "#2ECC71"]
                    }]
                },
                options: { responsive: true, maintainAspectRatio: false }
            });

            // Refunds (Approved vs Declined) (Doughnut Chart)
            new Chart(document.getElementById("refunds"), {
                type: "doughnut",
                data: {
                    labels: ["Approved", "Declined"],
                    datasets: [{
                        data: [80, 20],
                        backgroundColor: ["#4CAF50", "#F44336"]
                    }]
                },
                options: { responsive: true, maintainAspectRatio: false }
            });
        });

    </script>
@endsection