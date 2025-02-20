@extends('paging.admin')

@section('content')

    <div class="d-flex flex-row ps-1">

        <div class="d-flex flex-column gap-3" style="max-height: 729px">
            <!-- Card Section -->
            <div class="d-flex flex-row gap-3 justify-content-between" style="max-height: 240px;">

                <div class="card p-1" style="width: 25rem; height: 15rem;">
                    <div class="card-body">
                        <h2 class="card-title" style="color: #343A40;">Total Users</h2>
                        <h3 class="card-subtitle mb-2" style="color: #343A40;">
                            <i class="bi bi-people" style="color: #2FA572; font-size: 32px;"></i> {{ $totalUsers ?? 0 }}
                        </h3>

                        <div class="online ps-1 d-flex flex-row align-items-center column-gap-2" style="height: 50px">
                            <p class="card-subtitle" style="font-size: 18px; color: #343A40; font-weight: 500;">
                                <i class="bi bi-person"></i> Customer ({{ $totalCustomers ?? 0 }})
                            </p>
                        </div>

                        <div class="online ps-1 d-flex flex-row align-items-center column-gap-2" style="height: 50px">
                            <p class="card-subtitle text-dark" style="font-size: 18px; color: #343A40; font-weight: 500;">
                                <i class="bi bi-person-lock"></i> Admin ({{ $totalAdmins ?? 0 }})
                            </p>
                        </div>
                    </div>
                </div>

                <div class="card p-1" style="width: 25rem; height: 15rem;">
                    <!-- Total Revenue -->
                    <div class="card-body d-flex flex-column justify-content-between">

                        <div class="d-flex flex-column gap-4">

                            <h2 class="card-title mb-2" style="color: #343A40;">Total Revenue</h2>

                            <div class="online ps-1 d-flex flex-row align-items-center column-gap-2" style="height: 0">
                                <i class="bi bi-cash-coin" style="color: #2FA572; font-size: 28px;"></i>
                                <h3 class="card-subtitle mb-0" style="color: #343A40;"> P 100,000</h3>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <!-- Top Selling Products -->
            <div class="row">

                <div class="col-12">

                    <div class="card">

                        <div class="card-body">
                            <h2 class="card-title ps-5" style="color: #343A40;">Top Selling Products</h2>
                            <div style="height: 280px;">
                                <canvas id="productSalesChart"></canvas>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </div>

        <!-- Category Sales Progress -->
        <div class="col ps-3">

            <div class="card p-1" style="width: 25rem; max-width: 25rem;">

                <div class="card-body">

                    <h2 class="mb-4" style="color: #343A40;">Category Sales Progress</h2>

                    <div id="categorySalesContainer"></div>

                </div>

            </div>

        </div>

    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Top Selling Products
            fetch("/admin-dashboard/top-sales")
                .then(response => response.json())
                .then(data => {
                    console.log("Top Selling Products:", data); // Debugging

                    if (!data.labels.length || !data.data.length) {
                        console.error("No sales data available.");
                        return;
                    }

                    const ctx = document.getElementById('productSalesChart').getContext('2d');

                    new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: data.labels, // Product names
                            datasets: [{
                                label: 'Units Sold',
                                data: data.data, // Quantity sold
                                borderColor: '#2FA572',
                                backgroundColor: 'rgba(47, 165, 114, 0.2)',
                                borderWidth: 2,
                                fill: true,
                                tension: 0.4
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            scales: {
                                y: {
                                    beginAtZero: true,
                                    ticks: {
                                        stepSize: 50
                                    }
                                }
                            }
                        }
                    });
                })
                .catch(error => console.error("Error fetching sales data:", error));

            // Category Sales Progress
            fetch("/admin-dashboard/category-sales")
                .then(response => response.json())
                .then(data => {
                    console.log("Category Sales Data:", data); // Debugging

                    const container = document.getElementById("categorySalesContainer");
                    container.innerHTML = ""; // Clear existing progress bars

                    data.forEach(category => {
                        const progress = `
                            <div class="mb-3">
                                <label class="form-label">${category.category_name} (${category.percentage}%)</label>
                                <div class="progress">
                                    <div class="progress-bar bg-success" role="progressbar"
                                        style="width: ${category.percentage}%; background-color: #2fa572;">
                                        ${category.percentage}%
                                    </div>
                                </div>
                            </div>
                        `;
                        container.innerHTML += progress;
                    });
                })
                .catch(error => console.error("Error fetching category sales data:", error));
        });
    </script>



@endsection