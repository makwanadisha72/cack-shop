@extends('admin.adminTheme.default')
<?php
// echo "<pre>";
//   print_r($product);
// echo "</pre>";
//   EXIT();
?>
@section('style')
  <link rel="stylesheet" href="{{asset('adminTheme/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('adminTheme/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('adminTheme/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endsection
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Products</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('/admin')}}">Home</a></li>
            <li class="breadcrumb-item active">Products</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <!-- Main content -->
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Edit Product</h3>
      <a href="{{ route('products.index') }}" class="btn btn-primary float-right">BACK</a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
    <div class="card card-primary">
              <!-- /.card-header -->
              @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                  @foreach ($errors->all() as $error)
                      <p>{{$error}}
                        <button type="button" class="close" data-dismiss="alert" aria-lable="Close">
                          <span area-hiddeen="true">&times;</span></button></p>
                  @endforeach
                </div>
              @endif
              <!-- form start -->
              <form action="{{route('products.update',$product)}}" method="post" enctype="multipart/form-data">
                @csrf
                {{-- <pre>
                    @php
                        print_r($errors->all);
                    @endphp
                </pre> --}}
                @method('PUT')
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" value="{{$product->name}}" class="form-control" name="name" id="exampleInputEmail1" placeholder="Enter name">
                    <span class="text-danger">
                        {{-- @error('name')
                            {{$message}}
                        @enderror --}}
                    </span>
                  </div>
                  <div class="form-group">
                    <label for="MainCategory" >Choose Sub Category</label><br>
                    <select id="MainCategory" class="form-control" name="subcat_name">
                      @foreach($subcategories as $k)
                        @if($k['name']==$product['subcat_name'])
                        <option value="<?php echo $k['name']; ?>" selected><?php echo $k['name']; ?></option>
                        @else
                        <option value="<?php echo $k['name']; ?>" ><?php echo $k['name']; ?></option>
                        @endif
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Price</label>
                    {{-- <i class="nav-icon fas fa-rupee-sign"></i> --}}
                    <input type="number" class="form-control" value="<?php echo $product['price']; ?>" name="price" placeholder="Enter price in Rs.">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Description</label>
                        <textarea name="description" id="" class="form-control" placeholder="Description">{{$product->description}}</textarea>
                        <span class="text-danger">
                            {{-- @error('description')
                                {{$message}}
                            @enderror --}}
                        </span>
                  </div>
                  <div class="form-group">
                    Old image: <br>
                        <img src="/image/products/{{$product->image}}" width="150px" alt="">
                  </div>
                    <div class="form-group">
                    <label for="exampleInputFile">New Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Change Image</label>
                      </div>
                      <span class="text-danger">
                        {{-- @error('image')
                            {{$message}}
                        @enderror --}}
                      </span>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Edit</button>
                </div>
              </form>
            </div>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.content -->
</div>
@endsection