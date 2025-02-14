<?php $active = "products"; ?>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layout.head')

    <style>
        .card-images {
            height: 150px;
            width: 200px;
        }
    </style>
</head>

<body>
    @include('layout.navbar')

    <!-- Content -->
    <div class="" style="margin: 0 130px;">
        <div class="row mt-5">
            <div class="col-md-6">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search for products"
                        aria-label="Search for products" aria-describedby="button-addon2"
                        style="border: 1px solid #2fa572">
                    <div class="input-group-append">
                        <button class="btn" type="button" id="button-addon2"
                            style="border: 1px solid #2fa572; background-color: #2fa572; color: white;">Search</button>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4 d-flex justify-content-end">
                <div class="btn-group" role="group" aria-label="Order Actions">
                    <button type="button" class="btn btn-sm mx-1" style="height: 38px;">
                        <span class="iconify" data-icon="mdi:cart" data-inline="false"></span>
                    </button>
                    <button type="button" class="btn mx-1" style="height: 38px;">
                        <span class="iconify" data-icon="mdi:history" data-inline="false"></span>
                    </button>
                    <button type="button" class="btn btn-sm mx-1" style="height: 38px;">
                        <span class="iconify" data-icon="mdi:clipboard-list-outline" data-inline="false"></span>
                    </button>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-12">
                <div id="carouselExampleIndicators2" class="car-container carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators2" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators2" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators2" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner" style="border-radius: 10px">
                        <div class="carousel-item active">
                            <img src="images/p-banner-2.jpg" class="d-block w-100" alt="Slide 1" style="height: 430px;">
                        </div>
                        <div class="carousel-item">
                            <img src="images/p-banner-1.jpg" class="d-block w-100" alt="Slide 2" style="height: 430px;">
                        </div>
                        <div class="carousel-item">
                            <img src="images/p-banner-3.jpg" class="d-block w-100" alt="Slide 3" style="height: 430px;">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators2" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators2" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Category Line -->
        <div class="row" style="margin-top: 100px">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <h4>GPUs</h4>
                <button class="btn btn-sm mb-1" style="color: #2fa572;">
                    See All <span class="iconify mb-1" data-icon="mdi:arrow-right" data-inline="false"></span>
                </button>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-2">
                <div class="card">
                    <img src="images/product-1.png" class="card-img-top card-images" alt="Product Image">
                    <div class="card-body">
                        <h5 class="card-title">Jelo RTX 0710</h5>
                        <p class="card-text">$10,000</p>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="card">
                    <img src="images/product-1.png" class="card-img-top card-images" alt="Product Image">
                    <div class="card-body">
                        <h5 class="card-title">Jelo RTX 0710</h5>
                        <p class="card-text">$10,000</p>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="card">
                    <img src="images/product-1.png" class="card-img-top card-images" alt="Product Image">
                    <div class="card-body">
                        <h5 class="card-title">Jelo RTX 0710</h5>
                        <p class="card-text">$10,000</p>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="card">
                    <img src="images/product-1.png" class="card-img-top card-images" alt="Product Image">
                    <div class="card-body">
                        <h5 class="card-title">Jelo RTX 0710</h5>
                        <p class="card-text">$10,000</p>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="card">
                    <img src="images/product-1.png" class="card-img-top card-images" alt="Product Image">
                    <div class="card-body">
                        <h5 class="card-title">Jelo RTX 0710</h5>
                        <p class="card-text">$10,000</p>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="card">
                    <img src="images/product-1.png" class="card-img-top card-images" alt="Product Image">
                    <div class="card-body">
                        <h5 class="card-title">Jelo RTX 0710</h5>
                        <p class="card-text">$10,000</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row" style="margin-top: 100px">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <h4>GPUs</h4>
                <button class="btn btn-sm mb-1" style="color: #2fa572;">
                    See All <span class="iconify mb-1" data-icon="mdi:arrow-right" data-inline="false"></span>
                </button>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-2">
                <div class="card">
                    <img src="images/product-2.png" class="card-img-top card-images" alt="Product Image">
                    <div class="card-body">
                        <h5 class="card-title">Abin RX 0301</h5>
                        <p class="card-text">$10,000</p>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="card">
                    <img src="images/product-2.png" class="card-img-top card-images" alt="Product Image">
                    <div class="card-body">
                        <h5 class="card-title">Abin RX 0301</h5>
                        <p class="card-text">$10,000</p>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="card">
                    <img src="images/product-2.png" class="card-img-top card-images" alt="Product Image">
                    <div class="card-body">
                        <h5 class="card-title">Abin RX 0301</h5>
                        <p class="card-text">$10,000</p>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="card">
                    <img src="images/product-2.png" class="card-img-top card-images" alt="Product Image">
                    <div class="card-body">
                        <h5 class="card-title">Abin RX 0301</h5>
                        <p class="card-text">$10,000</p>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="card">
                    <img src="images/product-2.png" class="card-img-top card-images" alt="Product Image">
                    <div class="card-body">
                        <h5 class="card-title">Abin RX 0301</h5>
                        <p class="card-text">$10,000</p>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="card">
                    <img src="images/product-2.png" class="card-img-top card-images" alt="Product Image">
                    <div class="card-body">
                        <h5 class="card-title">Abin RX 0301</h5>
                        <p class="card-text">$10,000</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Footer -->
    @include('layout.footer')

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>