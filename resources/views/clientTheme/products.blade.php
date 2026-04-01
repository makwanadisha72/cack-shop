<?php
use Illuminate\Support\Facades\DB;

$categories = DB::table('categories')->get();
$subcategories = DB::table('subcategories')->get();

$selectedCategory = request('category');
$selectedSubcategory = request('subcat');

$productsQuery = DB::table('products');

if ($selectedSubcategory) {
    $productsQuery->where('subcat_name', $selectedSubcategory);
} elseif ($selectedCategory) {
    $productsQuery->where('cat_name', $selectedCategory);
}

$products = $productsQuery->get();
?>

@extends('clientTheme.include.master')

@section('content')

<style>
/* ===== CATEGORY SLIDER ===== */
.category-slider-wrapper{
    position:relative;
    display:flex;
    align-items:center;
    margin-bottom:30px;
}
.category-slider{
    display:flex;
    gap:14px;
    overflow-x:auto;
    scroll-behavior:smooth;
    padding:10px 50px;
    white-space:nowrap;
}
.category-slider::-webkit-scrollbar{ display:none; }
.cat-item{
    padding:10px 24px;
    border-radius:30px;
    background:#f1f1f1;
    color:#333;
    font-weight:600;
    text-decoration:none;
    transition:.3s;
    flex-shrink:0;
}
.cat-item:hover,
.cat-item.active{
    background:#1e90ff;
    color:#fff;
}
.slide-btn{
    position:absolute;
    top:50%;
    transform:translateY(-50%);
    background:#fff;
    border:none;
    width:38px;
    height:38px;
    border-radius:50%;
    box-shadow:0 4px 14px rgba(0,0,0,.18);
    font-size:20px;
    cursor:pointer;
    z-index:10;
}
.slide-btn.left{ left:6px; }
.slide-btn.right{ right:6px; }

/* ===== LEFT SUBCATEGORY ===== */
.sidebar{
    background:#ffffff;
    border-radius:16px;
    padding:20px;
    box-shadow:0 10px 30px rgba(0,0,0,.08);
    position:sticky;
    top:90px;
}
.sidebar h5{
    font-weight:700;
    margin-bottom:16px;
    border-bottom:1px solid #eee;
    padding-bottom:10px;
}
.subcategory-list{
    list-style:none;
    padding:0;
    margin:0;
    max-height:420px;
    overflow-y:auto;
}
.subcategory-list::-webkit-scrollbar{
    width:6px;
}
.subcategory-list::-webkit-scrollbar-thumb{
    background:#d1d5db;
    border-radius:10px;
}
.subcategory-list li{
    margin-bottom:8px;
}
.subcategory-list li a{
    display:flex;
    align-items:center;
    justify-content:space-between;
    padding:11px 14px;
    border-radius:10px;
    color:#374151;
    font-weight:500;
    text-decoration:none;
    background:#f9fafb;
    transition:.25s;
}
.subcategory-list li a:hover{
    background:#e0ecff;
    color:#1e90ff;
}
.subcategory-list li a.active{
    background:#1e90ff;
    color:#fff;
    box-shadow:0 6px 18px rgba(30,144,255,.35);
}
.subcategory-badge{
    font-size:14px;
    opacity:.7;
}

/* ===== PRODUCT CARD ===== */
.product{
    background:#fff;
    border-radius:15px;
    overflow:hidden;
    box-shadow:0 10px 25px rgba(0,0,0,.08);
    transition:.3s;
}
.product:hover{
    transform:translateY(-8px);
}
.img-prod{
    height:220px;
    overflow:hidden;
}
.img-prod img{
    width:100%;
    height:100%;
    object-fit:cover;
}
.product h3{
    font-size:16px;
    font-weight:600;
    margin-bottom:6px;
}
.price-sale{
    font-size:18px;
    font-weight:bold;
    color:#28a745;
}
.buy-now{
    width:45px;
    height:45px;
    background:#1e90ff;
    color:#fff;
    border-radius:50%;
}
.buy-now:hover{
    background:#0d6efd;
}
</style>

<section class="ftco-section bg-light">
<div class="container">

    <!-- CATEGORY SLIDER -->
    <div class="category-slider-wrapper">
        <button class="slide-btn left" onclick="slideLeft()">‹</button>

        <div class="category-slider" id="categorySlider">
            <a href="{{ url('products') }}"
               class="cat-item {{ empty($selectedCategory) ? 'active' : '' }}">
                All
            </a>

            @foreach($categories as $cat)
                <a href="{{ url('products?category='.$cat->name) }}"
                   class="cat-item {{ $selectedCategory == $cat->name ? 'active' : '' }}">
                    {{ $cat->name }}
                </a>
            @endforeach
        </div>

        <button class="slide-btn right" onclick="slideRight()">›</button>
    </div>

    <div class="row">

        <!-- LEFT SUBCATEGORY -->
        @if($selectedCategory)
        <div class="col-md-3 mb-4">
            <div class="sidebar">
                <h5>{{ $selectedCategory }}</h5>
                <ul class="subcategory-list">
                    @foreach($subcategories as $sub)
                        @if($sub->cat_name == $selectedCategory)
                        <li>
                            <a href="{{ url('products?category='.$selectedCategory.'&subcat='.$sub->name) }}"
                               class="{{ $selectedSubcategory == $sub->name ? 'active' : '' }}">
                                <span>{{ $sub->name }}</span>
                                <span class="subcategory-badge">›</span>
                            </a>
                        </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
        @endif

        <!-- PRODUCTS -->
        <div class="{{ $selectedCategory ? 'col-md-9' : 'col-md-12' }}">
            <div class="row">
                @forelse($products as $product)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="product">

                        <a href="{{ route('single_product',['id'=>$product->id]) }}" class="img-prod">
                            <img src="{{ asset('image/products/'.$product->image) }}">
                        </a>

                        <div class="text py-3 px-3 text-center">
                            <h3>{{ $product->name }}</h3>
                            <span class="price-sale">₹ {{ $product->price }}</span>

                            <div class="d-flex justify-content-center mt-2">
                                <a href="{{ url('addtocart/'.$product->id) }}"
                                   class="buy-now d-flex align-items-center justify-content-center">
                                    <i class="ion-ios-cart"></i>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
                @empty
                <div class="col-12 text-center">
                    <p>No products found</p>
                </div>
                @endforelse
            </div>
        </div>

    </div>
</div>
</section>

<script>
function slideLeft(){
    document.getElementById('categorySlider').scrollLeft -= 350;
}
function slideRight(){
    document.getElementById('categorySlider').scrollLeft += 350;
}
</script>

@endsection
