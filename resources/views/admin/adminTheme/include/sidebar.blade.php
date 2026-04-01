<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <div class="brand-link">
      <span class="brand-text font-weight-light ml-4">CackShop Admin </span>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('adminTheme/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{DB::table('users')->where('name',Auth::user()->name)->value('name');}} - Admin</a>
        </div>
      </div>
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="{{url('admin')}}" class="nav-link <?php if($_SERVER['REQUEST_URI']=="/admin"){echo "active";}else{echo "";} ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('/admin/category')}}" class="nav-link <?php if($_SERVER['REQUEST_URI']=="/admin/category"){echo "active";}else{echo "";} ?>">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Category
                <span class="badge badge-info right">{{DB::table('categories')->count();}}</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('/admin/subcategory')}}" class="nav-link <?php if($_SERVER['REQUEST_URI']=="/admin/subcategory"){echo "active";}else{echo "";} ?>">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Sub Category
                <span class="badge badge-info right">{{DB::table('subcategories')->count();}}</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('/admin/products')}}" class="nav-link <?php if($_SERVER['REQUEST_URI']=="/admin/products"){echo "active";}else{echo "";} ?>">
              <i class="nav-icon fas fa-briefcase"></i>
              <p>
                Products
                <span class="badge badge-info right">{{DB::table('products')->count();}}</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('/admin/customers')}}" class="nav-link <?php if($_SERVER['REQUEST_URI']=="/admin/customers"){echo "active";}else{echo "";} ?>">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Clients
                <span class="badge badge-info right">{{DB::table('customers')->count();}}</span>
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>