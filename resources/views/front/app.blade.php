<!DOCTYPE html>
<html lang="en">
<head>
    <title>NG Sports - Cricket Helmet | Sportswear | Cricket Jersey | Cricket Batting Gloves</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta name="description" content="">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{url('public/asset/css/bootstrap.min.css')}}">
    <!-- select 2 -->
    <link rel="stylesheet" href="{{url('public/asset/css/select2.min.css')}}">
    <!-- Slick -->
    <link rel="stylesheet" href="{{url('public/asset/css/slick.css')}}">
    <!-- Jquery Ui -->
    <link rel="stylesheet" href="{{url('public/asset/css/jquery-ui.css')}}">
    <!-- animate -->
    <link rel="stylesheet" href="{{url('public/asset/css/animate.css')}}">
    <!-- AOS Animation -->
    <link rel="stylesheet" href="{{url('public/asset/css/aos.css')}}">
    <!-- Main css -->
    <link rel="stylesheet" href="{{url('public/asset/css/main.css')}}">
    @yield('style')
    <!-- script
    ================================================== -->
  </head>



<body>

@include('front.header')


@yield('frontcontent')

@include('front.footer')






@yield('script')

<!-- Jquery js -->
<script src="{{url('public/asset/js/jquery-3.7.1.min.js')}}"></script>
    <!-- Bootstrap Bundle Js -->
    <script src="{{url('public/asset/js/boostrap.bundle.min.js')}}"></script>
    <!-- Bootstrap Bundle Js -->
    <script src="{{url('public/asset/js/phosphor-icon.js')}}"></script>
    <!-- Select 2 -->
    <script src="{{url('public/asset/js/select2.min.js')}}"></script>
    <!-- Slick js -->
    <script src="{{url('public/asset/js/slick.min.js')}}"></script>
    <!-- Slick js -->
    <script src="{{url('public/asset/js/count-down.js')}}"></script>
    <!-- jquery UI js -->
    <script src="{{url('public/asset/js/jquery-ui.js')}}"></script>
    <!-- wow js -->
    <script src="{{url('public/asset/js/wow.min.js')}}"></script>
    <!-- AOS Animation -->
    <script src="{{url('public/asset/js/aos.js')}}"></script>
    <!-- marque -->
    <script src="{{url('public/asset/js/marque.min.js')}}"></script>
    <!-- marque -->
    <script src="{{url('public/asset/js/vanilla-tilt.min.js')}}"></script>
    <!-- Counter -->
    <script src="{{url('public/asset/js/counter.min.js')}}"></script>
    <!-- main js -->
    <script src="{{url('public/asset/js/main.js')}}"></script>

</body>
</html>