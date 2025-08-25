<?php 
use Illuminate\Support\Facades\Auth;
$cartCount = Cart::getContent()->count();
?>

<style>
    .preloader img{
        width: 10% !important;
    }
</style>    

<!--==================== Preloader Start ====================-->
<div class="preloader">
    <img src="{{url('public/asset/images/icon/loader.gif')}}" alt="">
</div>
<!--==================== Preloader End ====================-->

<!--==================== Overlay Start ====================-->
<div class="overlay"></div>
<!--==================== Overlay End ====================-->

<div class="side-overlay"></div>

<div class="progress-wrap">
  <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
      <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
  </svg>
</div>

<!-- ==================== Search Box Start Here ==================== -->
<form action="#" class="search-box">
  <button type="button" class="search-box__close position-absolute inset-block-start-0 inset-inline-end-0 m-16 w-48 h-48 border border-gray-100 rounded-circle flex-center text-white hover-text-gray-800 hover-bg-white text-2xl transition-1">
    <i class="ph ph-x"></i>
  </button>
  <div class="container">
    <div class="position-relative">
      <input type="text" class="form-control py-16 px-24 text-xl rounded-pill pe-64" placeholder="Search for a product or brand">
      <button type="submit" class="w-48 h-48 bg-main-600 rounded-circle flex-center text-xl text-white position-absolute top-50 translate-middle-y inset-inline-end-0 me-8">
        <i class="ph ph-magnifying-glass"></i>
      </button>
    </div>
  </div>
</form>
<!-- ==================== Search Box End Here ==================== -->

<!-- ==================== Mobile Menu ==================== -->
<div class="mobile-menu scroll-sm d-lg-none d-block">
    <button type="button" class="close-button"> <i class="ph ph-x"></i> </button>
    <div class="mobile-menu__inner">
        <a href="{{url('/')}}" class="mobile-menu__logo">
            <img src="{{url('public/asset/images/logo/nglogo.jpg')}}" alt="Logo">
        </a>
        <div class="mobile-menu__menu">
            <ul class="nav-menu flex-align nav-menu--mobile">
                <li class="nav-menu__item activePage"><a href="{{url('/')}}" class="nav-menu__link">Home</a></li>
                <li class="nav-menu__item"><a href="javascript:void(0)" class="nav-menu__link">Shop</a></li>
                <li class="nav-menu__item"><a href="{{url('/about')}}" class="nav-menu__link">About Us</a></li>
                <li class="nav-menu__item"><a href="{{url('/contact')}}" class="nav-menu__link">Contact Us</a></li>
            </ul>
        </div>
    </div>
</div>

<!-- ======================= Top Header ========================= -->
<div class="header-top bg-main-600 flex-between">
    <div class="container container-lg">
        <div class="flex-between flex-wrap gap-8">
            <ul class="flex-align flex-wrap d-none d-md-flex">
                <li class="border-right-item"><a href="{{url('/about')}}" class="text-white text-sm hover-text-decoration-underline">About us</a></li>
                <li class="border-right-item"><a href="#" class="text-white text-sm hover-text-decoration-underline">Returns Policy</a></li>
            </ul>
            <ul class="header-top__right flex-align flex-wrap">
                <li class="border-right-item">
                    @if(Auth::check())
                        <span class="text-white text-sm">Hi, {{ Auth::user()->name }}</span> | 
                        <form action="{{ route('logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="text-white text-sm hover-underline">Logout</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="text-white text-sm">Login</a> / 
                        <a href="{{ route('register') }}" class="text-white text-sm">Register</a>
                    @endif
                </li>
            </ul>
        </div>
    </div>
</div>

<!-- ======================= Middle Header ========================= -->
<header class="header-middle border-bottom border-gray-100">
    <div class="container container-lg">
        <nav class="header-inner flex-between">
            <!-- Logo -->
            <div class="logo">
                <a href="{{url('/')}}" class="link">
                    <img src="{{url('public/asset/images/logo/nglogo.png')}}" alt="Logo">
                </a>
            </div>

            <!-- Search -->
            <form action="#" class="flex-align flex-wrap form-location-wrapper">
                <div class="search-category d-flex h-48 select-border-end-0 radius-end-0 search-form d-sm-flex d-none">
                    <select class="js-example-basic-single border border-gray-200 border-end-0" name="state">
                        <option value="1" selected disabled>All Categories</option>
                        @foreach($categories as $cat)
                            <option value="{{$cat->category_id}}">{{$cat->category_name}}</option>
                        @endforeach
                    </select>
                    <div class="search-form__wrapper position-relative">
                        <input type="text" class="search-form__input common-input py-13 ps-16 pe-18 rounded-end-pill pe-44" placeholder="Search for a product or brand">
                        <button type="submit" class="w-32 h-32 bg-main-600 rounded-circle flex-center text-xl text-white position-absolute top-50 translate-middle-y inset-inline-end-0 me-8">
                            <i class="ph ph-magnifying-glass"></i>
                        </button>
                    </div>
                </div>
            </form>

            <!-- Header Right -->
            <div class="header-right flex-align d-lg-block d-none">
                <div class="flex-align flex-wrap gap-12">
                    <!-- Cart -->
                    <a href="{{ route('cart.index') }}" class="flex-align gap-4 item-hover">
                        <span class="text-2xl text-gray-700 d-flex position-relative me-6 mt-6 item-hover__text">
                            <i class="ph ph-shopping-cart-simple"></i>
                            <span id="cart-count" class="w-16 h-16 flex-center rounded-circle bg-main-600 text-white text-xs position-absolute top-n6 end-n4">
                                {{ $cartCount }}
                            </span>
                        </span>
                        <span class="text-md text-gray-500 item-hover__text d-none d-lg-flex">Cart</span>
                    </a>
                </div>
            </div>
        </nav>
    </div>
</header>

<!-- ======================= Bottom Nav ========================= -->
<header class="header bg-white border-bottom border-gray-100">
    <div class="container container-lg">
        <nav class="header-inner d-flex justify-content-between gap-8">
            <div class="flex-align menu-category-wrapper">
                <div class="header-menu d-lg-block d-none">
                    <ul class="nav-menu flex-align">
                        <li class="nav-menu__item activePage"><a href="{{url('/')}}" class="nav-menu__link">Home</a></li>
                        <li class="nav-menu__item"><a href="javascript:void(0)" class="nav-menu__link">Shop</a></li>
                        <li class="nav-menu__item"><a href="{{url('/about')}}" class="nav-menu__link">About Us</a></li>
                        <li class="nav-menu__item"><a href="{{url('/contact')}}" class="nav-menu__link">Contact Us</a></li>
                    </ul>
                </div>
            </div>
            <div class="header-right flex-align">
                <button type="button" class="toggle-mobileMenu d-lg-none ms-3n text-gray-800 text-4xl d-flex"> 
                    <i class="ph ph-list"></i> 
                </button>
            </div>
        </nav>
    </div>
</header>

<!-- Scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function updateCartCount() {
        $.get("{{ route('cart.count') }}", function (data) {
            $('#cart-count').text(data.count);
        });
    }

    function addToCart(productId) {
        $.ajax({
            url: "/cart/add/" + productId, // ✅ Fix: include productId in URL
            method: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                quantity: 1
            },
            success: function (response) {
                updateCartCount();
                Swal.fire({
                    icon: 'success',
                    title: 'Added!',
                    text: response.message ?? 'Item added to cart',
                    toast: true,
                    position: 'top-end',
                    timer: 1500,
                    showConfirmButton: false
                });
            }
        });
    }

    $(document).ready(function () {
        updateCartCount();
    });
</script>
