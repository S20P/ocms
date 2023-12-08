  <!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>{{ config('app.name', 'Laravel') }}</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
 
   @include('admin.partials.head')

</head>
<body>
   <!-- ======= Header ======= -->
  @include('admin.partials.header')
  <!-- =======END Header ======= -->
   
  <!-- ======= Sidebar ======= --> 
  @include('admin.partials.sidebar')
  <!-- =======END Sidebar ======= -->

  <main id="main" class="main">

    
    <!-- Welcome, {{ auth()->guard('admin')->user()->name }} <br> -->


    @yield('content')  

  </main><!-- End #main --> 


<!-- ======= Footer ======= --> 

 @include('admin.partials.footer-scripts')
 <!-- =======END Footer ======= -->
   
</body>
</html>