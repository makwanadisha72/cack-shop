<?php
$topCategories = DB::table('categories')->limit(4)->get();
?>

@extends('clientTheme.include.master')

@section('content')

<style>
.feature-box{
    background:#fff;
    border-radius:16px;
    padding:28px;
    text-align:center;
    box-shadow:0 8px 20px rgba(0,0,0,.06);
    transition:.3s;
}
.feature-box:hover{
    transform:translateY(-6px);
    box-shadow:0 15px 35px rgba(0,0,0,.12);
}
.feature-box i{
    font-size:34px;
    color:#1e90ff;
    margin-bottom:12px;
}
.feature-box h4{
    font-weight:600;
    margin-bottom:6px;
}
.feature-box p{
    font-size:14px;
    color:#666;
}

.category-wrap{
    position:relative;
    height:260px;
    border-radius:20px;
    overflow:hidden;
    box-shadow:0 10px 30px rgba(0,0,0,.12);
    transition:.35s;
}
.category-wrap:hover{
    transform:scale(1.03);
}
.category-bg{
    position:absolute;
    inset:0;
    background-size:cover;
    background-position:center;
}
.category-overlay{
    position:absolute;
    inset:0;
    background:linear-gradient(to top, rgba(0,0,0,.75), rgba(0,0,0,.2));
    display:flex;
    align-items:flex-end;
    padding:20px;
}
.category-overlay h5{
    color:#fff;
    font-size:20px;
    font-weight:700;
    margin:0;
}
.category-link{
    display:block;
    text-decoration:none;
}
.section-title{
    text-align:center;
    margin-bottom:40px;
}
.section-title h3{
    font-weight:700;
}
.section-title p{
    color:#666;
}
</style>

<section class="ftco-section bg-light">
    <div class="container">
        <div class="row text-center">

            <div class="col-md-4 mb-4">
                <div class="feature-box">
                    <i class="flaticon-shipped"></i>
                    <h4>Free Shipping</h4>
                    <p>No extra delivery charges</p>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="feature-box">
                    <i class="flaticon-award"></i>
                    <h4>Premium Quality</h4>
                    <p>Certified & trusted laptops</p>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="feature-box">
                    <i class="flaticon-customer-service"></i>
                    <h4>24/7 Support</h4>
                    <p>Always here to help you</p>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="ftco-section pt-0">
    <div class="container">

        <div class="section-title">
            <h3>Browse by Category</h3>
            <p>Find the perfect laptop for your needs</p>
        </div>

        <div class="row">
            @foreach($topCategories as $category)
            <div class="col-md-3 mb-4">
                <a href="{{ url('products?category='.$category->name) }}" class="category-link">
                    <div class="category-wrap">
                        <div class="category-bg"
                             style="background-image:url('{{ asset('image/category/'.$category->image) }}')">
                        </div>
                        <div class="category-overlay">
                            <h5>{{ $category->name }}</h5>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>

    </div>
</section>

@endsection
