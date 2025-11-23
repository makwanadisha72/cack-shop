<?php
if (session()->has('user')) {
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laptop Shop</title>

        @include('clientTheme.include.style')
		@yield('style')
    </head>
    <body class="goto-here">
		@include('clientTheme.include.header')
		@yield('header')
		@include('clientTheme.include.menu')
		@yield('menu')
    <!-- END nav -->
    

	<!-- Main Content Starts Here -->
		@yield('content')
	<!-- Main Content Ends Here -->
    

	@include('clientTheme.include.footer')
		@yield('footer')

	<!-- Script Start -->
	@include('clientTheme.include.script')
	@yield('script')
	<!-- Script End -->
  </body>
</html>
<?php
}else{
	header('Location: /singhin'); // Replace '/login' with your actual login route
  exit();
}
?>