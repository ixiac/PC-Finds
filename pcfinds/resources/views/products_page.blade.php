<?php $active = "products"; ?>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Products Page</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Figtree', sans-serif;
            overflow-x: hidden;
        }

        footer {
            background-color: #343a40;
            color: #ffffff;
            text-align: center;
            padding: 20px 0;
            width: 100%;
            margin-top: 20px;
        }

        .footer-content {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
        }

        .footer-section {
            flex: 1;
            padding: 10px;
            min-width: 200px;
        }

        .footer-section h5 {
            margin-bottom: 15px;
        }

        .footer-section p,
        .footer-section a {
            color: #ffffff;
            text-decoration: none;
        }

        .footer-section a:hover {
            text-decoration: underline;
        }

        .footer-bottom {
            margin-top: 20px;
        }

        .navbar {
            height: 80px;
        }

        .navbar-brand img {
            height: 100%;
        }
    </style>
</head>

<body>
    @include('partials.navbar')

    <!-- Content -->
    <div class="row mt-5 mx-5">
        <div class="col-md-6">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search for products"
                    aria-label="Search for products" aria-describedby="button-addon2">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button" id="button-addon2">Search</button>
                </div>
            </div>
        </div>
        <div class="col-md-6 d-flex justify-content-end">
            <div class="btn-group" role="group" aria-label="Basic example">
                <button type="button" class="btn btn-primary btn-sm mx-1" style="height: 38px;">B 1</button>
                <button type="button" class="btn btn-secondary btn-sm mx-1" style="height: 38px;">B 2</button>
                <button type="button" class="btn btn-success btn-sm mx-1" style="height: 38px;">B 3</button>
            </div>
        </div>
    </div>
    <div class="row mt-5 mx-5">
        <div class="col-12">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                        class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="https://via.placeholder.com/800x400" class="d-block w-100" alt="Slide 1">
                    </div>
                    <div class="carousel-item">
                        <img src="https://via.placeholder.com/800x400" class="d-block w-100" alt="Slide 2">
                    </div>
                    <div class="carousel-item">
                        <img src="https://via.placeholder.com/800x400" class="d-block w-100" alt="Slide 3">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>

    <!-- Category Line -->
    <div class="row mt-5 mx-5">
        <div class="col-12 d-flex justify-content-between align-items-center">
            <h4>Category Name</h4>
            <button class="btn btn-outline-primary btn-sm">See All</button>
        </div>
    </div>
    <div class="row mt-3 mx-5">
        <div class="col-md-2">
            <div class="card">
                <img src="https://via.placeholder.com/150" class="card-img-top" alt="Product Image">
                <div class="card-body">
                    <h5 class="card-title">Product Name</h5>
                    <p class="card-text">$100</p>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card">
                <img src="https://via.placeholder.com/150" class="card-img-top" alt="Product Image">
                <div class="card-body">
                    <h5 class="card-title">Product Name</h5>
                    <p class="card-text">$100</p>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card">
                <img src="https://via.placeholder.com/150" class="card-img-top" alt="Product Image">
                <div class="card-body">
                    <h5 class="card-title">Product Name</h5>
                    <p class="card-text">$100</p>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card">
                <img src="https://via.placeholder.com/150" class="card-img-top" alt="Product Image">
                <div class="card-body">
                    <h5 class="card-title">Product Name</h5>
                    <p class="card-text">$100</p>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card">
                <img src="https://via.placeholder.com/150" class="card-img-top" alt="Product Image">
                <div class="card-body">
                    <h5 class="card-title">Product Name</h5>
                    <p class="card-text">$100</p>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card">
                <img src="https://via.placeholder.com/150" class="card-img-top" alt="Product Image">
                <div class="card-body">
                    <h5 class="card-title">Product Name</h5>
                    <p class="card-text">$100</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5 mx-5">
        <div class="col-12 d-flex justify-content-between align-items-center">
            <h4>Category Name</h4>
            <button class="btn btn-outline-primary btn-sm">See All</button>
        </div>
    </div>
    <div class="row mt-3 mx-5">
        <div class="col-md-2">
            <div class="card">
                <img src="https://via.placeholder.com/150" class="card-img-top" alt="Product Image">
                <div class="card-body">
                    <h5 class="card-title">Product Name</h5>
                    <p class="card-text">$100</p>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card">
                <img src="https://via.placeholder.com/150" class="card-img-top" alt="Product Image">
                <div class="card-body">
                    <h5 class="card-title">Product Name</h5>
                    <p class="card-text">$100</p>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card">
                <img src="https://via.placeholder.com/150" class="card-img-top" alt="Product Image">
                <div class="card-body">
                    <h5 class="card-title">Product Name</h5>
                    <p class="card-text">$100</p>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card">
                <img src="https://via.placeholder.com/150" class="card-img-top" alt="Product Image">
                <div class="card-body">
                    <h5 class="card-title">Product Name</h5>
                    <p class="card-text">$100</p>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card">
                <img src="https://via.placeholder.com/150" class="card-img-top" alt="Product Image">
                <div class="card-body">
                    <h5 class="card-title">Product Name</h5>
                    <p class="card-text">$100</p>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card">
                <img src="https://via.placeholder.com/150" class="card-img-top" alt="Product Image">
                <div class="card-body">
                    <h5 class="card-title">Product Name</h5>
                    <p class="card-text">$100</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5 mx-5">
        <div class="col-12 d-flex justify-content-between align-items-center">
            <h4>Category Name</h4>
            <button class="btn btn-outline-primary btn-sm">See All</button>
        </div>
    </div>
    <div class="row mt-3 mx-5">
        <div class="col-md-2">
            <div class="card">
                <img src="https://via.placeholder.com/150" class="card-img-top" alt="Product Image">
                <div class="card-body">
                    <h5 class="card-title">Product Name</h5>
                    <p class="card-text">$100</p>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card">
                <img src="https://via.placeholder.com/150" class="card-img-top" alt="Product Image">
                <div class="card-body">
                    <h5 class="card-title">Product Name</h5>
                    <p class="card-text">$100</p>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card">
                <img src="https://via.placeholder.com/150" class="card-img-top" alt="Product Image">
                <div class="card-body">
                    <h5 class="card-title">Product Name</h5>
                    <p class="card-text">$100</p>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card">
                <img src="https://via.placeholder.com/150" class="card-img-top" alt="Product Image">
                <div class="card-body">
                    <h5 class="card-title">Product Name</h5>
                    <p class="card-text">$100</p>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card">
                <img src="https://via.placeholder.com/150" class="card-img-top" alt="Product Image">
                <div class="card-body">
                    <h5 class="card-title">Product Name</h5>
                    <p class="card-text">$100</p>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card">
                <img src="https://via.placeholder.com/150" class="card-img-top" alt="Product Image">
                <div class="card-body">
                    <h5 class="card-title">Product Name</h5>
                    <p class="card-text">$100</p>
                </div>
            </div>
        </div>
    </div>

    

    <!-- Footer -->
    @include('partials.footer')

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>