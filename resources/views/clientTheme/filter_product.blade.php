<?php
// SAFE GET VALUE
$selectedName = $_GET['name'] ?? '';

// PRODUCT FILTER
if ($selectedName != '') {
    $products = DB::table('products')
        ->where('cat_name', $selectedName)
        ->get();
} else {
    $products = DB::table('products')->get();
}

// CATEGORIES
$categories = DB::table('categories')->get();
?>

@extends('clientTheme.include.master')

@section('content')

<style>
.product-category {
    list-style: none;
    padding: 0;
    display: flex;
    gap: 12px;
    justify-content: center;
    flex-wrap: wrap;
}
.product-category li a {
    padding: 8px 18px;
    border-radius: 30px;
    background: #f2f2f2;
    color: #333;
    font-weight: 500;
}
.product-category li a.active,
.product-category li a:hover {
    background: #1e90ff;
    color: #fff;
}

.product {
    background: #fff;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 8px 25px rgba(0,0,0,0.08);
    transition: 0.3s;
}
.product:hover {
    transform: translateY(-8px);
}
.img-prod {
    height: 220px;
    overflow: hidden;
}
.img-prod img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}
.price-sale {
    color: #28a745;
    font-size: 18px;
    font-weight: bold;
}
.buy-now {
    width: 45px;
    height: 45px;
    background: #1e90ff;
    color: #fff;
    border-radius: 50%;
}
</style>

<section class="ftco-section bg-light">
    <div class="container">

        <!-- CATEGORY FILTER -->
        <ul class="product-category mb-4">

            <li>
                <a href="{{ url('products') }}"
                   class="<?php echo empty($selectedName) ? 'active' : ''; ?>">
                    All
                </a>
            </li>

            <?php foreach($categories as $category){ ?>
                <li>
                    <a href="/filter_product?name=<?php echo $category->name; ?>"
                       class="<?php echo ($selectedName == $category->name) ? 'active' : ''; ?>">
                        <?php echo $category->name; ?>
                    </a>
                </li>
            <?php } ?>

        </ul>

        <!-- PRODUCTS -->
        <div class="row">
            <?php foreach($products as $product){ ?>
                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="product">

                        <a href="{{ route('single_product',['id'=> $product->id]) }}" class="img-prod">
                            <img src="../../image/products/<?php echo $product->image; ?>" alt="">
                        </a>

                        <div class="text py-3 text-center">
                            <h3><?php echo $product->name; ?></h3>
                            <p class="price">
                                <span class="price-sale">₹ <?php echo $product->price; ?></span>
                            </p>

                            <a href="{{ url('addtocart',['id'=> $product->id]) }}"
                               class="buy-now d-inline-flex align-items-center justify-content-center">
                                <i class="ion-ios-cart"></i>
                            </a>
                        </div>

                    </div>
                </div>
            <?php } ?>
        </div>

    </div>
</section>

@endsection
