@php
    use Illuminate\Support\Facades\DB;

    // Fetch categories and their products
    $categories = DB::table('category')
        ->join('product', 'category.category_id', '=', 'product.category_id')
        ->select('category.category_id', 'category.category_name', 'product.*')
        ->get()
        ->groupBy('category_name');

@endphp

@extends ('products_page')

@section ('content')

    <div class="container-fluid mt-5" style="margin-bottom: 100px; margin: 0 120px;">

        <!-- Search Bar -->
        <div class="row">
            <div class="col-md-6">
                <div class="input-group mb-3">
                    <input type="text" id="searchBox" class="form-control" placeholder="Search for products"
                        aria-label="Search for products" aria-describedby="button-addon2" style="border: 1px solid #2fa572">
                    <div class="input-group-append">
                        <button class="btn" type="button" id="button-addon2"
                            style="border: 1px solid #2fa572; background-color: #2fa572; color: white;">Search</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Promo Banner -->
        <div class="row mt-5" id="promoBanner">
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
                </div>
            </div>
        </div>

        <!-- Default Category-Based View -->
        <div id="defaultView">
            <?php foreach ($categories as $categoryName => $products): ?>
            <div class="row mt-5">
                <div class="col-12 d-flex align-items-center justify-content-between">
                    <h4><?= htmlspecialchars($categoryName) ?></h4>
                    <button class="see-all btn btn-sm" data-category="<?= htmlspecialchars($categoryName) ?>"
                        data-category-id="<?= $products->first()->category_id ?>">See All <span class="iconify mb-1"
                            data-icon="mdi:arrow-right" data-inline="false"></span></button>
                </div>
            </div>
            <div class="product-grid mt-3">
                <?php    foreach ($products as $product): ?>
                <a href="<?= url('/product-details-' . $product->product_id) ?>"
                    style="text-decoration: none; color: inherit;">
                    <div class="product-card" data-name="<?= strtolower($product->product_name) ?>">
                        <div class="card">
                            <img src="<?= asset('images/' . $product->image) ?>" class="card-images"
                                alt="<?= htmlspecialchars($product->product_name) ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?= htmlspecialchars($product->product_name) ?></h5>
                                <p class="card-text">₱<?= number_format($product->selling_price, 2) ?></p>
                            </div>
                        </div>
                    </div>
                </a>
                <?php    endforeach; ?>
            </div>
            <?php endforeach; ?>
        </div>

        <!-- Search Results -->
        <div id="searchResults" class="product-grid mt-5" style="display: none;"></div>

        <!-- Full Category Products View (Initially Hidden) -->
        <div id="categoryProducts" class="mt-5" style="display: none;">
            <button class="btn btn-lg mb-5" id="backToCategories" style="color: #2fa572">← Back</button>
            <h3 id="categoryTitle" class="mb-5 fw-bold" style="text-align: center"></h3>
            <div class="product-grid mt-5" id="allProducts"></div>
        </div>
    </div>

@endsection