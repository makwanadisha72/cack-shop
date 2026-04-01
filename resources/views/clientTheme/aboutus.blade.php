@extends('clientTheme.include.master')

@section('content')

<style>
/* SECTION TITLE */
.section-title {
    text-align: center;
    margin-bottom: 40px;
}
.section-title h2 {
    font-weight: 700;
    color: #333;
}
.section-title p {
    color: #666;
    max-width: 700px;
    margin: auto;
}

/* ABOUT CARD */
.about-card {
    background: #ffffff;
    border-radius: 15px;
    padding: 40px;
    box-shadow: 0 12px 30px rgba(0,0,0,0.08);
}

/* MISSION BOX */
.mission-box {
    background: #f8f9fa;
    border-left: 5px solid #1e90ff;
    padding: 25px;
    border-radius: 10px;
}

/* SERVICE CARD */
.service-card {
    background: #ffffff;
    border-radius: 16px;
    padding: 35px 25px;
    text-align: center;
    box-shadow: 0 10px 25px rgba(0,0,0,0.08);
    transition: 0.3s;
}
.service-card:hover {
    transform: translateY(-8px);
}
.service-icon {
    width: 80px;
    height: 80px;
    background: #1e90ff;
    color: #fff;
    border-radius: 50%;
    font-size: 34px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 20px;
}
.service-card h4 {
    font-weight: 600;
    margin-bottom: 10px;
}
.service-card p {
    color: #666;
}
</style>

<!-- ABOUT SECTION -->
<section class="ftco-section bg-light">
    <div class="container">

        <div class="section-title">
            <h2>About CackShop</h2>
            <p>Your trusted destination for modern technology and smart digital solutions</p>
        </div>

        <div class="row align-items-center">
            <div class="col-md-6 mb-4 ftco-animate">
                <div class="about-card">
                    <h3 class="mb-3">Who We Are</h3>
                    <p>
                        <strong>CackShop</strong> is a growing eCommerce platform focused on delivering
                        innovative gadgets and reliable technology products that simplify everyday life.
                        We combine affordability, quality, and convenience into one seamless shopping
                        experience.
                    </p>
                    <p>
                        From personal use to professional needs, our carefully selected products help
                        you stay connected, productive, and ahead of the curve.
                    </p>
                </div>
            </div>

            <div class="col-md-6 mb-4 ftco-animate">
                <div class="mission-box">
                    <h4>Our Mission</h4>
                    <p>
                        Our mission is to empower customers with advanced technology solutions that
                        transform ideas into reality. We focus on trust, transparency, and long-term
                        customer satisfaction.
                    </p>
                </div>
            </div>
        </div>

    </div>
</section>

<!-- SERVICES SECTION -->
<section class="ftco-section bg-light pt-0">
    <div class="container">

        <div class="section-title">
            <h2>Why Choose Us</h2>
            <p>We focus on quality, speed, and customer happiness</p>
        </div>

        <div class="row">

            <!-- SHIPPING -->
            <div class="col-md-4 mb-4 ftco-animate">
                <div class="service-card">
                    <div class="service-icon">
                        <span class="flaticon-shipped"></span>
                    </div>
                    <h4>Fast & Free Shipping</h4>
                    <p>Quick delivery with safe packaging on all eligible orders</p>
                </div>
            </div>

            <!-- QUALITY -->
            <div class="col-md-4 mb-4 ftco-animate">
                <div class="service-card">
                    <div class="service-icon" style="background:#28a745">
                        <span class="flaticon-award"></span>
                    </div>
                    <h4>Trusted Quality</h4>
                    <p>Every product is tested to ensure reliability and performance</p>
                </div>
            </div>

            <!-- SUPPORT -->
            <div class="col-md-4 mb-4 ftco-animate">
                <div class="service-card">
                    <div class="service-icon" style="background:#ff9800">
                        <span class="flaticon-customer-service"></span>
                    </div>
                    <h4>Customer Support</h4>
                    <p>Friendly assistance available 24/7 for your needs</p>
                </div>
            </div>

        </div>

    </div>
</section>

@endsection
