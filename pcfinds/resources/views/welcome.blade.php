<?php $active = "home"; ?>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layout.head')
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
</head>

<body>
    @include('layout.navbar')

    <!-- Content -->
    <div>
        <div class="row mt-5 mb-5">
            <div class="col-md-6 mt-5">
                <div class="content">
                    <h2 class="fw-bold">Welcome to PC FIND</h2>
                    <p>PC Find makes ordering PC parts easy by connecting you with the best components for your build,
                        ensuring compatibility, great deals, and a hassle-free shopping experience—all in one convenient
                        platform.</p>
                    <div class="row">
                        <div class="col-md-5">
                            <p class="phrase"><span class="iconify mb-1" data-icon="mdi:shield-check"
                                    data-inline="false"></span>
                                Trusted by PC Builders</p>
                        </div>
                        <div class="col-md-6">
                            <p class="phrase"><i class="fas fa-award"></i>
                                Quality Parts, Guaranteed</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mt-5">
                <div class="image-container">
                    <img src="{{ asset('images/landing image.jpg') }}" class="img-fluid"
                        style="border-radius: 10px; height: 350px; width: 800px;" alt="Landing Image">
                </div>
            </div>
        </div>

        <div class="row mb-5" style="margin-top: 150px;">
            <div class="col-md-6">
                <!-- Carousel -->
                <div id="carouselExampleIndicators2" style="border-radius: 10px" class="car-container carousel slide"
                    data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators2" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators2" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators2" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner " style="border-radius: 10px">
                        <div class="carousel-item active">
                            <img class="img-fluid d-block w-100 rounded-3" src="{{ asset('images/p-img-1.jpg') }}"
                                style="border-radius: 10px; height: 350px; width: 800px;" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="img-fluid d-block w-100 rounded-3" src="{{ asset('images/p-img-2.jpg') }}"
                                style="border-radius: 10px; height: 350px; width: 800px;" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="img-fluid d-block w-100 rounded-3" src="{{ asset('images/p-img-3.jpg') }}"
                                style="border-radius: 10px; height: 350px; width: 800px;" alt="Third slide">
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
            <div class="col-md-6">
                <div class="content-2">
                    <h2>Products We Offer</h2>
                    <p>We provide a wide range of PC components, including:</p>
                    <div class="row">
                        <div class="col-md-6">
                            <ul class="list-unstyled">
                                <li>Processors (CPUs)</li>
                                <li>Graphics Cards (GPUs)</li>
                                <li>Motherboards</li>
                                <li>RAM (Memory)</li>
                                <li>Storage (SSDs & HDDs)</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <ul class="list-unstyled">
                                <li>Power Supplies (PSUs)</li>
                                <li>PC Cases</li>
                                <li>Cooling Solutions (Air & Liquid Coolers)</li>
                                <li>Peripherals (Keyboards, Mice, Monitors)</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layout.footer')

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>