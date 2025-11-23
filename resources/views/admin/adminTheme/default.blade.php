<!DOCTYPE html>
<?php
// echo "<pre>";
//   print_r($_SERVER);
// echo "</pre>";
//   EXIT();
?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard</title>

  <!-- style starts here -->
   @include('admin.adminTheme.include.style')
   @yield('style')
  <!-- style ends here -->
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- header starts here -->
    @include('admin.adminTheme.include.header')
  <!-- header end here -->

  <!-- Main Sidebar Starts here -->
   @include('admin.adminTheme.include.sidebar')
  <!-- Main Sidebar end here -->
  

  <!-- Content Wrapper. Contains page content -->
   <!-- Main Content Starts here -->
    @yield('content')
   <!-- Main Content Ends here -->
  <!-- /.content-wrapper -->
  <!-- Footer starts here -->
   @include('admin.adminTheme.include.footer')
  <!-- Footer ends here -->

  <!-- Control Sidebar -->
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<!-- script starts here -->
 @include('admin.adminTheme.include.script')
 @yield('script')
<!-- script endss here -->
</body>
</html>
