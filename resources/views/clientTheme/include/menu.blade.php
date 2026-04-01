<?php $user = session('user'); ?>

<style>
/* NAVBAR BASE */
.custom-navbar {
    background: #ffffff;
    box-shadow: 0 8px 20px rgba(0,0,0,0.08);
    padding: 12px 0;
}

/* NAV LINKS */
.custom-navbar .nav-link {
    color: #333 !important;
    font-weight: 600;
    padding: 8px 18px !important;
    border-radius: 25px;
    transition: all 0.3s ease;
}

/* HOVER */
.custom-navbar .nav-link:hover {
    background: rgba(30, 144, 255, 0.1);
    color: #1e90ff !important;
}

/* ACTIVE */
.custom-navbar .nav-item.active .nav-link {
    background: #1e90ff;
    color: #fff !important;
}

/* CART ICON */
.custom-navbar .icon-shopping_cart {
    font-size: 18px;
}

/* MOBILE */
.navbar-toggler {
    border: none;
}
.navbar-toggler:focus {
    outline: none;
    box-shadow: none;
}
</style>

<nav class="navbar navbar-expand-lg custom-navbar ftco_navbar" id="ftco-navbar">
    <div class="container">

        <!-- MOBILE TOGGLE -->
        <button class="navbar-toggler" type="button" data-toggle="collapse"
                data-target="#ftco-nav" aria-controls="ftco-nav"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span>
        </button>

        <!-- NAV -->
        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto align-items-center">

                <li class="nav-item text-center <?php echo ($_SERVER['REQUEST_URI']=="/" || $_SERVER['REQUEST_URI']=="/home") ? 'active' : ''; ?>">
                    <a href="{{ url('/') }}" class="nav-link">Home</a>
                </li>

                <li class="nav-item text-center <?php echo ($_SERVER['REQUEST_URI']=="/aboutus") ? 'active' : ''; ?>">
                    <a href="{{ url('aboutus') }}" class="nav-link">About</a>
                </li>

                <li class="nav-item text-center <?php echo ($_SERVER['REQUEST_URI']=="/products") ? 'active' : ''; ?>">
                    <a href="{{ url('products') }}" class="nav-link">All Products</a>
                </li>

                <li class="nav-item text-center <?php echo ($_SERVER['REQUEST_URI']=="/cart") ? 'active' : ''; ?>">
                    <a href="{{ url('cart') }}" class="nav-link">
                        <span class="icon-shopping_cart"></span>
                    </a>
                </li>

            </ul>
        </div>

    </div>
</nav>
