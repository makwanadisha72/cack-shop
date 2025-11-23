<?php
	$product_id = request()->route('id');
    $products = DB::table('products')->where('id',$product_id)->get();
    // dd($products);
?>
@extends('clientTheme.include.master')
@section('content')
  <section class="ftco-section">
      <div class="container">
        @foreach($products as $product)
          <div class="row">
              <div class="col-lg-6 mb-5 ftco-animate">
                  <img class="img-fluid" src="../../image/products/<?php echo $product->image ?>">
              </div>
              <div class="col-lg-6 product-details pl-md-5 ftco-animate">
                  <h3>{{$product->name}}</h3>
                  <div class="rating d-flex">
                          <p class="text-left mr-4">
                              <a href="#" class="mr-2">5.0</a>
                              <a href="#"><span class="ion-ios-star-outline"></span></a>
                              <a href="#"><span class="ion-ios-star-outline"></span></a>
                              <a href="#"><span class="ion-ios-star-outline"></span></a>
                              <a href="#"><span class="ion-ios-star-outline"></span></a>
                              <a href="#"><span class="ion-ios-star-outline"></span></a>
                          </p>
                          <p class="text-left mr-4">
                              <a href="#" class="mr-2" style="color: #000;">100 <span style="color: #bbb;">Rating</span></a>
                          </p>
                          <p class="text-left">
                              <a href="#" class="mr-2" style="color: #000;">500 <span style="color: #bbb;">Sold</span></a>
                          </p>
                      </div>
                  <p class="price"><span>Rs. {{$product->price}} </span></p>
                  <p>{{$product->description}}
                      </p>
                      <div class="row mt-4">
                          <div class="col-md-6">
                              <div class="form-group d-flex">
                    <div class="select-wrap">
                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                  </div>
                  </div>
                          </div>
                          
            </div>
            <p><a href="{{ url('addtocart',['id'=> $product->id] )}}" class="btn btn-black py-3 px-5">Add to Cart</a></p>
              </div>
          </div>
          @endforeach
      </div>
  </section>
@endsection