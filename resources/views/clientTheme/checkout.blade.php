<?php
  $uid = DB::table('customers')->where('email', session('user'))->select('id')->get();
?>

@extends('clientTheme.include.master')

@section('content')

<style>
/* ================= PAGE BACKGROUND ================= */
.checkout-page {
    background: #f5f7fb;
}

/* ================= LEFT FORM ================= */
.checkout-form {
    background: #fff;
    border-radius: 14px;
    padding: 30px;
    border: 1px solid #e5e7eb;
}
.checkout-form h3 {
    font-weight: 700;
    margin-bottom: 25px;
}

/* INPUTS */
.checkout-form label {
    font-size: 13px;
    font-weight: 600;
    color: #444;
}
.checkout-form .form-control {
    border-radius: 8px;
    padding: 10px 14px;
    border: 1px solid #d1d5db;
}
.checkout-form .form-control:focus {
    border-color: #2563eb;
    box-shadow: none;
}

/* ================= PAYMENT PANEL ================= */
.payment-panel {
    background: #fff;
    border-radius: 14px;
    padding: 25px;
    border: 1px solid #e5e7eb;
    position: sticky;
    top: 90px;
}
.payment-panel h4 {
    font-weight: 700;
    margin-bottom: 20px;
}

/* PAYMENT OPTIONS */
.payment-panel label {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 14px 16px;
    border: 1.5px solid #d1d5db;
    border-radius: 10px;
    margin-bottom: 12px;
    cursor: pointer;
    font-weight: 500;
    transition: all 0.25s ease;
}
.payment-panel label:hover {
    border-color: #2563eb;
    background: #f0f5ff;
}
.payment-panel input[type="radio"] {
    transform: scale(1.2);
    cursor: pointer;
}

/* PLACE ORDER BUTTON */
.place-btn {
    width: 100%;
    padding: 14px;
    border-radius: 10px;
    font-weight: 600;
    margin-top: 10px;
    box-shadow: 0 6px 18px rgba(37,99,235,0.35);
}

/* ================= NEWSLETTER ================= */
.newsletter-box {
    background: #fff;
    border-radius: 14px;
    padding: 30px;
    border: 1px solid #e5e7eb;
}
.newsletter-box .form-control {
    border-radius: 30px 0 0 30px;
}
.newsletter-box .submit {
    border-radius: 0 30px 30px 0;
    font-weight: 600;
}
</style>

<section class="ftco-section checkout-page">
    <div class="container">

        <div class="row">

            <!-- LEFT: BILLING FORM -->
            <div class="col-lg-8 mb-4 ftco-animate">
                <div class="checkout-form">
                    <h3>Billing Information</h3>

                    <form>
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Street Address</label>
                                    <input type="text" class="form-control" placeholder="House number and street name">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>State</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Town / City</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Postcode / ZIP</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>

            <!-- RIGHT: PAYMENT -->
            <div class="col-lg-4 mb-4 ftco-animate">
                <div class="payment-panel">
                    <h4>Payment Method</h4>

                    <label>
                        <input type="radio" name="optradio">
                        Cash Payment
                    </label>

                    <label>
                        <input type="radio" name="optradio">
                        UPI
                    </label>

                    <a href="#" class="btn btn-primary place-btn">
                        Place Order
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- NEWSLETTER -->
<section class="ftco-section py-5 bg-light">
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-8 ftco-animate">
                <div class="newsletter-box text-center">
                    <h3 class="mb-2">Subscribe to our Newsletter</h3>
                    <p class="text-muted mb-4">
                        Get email updates about latest products & offers
                    </p>

                    <form>
                        <div class="form-group d-flex">
                            <input type="text" class="form-control" placeholder="Enter email address">
                            <input type="submit" value="Subscribe" class="submit btn btn-primary px-4">
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection
