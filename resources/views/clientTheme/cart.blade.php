<?php
$user = session('user');
$uid = DB::table('customers')->where('email',$user)->select('id')->first();
foreach($uid as $id){
  $u_id = $id;
}
// dd($uid);
// echo gettype($uid);
$cart_products = DB::table('addtocart')->where('user_id',$u_id)->get();
// dd($cart_products);
$pro_ids  = [];
foreach($cart_products as $pro_id){
  $pro_ids[] += $pro_id->product_id;
}
$sum = 0;
// $products = [];
// foreach($pro_ids as $pro_id){
//   $products += DB::table('products')->where('id',$pro_id)->first();
// }
// dd($pro_ids);
// echo gettype($cart_products);
// exit();
?>
@extends('clientTheme.include.master')
@section('content')
  <section class="ftco-section ftco-cart">
          <div class="container">
            <div class="row">
              <div class="col-md-12 ftco-animate">
                <div class="cart-list">
                  <table class="table">
                    <thead class="thead-primary">
                      <tr class="text-center">
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                        <th>Product name</th>
                        <th>Description</th>
                        <th>Price</th>
                        {{-- <th>Total</th> --}}
                      </tr>
                    </thead>
                    @foreach($pro_ids as $pro_id)
                    <?php $product = DB::table('products')->where('id',$pro_id)->first();
                    $sum += $product->price;
                    // dd($product);
                    ?>
                    <tbody>
                            {{-- add to cart loop starts from here --}}
                            <tr class="text-center">
                              <td class="product-remove"><a href="#"><span class="ion-ios-close"></span></a></td>
                              
                              <td class="image-prod"><img src="../../image/products/<?php echo $product->image ?>" alt="non"></td>
                              
                              <td class="product-name">
                                  <h3>
                                    {{$product->name}}
                                  </h3>
                              </td>
                              
                              <td class="price">{{$product->description}}</td>
                              
                              <td class="quantity">
                                  <div class="input-group mb-3 justify-content-center">
                                    {{$product->price}}
                                </div>
                            </td>
                              
                              {{-- <td class="total">$4.90</td> --}}
                            </tr><!-- END TR-->

                            {{-- <tr class="text-center">
                              <td class="product-remove"><a href="#"><span class="ion-ios-close"></span></a></td>
                              
                              <td class="image-prod"><div class="img" style="background-image:url({{asset('clientTheme/images/product-4.jpg')}});"></div></td>
                              
                              <td class="product-name">
                                  <h3>Bell Pepper</h3>
                                  <p>Far far away, behind the word mountains, far from the countries</p>
                              </td>
                              
                              <td class="price">$15.70</td>
                              
                              <td class="quantity">
                                  <div class="input-group mb-3">
                                   <input type="text" name="quantity" class="quantity form-control input-number" value="1" min="1" max="100">
                                </div>
                            </td>
                              
                              <td class="total">$15.70</td>
                            </tr><!-- END TR--> --}}
                          </tbody>
                          @endforeach
                        </table>
                    </div>
              </div>
          </div>
          <div class="row justify-content-center">
              <div class="col-lg-4 mt-5 cart-wrap ftco-animate">
                  <div class="cart-total mb-3">
                      <h3>Estimate shipping and tax</h3>
                      <p>Enter your destination to get a shipping estimate</p>
                        <form action="#" class="info">
                <div class="form-group">
                    <label for="">Country</label>
                  <input type="text" class="form-control text-left px-3" placeholder="">
                </div>
                <div class="form-group">
                    <label for="country">State/Province</label>
                  <input type="text" class="form-control text-left px-3" placeholder="">
                </div>
                <div class="form-group">
                    <label for="country">Zip/Postal Code</label>
                  <input type="text" class="form-control text-left px-3" placeholder="">
                </div>
              </form>
                  </div>
              </div>
              <div class="col-lg-4 mt-5 cart-wrap ftco-animate">
                  <div class="cart-total mb-3">
                      <h3>Cart Totals</h3>
                      <hr>
                      <p class="d-flex total-price">
                          <span>Total</span>
                          <span>{{$sum}}</span>
                      </p>
                  </div>
                  <p><a href="{{route('chechout')}}" class="btn btn-primary py-3 px-4">Proceed to Checkout</a></p>
              </div>
          </div>
          </div>
      </section>

      <section class="ftco-section ftco-no-pt ftco-no-pb py-5 bg-light">
    <div class="container py-4">
      <div class="row d-flex justify-content-center py-5">
        <div class="col-md-6">
            <h2 style="font-size: 22px;" class="mb-0">Subcribe to our Newsletter</h2>
            <span>Get e-mail updates about our latest shops and special offers</span>
        </div>
        <div class="col-md-6 d-flex align-items-center">
          <form action="#" class="subscribe-form">
            <div class="form-group d-flex">
              <input type="text" class="form-control" placeholder="Enter email address">
              <input type="submit" value="Subscribe" class="submit px-3">
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
@endsection