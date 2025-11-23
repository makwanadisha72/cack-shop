<?php $user = session('user'); ?>
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
  <div class="container">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="oi oi-menu"></span> Menu
    </button>
    <div class="collapse navbar-collapse" id="ftco-nav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item text-center <?php if($_SERVER['REQUEST_URI']=="/home"){echo "active";}else{echo "";} ?>"><a href="{{url('/')}}" class="nav-link">Home</a></li>
        <li class="nav-item text-center <?php if($_SERVER['REQUEST_URI']=="/aboutus"){echo "active";}else{echo "";} ?>"><a href="{{url('aboutus')}}" class="nav-link">About</a></li>
        <li class="nav-item  text-center <?php if($_SERVER['REQUEST_URI']=="/products"){echo "active";}else{echo "";} ?>"><a href="{{url('products')}}" class="nav-link">All Products</a></li>
        <li class="nav-item text-center <?php if($_SERVER['REQUEST_URI']=="/cart"){echo "active";}else{echo "";} ?>"><a href="{{url('cart')}}" class="nav-link"><span class="icon-shopping_cart"></span></a></li>        
      </ul>
    </div>
  </div>
</nav>