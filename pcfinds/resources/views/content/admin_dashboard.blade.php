@extends('paging.admin')

@section('content')

    <div class="d-flex flex-row ps-1">

        <div class="d-flex flex-column gap-3" style="max-height: 729px">
            <!-- Card Section -->
            <div class="d-flex flex-row gap-3 justify-content-between" style="max-height: 240px;">

                <div class="card p-1" style="width: 25rem; height: 15rem;">
                    <!-- Total User -->
                    <div class="card-body">

                        <h1 class="card-title" style="color: #343A40;">Total User</h1>

                        <h3 class="card-subtitle mb-2" style="color: #343A40;">
                            <i class="bi bi-people" style="color: #2FA572; font-size: 32px;"></i> 100
                        </h3>

                        <div class="online ps-1 d-flex flex-row align-items-center column-gap-2" style="height: 50px">
                            <div class="online-icon"
                                style="width: 12px; height: 12px; border-radius: 50%; background-color: green;">
                            </div>
                            <p class="card-subtitle" style="font-size: 24px; color: #343A40;"> Online (10)</p>
                        </div>

                        <div class="online ps-1 d-flex flex-row align-items-center column-gap-2" style="height: 50px">
                            <div class="online-icon"
                                style="width: 12px; height: 12px; border-radius: 50%; background-color: grey;">
                            </div>
                            <p class="card-subtitle text-dark" style="font-size: 24px; color: #343A40;"> Offline (90)</p>
                        </div>

                    </div>

                </div>

                <div class="card p-1" style="width: 25rem; height: 15rem;">
                    <!-- Total Revenue -->
                    <div class="card-body d-flex flex-column justify-content-between">

                        <div class="d-flex flex-column gap-3">

                            <h1 class="card-title mb-2" style="color: #343A40;">Total Revenue</h1>

                            <div class="online ps-1 d-flex flex-row align-items-center column-gap-2" style="height: 20px">
                                <i class="bi bi-cash-coin" style="color: #2FA572; font-size: 32px;"></i>
                                <h2 class="card-subtitle mb-0" style="font-size: 32px; color: #343A40;"> P 100,000</h2>
                            </div>

                        </div>

                        <div class="icon-filter ms-auto">
                            <i class="bi bi-arrow-repeat fw-bold" style="color: grey; font-size: 24px;"></i>
                            <i class="bi bi-funnel fw-bold" style="color: grey; font-size: 24px;"></i>
                        </div>

                    </div>

                </div>

            </div>

            <!-- Line Chart for Top 10 Selling Products -->
            <div class="row">

                <div class="col-12">

                    <div class="card">

                        <div class="card-body">
                            <h4 class="card-title ps-5">Top 10 Selling Products</h4>
                            <div style="height: 407px;">
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
                <!-- Category Percentage -->
                <div class="card-body">

                    <h4 class="mb-4">Category Sales Progress</h4>

                    <div class="mb-3">
                        <label class="form-label">CPU (80%)</label>
                        <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 80%;">80%</div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Motherboard (65%)</label>
                        <div class="progress">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 65%;">65%</div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">RAM (90%)</label>
                        <div class="progress">
                            <div class="progress-bar bg-warning text-dark" role="progressbar" style="width: 90%;">90%</div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Keyboard (50%)</label>
                        <div class="progress">
                            <div class="progress-bar bg-info text-dark" role="progressbar" style="width: 50%;">50%</div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Mouse (70%)</label>
                        <div class="progress">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 70%;">70%</div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Monitor (60%)</label>
                        <div class="progress">
                            <div class="progress-bar bg-dark" role="progressbar" style="width: 60%;">60%</div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Power Supply (75%)</label>
                        <div class="progress">
                            <div class="progress-bar bg-secondary" role="progressbar" style="width: 75%;">75%</div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Graphics Card (85%)</label>
                        <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 85%;">85%</div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Storage (SSD/HDD) (95%)</label>
                        <div class="progress">
                            <div class="progress-bar bg-warning text-dark" role="progressbar" style="width: 95%;">95%</div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Cooling System (40%)</label>
                        <div class="progress">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 40%;">40%</div>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>

    <script>
        const productNames = [
            "Intel i7-12700K", "AMD Ryzen 7 5800X", "ASUS ROG Strix B550-F",
            "Corsair Vengeance 16GB RAM", "Logitech G Pro Keyboard", "Razer DeathAdder Mouse",
            "LG 27-inch Monitor", "Corsair RM750x PSU", "Samsung 970 EVO SSD", "Cooler Master Hyper 212"
        ];
        const salesData = [500, 470, 430, 400, 380, 360, 340, 320, 300, 290];

        // Initialize Chart.js Line Chart
        const ctx = document.getElementById('productSalesChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: productNames,
                datasets: [{
                    label: 'Units Sold',
                    data: salesData,
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

    </script>


@endsection