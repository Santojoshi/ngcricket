<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ config('app.name','Shop') }}</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
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
  
  <style>

    .rounded-20{ border-radius:20px; }
    .form-section-title{ font-weight:600; margin-bottom:.5rem; }
  </style>
</head>
<body>

@include('front.header')
<main class="py-4">
  @yield('content')
</main>
@include('front.footer')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
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
@stack('scripts')
</body>
</html>
