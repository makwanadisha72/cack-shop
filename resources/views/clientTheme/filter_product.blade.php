<?php
    $products = DB::table('products')->where('cat_name','=',$_GET['name'])->get();
    $categories = DB::table('categories')->get();
    // dd($categories);
?>

@extends('clientTheme.include.master')
@section('content')
  <section class="ftco-section">
      <div class="container">
          <div class="row justify-content-center">
              <div class="col-md-10 mb-5 text-center">
                  <ul class="product-category">
                      <li><a href="{{url('products')}}" class="<?php if($_SERVER['REQUEST_URI']=="/filter_product"){echo "active";}else{echo "";} ?>">All</a></li>
                        <?php
                            foreach($categories as $category){
                        ?>
                        <li><a href="/filter_product?name=<?php echo $category->name; ?>" class="<?php if($_SERVER['REQUEST_URI']=="/filter_product?name={{$category->name}}"){echo "active";}else{echo "";} ?>">{{$category->name}}</a></li>
                        <?php
                            }
                        ?>
                  </ul>
              </div>
          </div>
          <div class="row">
          <?php
            foreach($products as $product){
          ?>
              <div class="col-md-6 col-lg-3 ftco-animate">
                  <div class="product" style="height:400px">
                      <a href="{{ route('single_product',['id'=> $product->id] )}}" class="img-prod"><img class="img-fluid" src="../../image/products/<?php echo $product->image ?>" alt="Colorlib Template">                          
                        <div class="text py-3 pb-4 px-3 text-center">
                            <h3><a href="#">{{$product->name}}</a></h3>
                            <div class="d-flex">
                                <div class="pricing">
                                    <p class="price"><span class="price-sale">RS. {{$product->price}}</span></p>
                                </div>
                            </div>
                            <div class="bottom-area d-flex px-3">
                                <div class="m-auto d-flex">
                                    <a href="{{ url('addtocart',['id'=> $product->id] )}}" class="buy-now d-flex justify-content-center align-items-center mx-1">
                                        <span><i class="ion-ios-cart"></i></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                      </a>
                  </div>
              </div>
              <?php } ?>
          </div>
      </div>
  </section>
@endsection