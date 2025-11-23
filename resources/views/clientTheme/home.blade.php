@extends('clientTheme.include.master')
<?php
  // session_start();
  // dd($_SESSION['user']);
?>
@section('content')
<section class="ftco-section">
  <div class="container">
    <div class="row no-gutters ftco-services">
      <div class="col-md-4 text-center d-flex align-self-stretch ftco-animate">
        <div class="media block-6 services mb-md-0 mb-4">
          <div class="icon bg-color-1 active d-flex justify-content-center align-items-center mb-2">
            <span class="flaticon-shipped"></span>
          </div>
          <div class="media-body">
            <h3 class="heading">Free Shipping</h3>
          </div>
        </div>      
      </div>
      <div class="col-md-4 text-center d-flex align-self-stretch ftco-animate">
        <div class="media block-6 services mb-md-0 mb-4">
          <div class="icon bg-color-3 d-flex justify-content-center align-items-center mb-2">
            <span class="flaticon-award"></span>
          </div>
          <div class="media-body">
            <h3 class="heading">Superior Quality</h3>
            <span>Quality Products</span>
          </div>
        </div>      
      </div>
      <div class="col-md-4 text-center d-flex align-self-stretch ftco-animate">
        <div class="media block-6 services mb-md-0 mb-4">
          <div class="icon bg-color-4 d-flex justify-content-center align-items-center mb-2">
            <span class="flaticon-customer-service"></span>
          </div>
          <div class="media-body">
            <h3 class="heading">Support</h3>
            <span>Reply in 24 Hours</span>
          </div>
        </div>      
      </div>
    </div>
  </div>
</section>

<section class="ftco-section ftco-category ftco-no-pt">
  <div class="container">
    <div class="row">
  <div class="col-md-3">
    <div class="category-wrap ftco-animate img mb-4 d-flex align-items-end" style="background-image: url({{asset('clientTheme/images/dell3.jpeg')}});">
      <div class="text px-3 py-1">
        <h2 class="mb-0"><a href="#">Ultraportable</a></h2>
      </div>
      </div>
    </div>
    <div class="col-md-3">
            <div class="category-wrap ftco-animate img mb-4 d-flex align-items-end" style="background-image: url({{asset('clientTheme/images/Laptop.jpg')}});">
        <div class="text px-3 py-1">
          <h2 class="mb-0"><a href="#">Laptop</a></h2>
        </div>		
      </div>
    </div>
    <div class="col-md-3">
            <div class="category-wrap ftco-animate img mb-4 d-flex align-items-end" style="background-image: url({{asset('clientTheme/images/bg3.jpeg')}});">
        <div class="text px-3 py-1">
          <h2 class="mb-0"><a href="#">smart laptop</a></h2>
        </div>		
      </div>
    </div>
    <div class="col-md-3">
        <div class="category-wrap ftco-animate img mb-4 d-flex align-items-end" style="background-image: url({{asset('clientTheme/images/asus1.jpeg')}});">
    <div class="text px-3 py-1">
      <h2 class="mb-0"><a href="#">Gamming Laptop</a></h2>
    </div>		
  </div>
</div>
  </div>
</section>

<hr>
@endsection