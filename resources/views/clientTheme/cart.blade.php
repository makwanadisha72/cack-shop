<?php
$user = session('user');
$uid = DB::table('customers')->where('email',$user)->select('id')->first();
foreach($uid as $id){
  $u_id = $id;
}
$cart_products = DB::table('addtocart')->where('user_id',$u_id)->get();
$sum = 0;
?>

@extends('clientTheme.include.master')

@section('content')

<style>
.cart-list{
    background:#fff;
    border-radius:18px;
    padding:24px;
    box-shadow:0 12px 35px rgba(0,0,0,0.08);
}
.cart-list thead{
    background:linear-gradient(90deg,#1e90ff,#74a9f4);
    color:#fff;
}
.cart-list th{
    padding:16px;
    font-weight:600;
}
.cart-list td{
    padding:20px;
    vertical-align:middle;
}

/* IMAGE */
.image-prod{
    width:140px;
    text-align:center;
}
.image-prod img{
    width:120px;
    height:120px;
    object-fit:contain;
    background:#f8f9fa;
    padding:10px;
    border-radius:16px;
    box-shadow:0 8px 20px rgba(0,0,0,0.15);
}

/* REMOVE */
.product-remove a{
    width:36px;
    height:36px;
    border-radius:50%;
    background:#ffecec;
    color:#ef6262;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:20px;
    transition:.3s;
}
.product-remove a:hover{
    background:#ef6262;
    color:#fff;
}

/* TOTAL + SHIPPING */
.cart-box{
    background:#fff;
    border-radius:18px;
    padding:28px;
    box-shadow:0 12px 35px rgba(0,0,0,0.08);
}
.cart-box h3{
    font-weight:700;
}
.cart-box .form-control{
    border-radius:30px;
    padding:10px 16px;
}
.cart-box .form-control:focus{
    border-color:#1e90ff;
    box-shadow:0 0 0 2px rgba(30,144,255,0.15);
}

/* BUTTON */
.btn-primary{
    border-radius:30px;
    font-weight:600;
    box-shadow:0 8px 22px rgba(30,144,255,0.35);
}
.btn-primary:hover{
    transform:translateY(-2px);
}
</style>

<section class="ftco-section bg-light">
<div class="container">

    <!-- CART TABLE -->
    <div class="row">
        <div class="col-md-12">
            <div class="cart-list">
                <table class="table text-center mb-0">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Product</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody>

                    @foreach($cart_products as $cart)
                    <?php
                        $product = DB::table('products')->where('id',$cart->product_id)->first();
                        $sum += $product->price;
                    ?>
                    <tr>
                        <td class="product-remove">
                            <a href="{{ url('removetocart/'.$cart->id) }}">
                                <i class="ion-ios-close"></i>
                            </a>
                        </td>

                        <td class="image-prod">
                            <img src="../../image/products/{{ $product->image }}" alt="">
                        </td>

                        <td><strong>{{ $product->name }}</strong></td>
                        <td>{{ $product->description }}</td>
                        <td>₹ {{ $product->price }}</td>
                    </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- SHIPPING + TOTAL -->
    <div class="row mt-5 justify-content-center">

        <!-- SHIPPING -->
        <div class="col-lg-4 mb-4">
            <div class="cart-box">
                <h3>Estimate Shipping & Tax</h3>
                <p class="text-muted mb-4">Enter your delivery location</p>

                <form>
                    <div class="form-group mb-3">
                        <label class="small text-muted">Country</label>
                        <input type="text" class="form-control" placeholder="Enter country">
                    </div>

                    <div class="form-group mb-3">
                        <label class="small text-muted">State / Province</label>
                        <input type="text" class="form-control" placeholder="Enter state">
                    </div>

                    <div class="form-group">
                        <label class="small text-muted">ZIP / Postal Code</label>
                        <input type="text" class="form-control" placeholder="Enter ZIP">
                    </div>
                </form>
            </div>
        </div>

        <!-- TOTAL -->
        <div class="col-lg-4 mb-4">
            <div class="cart-box">
                <h3>Cart Totals</h3>
                <hr>
                <p class="d-flex justify-content-between" style="font-size:18px;font-weight:700;">
                    <span>Total</span>
                    <span>₹ {{ $sum }}</span>
                </p>

                <a href="{{ route('chechout') }}"
                   class="btn btn-primary py-3 w-100 mt-3">
                    Proceed to Checkout
                </a>
            </div>
        </div>

    </div>

</div>
</section>

@endsection
