<?php 
use Illuminate\Support\Facades\Auth;
$cart = auth()->check()
        ? Cart::session(auth()->id())->getContent()
        : Cart::session(session()->getId())->getContent();

    $cartCount = $cart->count();
    ?>

<style>
    .preloader img {
        width: 10% !important;
    }

    /* Overlay */
    /* Overlay */
    .popup-overlay {
        display: none;
        position: fixed;
        inset: 0;
        background: rgba(0, 0, 0, 0.6);
        justify-content: center;
        align-items: center;
        z-index: 9999;
    }

    /* Modal Box */
    .popup-box {
        background: #fff;
        width: 400px;
        max-width: 90%;
        padding: 25px;
        border-radius: 10px;
        position: relative;
        animation: fadeIn 0.3s ease-in-out;
    }

    /* Close */
    .popup-close {
        position: absolute;
        top: 12px;
        right: 15px;
        font-size: 22px;
        cursor: pointer;
        color: #666;
    }

    /* Tabs */
    .popup-tabs {
        display: flex;
        margin-bottom: 15px;
    }

    .popup-tab {
        flex: 1;
        padding: 10px;
        border: none;
        cursor: pointer;
        background: none;
        font-weight: bold;
        border-bottom: 2px solid transparent;
        color: #555;
    }

    .popup-tab.active {
        color: #e63946;
        border-color: #e63946;
    }

    /* Forms */
    .popup-content {
        display: none;
    }

    .popup-content.active {
        display: block;
    }

    label {
        display: block;
        margin: 10px 0 5px;
        font-size: 14px;
    }

    input {
        width: 100%;
        padding: 8px 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .popup-submit {
        width: 100%;
        padding: 10px;
        background: #e63946;
        color: #fff;
        border: none;
        border-radius: 5px;
        font-weight: bold;
        cursor: pointer;
    }

    .popup-submit:hover {
        background: #d62839;
    }

    /* Trigger Btn */
    .auth-btn {
        padding: 8px 15px;
        background: transparent;
        color: #fff;
        border: none;
        border-radius: 6px;
        cursor: pointer;
    }

    .auth-btn:hover {
        background: #d62839;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: scale(0.9);
        }

        to {
            opacity: 1;
            transform: scale(1);
        }
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
    <button type="button"
        class="search-box__close position-absolute inset-block-start-0 inset-inline-end-0 m-16 w-48 h-48 border border-gray-100 rounded-circle flex-center text-white hover-text-gray-800 hover-bg-white text-2xl transition-1">
        <i class="ph ph-x"></i>
    </button>
    <div class="container">
        <div class="position-relative">
            <input type="text" class="form-control py-16 px-24 text-xl rounded-pill pe-64"
                placeholder="Search for a product or brand">
            <button type="submit"
                class="w-48 h-48 bg-main-600 rounded-circle flex-center text-xl text-white position-absolute top-50 translate-middle-y inset-inline-end-0 me-8">
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
                <li class="border-right-item"><a href="{{url('/about')}}"
                        class="text-white text-sm hover-text-decoration-underline">About us</a></li>
                <li class="border-right-item"><a href="#"
                        class="text-white text-sm hover-text-decoration-underline">Returns Policy</a></li>
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
                    <button id="headerAuthBtn" class="auth-btn">Login / Register</button>
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
                        <input type="text"
                            class="search-form__input common-input py-13 ps-16 pe-18 rounded-end-pill pe-44"
                            placeholder="Search for a product or brand">
                        <button type="submit"
                            class="w-32 h-32 bg-main-600 rounded-circle flex-center text-xl text-white position-absolute top-50 translate-middle-y inset-inline-end-0 me-8">
                            <i class="ph ph-magnifying-glass"></i>
                        </button>
                    </div>
                </div>
            </form>

            <!-- Header Right -->
            <!-- <div class="header-right flex-align d-lg-block d-none">
                <div class="flex-align flex-wrap gap-12">
                 
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
            </div> -->
            <div class="header-right flex-align">
                <!-- <a href="tel:01234567890" class="bg-main-600 text-white p-12 h-100 hover-bg-main-800 flex-align gap-8 text-lg d-lg-flex d-none"> 
                    <div class="d-flex text-32"><i class="ph ph-phone-call"></i></div>
                    01- 234 567 890
                </a> -->
                <!-- Category Dropdown Start -->
                <div class="category on-hover-item">
                    <button type="button"
                        class="category__button flex-align gap-8 fw-medium p-16 border-end border-start border-gray-100 text-heading">
                        <span class="icon text-2xl d-xs-flex d-none"><i class="ph ph-dots-nine"></i></span>
                        <span class="d-sm-flex d-none">All</span> Categories
                        <span class="arrow-icon text-xl d-flex"><i class="ph ph-caret-down"></i></span>
                    </button>

                    <div
                        class="responsive-dropdown on-hover-dropdown common-dropdown nav-submenu p-0 submenus-submenu-wrapper">

                        <button type="button"
                            class="close-responsive-dropdown rounded-circle text-xl position-absolute inset-inline-end-0 inset-block-start-0 mt-4 me-8 d-lg-none d-flex">
                            <i class="ph ph-x"></i> </button>

                        <!-- Logo Start -->
                        <div class="logo px-16 d-lg-none d-block">
                            <a href="{{url('/')}}" class="link">
                                <img src="{{url('public/asset/images/logo/nglogo.png')}}" alt="Logo">
                            </a>
                        </div>
                        <!-- Logo End -->

                        <ul class="scroll-sm p-0 py-8 w-300 max-h-400 overflow-y-auto">
                            @foreach($categories as $cat)
                            <li class="has-submenus-submenu">
                                <a href="javascript:void(0)"
                                    class="text-gray-500 text-15 py-12 px-16 flex-align gap-8 rounded-0">
                                    <span class="text-xl d-flex"><i class="ph ph-carrot"></i></span>
                                    <span>{{$cat->category_name}}</span>
                                    <span class="icon text-md d-flex ms-auto"><i class="ph ph-caret-right"></i></span>
                                </a>

                                <div class="submenus-submenu py-16">
                                    <h6 class="text-lg px-16 submenus-submenu__title">{{$cat->category_name}}</h6>
                                    <ul class="submenus-submenu__list max-h-300 overflow-y-auto scroll-sm">
                                        @foreach($subcategories as $subcat)
                                        @if($subcat->category_id == $cat->id)
                                        <li>
                                            <a href="shop.html">{{$subcat->subcategory_name}}</a>
                                        </li>
                                        @endif
                                        @endforeach

                                    </ul>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="me-16 d-lg-none d-block">
                    <div class="flex-align flex-wrap gap-12">
                        <button type="button" class="search-icon flex-align d-lg-none d-flex gap-4 item-hover">
                            <span class="text-2xl text-gray-700 d-flex position-relative item-hover__text">
                                <i class="ph ph-magnifying-glass"></i>
                            </span>
                        </button>
                       
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
                <button type="button" class="toggle-mobileMenu d-lg-none ms-3n text-gray-800 text-4xl d-flex"> <i
                        class="ph ph-list"></i> </button>
            </div>
             <div class="header-right flex-align d-lg-block d-none">
                <div class="flex-align flex-wrap gap-12">
                 
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
                        <li class="nav-menu__item activePage"><a href="{{url('/')}}" class="nav-menu__link">Home</a>
                        </li>
                        <li class="nav-menu__item"><a href="javascript:void(0)" class="nav-menu__link">Shop</a></li>
                        <li class="nav-menu__item"><a href="{{url('/about')}}" class="nav-menu__link">About Us</a></li>
                        <li class="nav-menu__item"><a href="{{url('/contact')}}" class="nav-menu__link">Contact Us</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- <div class="header-right flex-align">
                <button type="button" class="toggle-mobileMenu d-lg-none ms-3n text-gray-800 text-4xl d-flex">
                    <i class="ph ph-list"></i>
                </button>
            </div> -->
        </nav>
    </div>
</header>
<!-- Authentication Modal -->

<div id="headerAuthModal" class="popup-overlay">
    <div class="popup-box">
        <span class="popup-close" id="headerAuthClose">&times;</span>

        <!-- Tabs -->
        <div class="popup-tabs">
            <button class="popup-tab active" data-tab="header-login">Login</button>
            <button class="popup-tab" data-tab="header-register">Register</button>
        </div>

        <!-- Login -->
        <div id="header-login" class="popup-content active">
            <h2>Login</h2>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <label>Email</label>
                <input type="email" name="email" required>

                <label>Password</label>
                <input type="password" name="password" required>

                <button type="submit" class="popup-submit">Login</button>
            </form>
        </div>

        <!-- Register -->
        <div id="header-register" class="popup-content">
            <h2>Register</h2>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <label>Name</label>
                <input type="text" name="name" required>

                <label>Email</label>
                <input type="email" name="email" required>

                <label>Password</label>
                <input type="password" name="password" required>

                <label>Confirm Password</label>
                <input type="password" name="password_confirmation" required>

                <button type="submit" class="popup-submit">Register</button>
            </form>
        </div>
    </div>
</div>



<!-- Scripts -->
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const modal = document.getElementById("headerAuthModal");
        const openBtn = document.getElementById("headerAuthBtn");
        const closeBtn = document.getElementById("headerAuthClose");
        const tabBtns = modal.querySelectorAll(".popup-tab");
        const tabContents = modal.querySelectorAll(".popup-content");

        // Open
        openBtn.addEventListener("click", () => {
            modal.style.display = "flex";
            tabBtns[0].click(); // default to login
        });

        // Close
        closeBtn.addEventListener("click", () => {
            modal.style.display = "none";
        });
        window.addEventListener("click", e => {
            if (e.target === modal) modal.style.display = "none";
        });

        // Tabs
        tabBtns.forEach(btn => {
            btn.addEventListener("click", () => {
                tabBtns.forEach(b => b.classList.remove("active"));
                tabContents.forEach(c => c.classList.remove("active"));
                btn.classList.add("active");
                modal.querySelector("#" + btn.dataset.tab).classList.add("active");
            });
        });
    });
</script>



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