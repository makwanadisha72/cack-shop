<?php
  $uid = DB::table('customers')->where('email',session('user'))->select('id')->get();
  // dd($sum);
  // $cart_products = DB::table('addtocart')->where('user_id',$uid)->get();
  // dd($cart_products);
  // foreach($cart_products as $product){
  //   echo $product;
  // }
  // exit();
?>
@extends('clientTheme.include.master')
@section('content')
  <section class="ftco-section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-xl-7 ftco-animate">
                      <form action="#" class="billing-form">
                          <h3 class="mb-4 billing-heading">Billing Details</h3>
                <div class="row align-items-end">
                    <div class="col-md-6">
                  <div class="form-group">
                      <label for="firstname">Firt Name</label>
                    <input type="text" class="form-control" placeholder="">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                      <label for="lastname">Last Name</label>
                    <input type="text" class="form-control" placeholder="">
                  </div>
              </div>
                  <div class="w-100"></div>
                  <div class="col-md-6">
                      <div class="form-group">
                      <label for="streetaddress">Street Address</label>
                    <input type="text" class="form-control" placeholder="House number and street name">
                  </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                        <label for="towncity">State</label>
                    <input type="text" class="form-control">
                  </div>
                  </div>
                  <div class="w-100"></div>
                  <div class="col-md-6">
                      <div class="form-group">
                      <label for="towncity">Town / City</label>
                    <input type="text" class="form-control" placeholder="">
                  </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="postcodezip">Postcode / ZIP *</label>
                    <input type="text" class="form-control" placeholder="">
                  </div>
                  </div>
                  <div class="w-100"></div>
                  <div class="col-md-6">
                  <div class="form-group">
                      <label for="phone">Phone</label>
                    <input type="text" class="form-control" placeholder="">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                      <label for="emailaddress">Email Address</label>
                    <input type="text" class="form-control" placeholder="">
                  </div>
              </div>
              <div class="w-100"></div>
              </div>
            </form><!-- END -->
                </div>
                <div class="col-md-12">
                    <div class="cart-detail p-3 p-md-4">
                        <h3 class="billing-heading mb-4">Payment Method</h3>
                          <div class="form-group">
                              <div class="col-md-12">
                                  <div class="radio">
                                      <label><input type="radio" name="optradio" class="mr-2"> Case Payment</label>
                                  </div>
                              </div>
                          </div>
                          <div class="form-group">
                              <div class="col-md-12">
                                  <div class="radio">
                                      <label><input type="radio" name="optradio" class="mr-2"> Upi</label>
                                  </div>
                              </div>
                          </div>
                          {{-- <div class="form-group">
                              <div class="col-md-12">
                                  <div class="checkbox">
                                      <label><input type="checkbox" value="" class="mr-2"> I have read and accept the terms and conditions</label>
                                  </div>
                              </div>
                          </div> --}}
                          <p><a href="#"class="btn btn-primary py-3 px-4">Place an order</a></p>
                      </div>
                </div>
            </div>
        </div> <!-- .col-md-8 -->
      </div>
    </div>
  </section> <!-- .section -->

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