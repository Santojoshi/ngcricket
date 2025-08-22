@extends('front.app')

@section('style')

<style>
    .rounded-circle a img {
        width: 70%;
    }
</style>


@endsection

@section('frontcontent')
<!-- 
<div class="banner">
    <div class="container container-lg">
        <div class="banner-item rounded-24 overflow-hidden position-relative arrow-center">
            <a href="#featureSection"
                class="scroll-down w-84 h-84 text-center flex-center bg-main-600 rounded-circle border border-5 text-white border-white position-absolute start-50 translate-middle-x bottom-0 hover-bg-main-800">
                <span class="icon line-height-0"><i class="ph ph-caret-double-down"></i></span>
            </a>

            <img src="{{url('public/asset/images/bg/nghelmet.png')}}" alt=""
                class="banner-img position-absolute inset-block-start-0 inset-inline-start-0 w-100 h-100 z-n1 object-fit-cover rounded-24">

            <div class="flex-align">
                <button type="button" id="banner-prev"
                    class="slick-prev slick-arrow flex-center rounded-circle bg-white text-xl hover-bg-main-600 hover-text-white transition-1">
                    <i class="ph ph-caret-left"></i>
                </button>
                <button type="button" id="banner-next"
                    class="slick-next slick-arrow flex-center rounded-circle bg-white text-xl hover-bg-main-600 hover-text-white transition-1">
                    <i class="ph ph-caret-right"></i>
                </button>
            </div>

            <div class="banner-slider">
                <div class="banner-slider__item">
                    <div class="banner-slider__inner flex-between position-relative">
                        <div class="banner-item__content">
                            <h1 class="banner-item__title wow bounceInDown" data-wow-duration="1s">NEXT GEN <br>Ultimate
                                Head Protection Gear</h1>
                            <a href="shop.html"
                                class="btn btn-main d-inline-flex align-items-center rounded-pill gap-8 wow bounceInUp"
                                data-wow-duration="1s">
                                Explore Shop <span class="icon text-xl d-flex"><i
                                        class="ph ph-shopping-cart-simple"></i> </span>
                            </a>
                        </div>
                        <div class="banner-item__thumb wow bounceIn" data-wow-duration="1s" data-tilt data-tilt-max="12"
                            data-tilt-speed="500" data-tilt-perspective="5000" data-tilt-scale="1.06">
                            <img src="{{url('public/asset/images/bg/nghelmet.png')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
  @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
<div id="carouselExample" class="carousel slide">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="{{url('public/asset/images/bg/bannernew.jpeg')}}" class="d-block w-100" alt="...">
      </div>
    </div>
    <!-- <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button> -->
  </div>
<!-- ============================ Banner Section End =============================== -->

<!-- ============================ Category Section start =============================== -->
<div class="feature" id="featureSection">
    <div class="container container-lg">
        <div class="position-relative arrow-center">
            <div class="flex-align">
                <button type="button" id="feature-item-wrapper-prev"
                    class="slick-prev slick-arrow flex-center rounded-circle bg-white text-xl hover-bg-main-600 hover-text-white transition-1">
                    <i class="ph ph-caret-left"></i>
                </button>
                <button type="button" id="feature-item-wrapper-next"
                    class="slick-next slick-arrow flex-center rounded-circle bg-white text-xl hover-bg-main-600 hover-text-white transition-1">
                    <i class="ph ph-caret-right"></i>
                </button>
            </div>
            <div class="feature-item-wrapper">
                @foreach($category as $cat)
                <div class="feature-item text-center wow bounceIn" data-aos="fade-up" data-aos-duration="400">
                    <div class="feature-item__thumb rounded-circle">
                        <a href="{{ route('category.products', $cat->id) }}" class="w-70 h-100 flex-center">
                            <img class="category_img" src="{{url('public/upload/product/'.$cat->cat_img)}}" alt="">
                        </a>
                    </div>
                    <div class="feature-item__content mt-16">
                        <h6 class="text-lg mb-8"><a href="{{ route('category.products', $cat->id) }}" class="text-inherit">{{$cat->category_name}}</a>
                        </h6>
                        <span class="text-sm text-gray-400">125+ Products</span>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</div>
<!-- ============================ Category Section End =============================== -->


<!-- ========================= flash sales Start ================================ -->
<section class="flash-sales pt-80 overflow-hidden">
    <div class="container container-lg">
        <div class="section-heading">
            <div class="flex-between flex-wrap gap-8">
                <h5 class="mb-0 wow bounceInLeft">Featured Products</h5>
                <div class="flex-align gap-16 wow bounceInRight">
                    <a href="#"
                        class="text-sm fw-medium text-gray-700 hover-text-main-600 hover-text-decoration-underline">View
                        All Deals</a>
                    <div class="flex-align gap-8">
                        <button type="button" id="flash-prev"
                            class="slick-prev slick-arrow flex-center rounded-circle border border-gray-100 hover-border-main-600 text-xl hover-bg-main-600 hover-text-white transition-1">
                            <i class="ph ph-caret-left"></i>
                        </button>
                        <button type="button" id="flash-next"
                            class="slick-next slick-arrow flex-center rounded-circle border border-gray-100 hover-border-main-600 text-xl hover-bg-main-600 hover-text-white transition-1">
                            <i class="ph ph-caret-right"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="flash-sales__slider arrow-style-two">
            <div class="" data-aos="fade-up" data-aos-duration="600">
                <div
                    class="flash-sales-item rounded-16 overflow-hidden z-1 position-relative flex-align flex-0 justify-content-between gap-8">
                    <img src="{{url('public/asset/images/bg/flash-sale-bg1.png')}}" alt=""
                        class="position-absolute inset-block-start-0 inset-inline-start-0 w-100 h-100 object-fit-cover z-n1 flash-sales-item__bg">
                    <div class="flash-sales-item__thumb d-sm-block d-none">
                        <img src="{{url('public/asset/images/thumbs/flash-sale-img1.png')}}" alt="">
                    </div>
                    <div class="flash-sales-item__content ms-sm-auto">
                        <h6 class="text-32 mb-20">Power Bat</h6>
                        <div class="countdown" id="countdown1">
                            <ul class="countdown-list flex-align flex-wrap">
                                <li class="countdown-list__item text-heading flex-align gap-4 text-sm fw-medium"><span
                                        class="days"></span>Days</li>
                                <li class="countdown-list__item text-heading flex-align gap-4 text-sm fw-medium"><span
                                        class="hours"></span>Hours</li>
                                <li class="countdown-list__item text-heading flex-align gap-4 text-sm fw-medium"><span
                                        class="minutes"></span>Min</li>
                                <li class="countdown-list__item text-heading flex-align gap-4 text-sm fw-medium"><span
                                        class="seconds"></span>Sec</li>
                            </ul>
                        </div>
                        <a href="shop.html"
                            class="btn btn-main d-inline-flex align-items-center rounded-pill gap-8 mt-24">
                            Shop Now
                            <span class="icon text-xl d-flex"><i class="ph ph-arrow-right"></i></span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="" data-aos="fade-up" data-aos-duration="1000">
                <div
                    class="flash-sales-item rounded-16 overflow-hidden z-1 position-relative flex-align flex-0 justify-content-between gap-8">
                    <img src="{{url('public/asset/images/bg/flash-sale-bg2.png')}}" alt=""
                        class="position-absolute inset-block-start-0 inset-inline-start-0 w-100 h-100 object-fit-cover z-n1 flash-sales-item__bg">
                    <div class="flash-sales-item__thumb d-sm-block d-none">
                        <img src="{{url('public/asset/images/thumbs/flash-sale-img2.png')}}" alt="">
                    </div>
                    <div class="flash-sales-item__content ms-sm-auto">
                        <h6 class="text-32 mb-20">NG Helmat</h6>
                        <div class="countdown" id="countdown2">
                            <ul class="countdown-list flex-align flex-wrap">
                                <li class="countdown-list__item text-heading flex-align gap-4 text-sm fw-medium"><span
                                        class="days"></span>Days</li>
                                <li class="countdown-list__item text-heading flex-align gap-4 text-sm fw-medium"><span
                                        class="hours"></span>Hours</li>
                                <li class="countdown-list__item text-heading flex-align gap-4 text-sm fw-medium"><span
                                        class="minutes"></span>Min</li>
                                <li class="countdown-list__item text-heading flex-align gap-4 text-sm fw-medium"><span
                                        class="seconds"></span>Sec</li>
                            </ul>
                        </div>
                        <a href="shop.html"
                            class="btn btn-main d-inline-flex align-items-center rounded-pill gap-8 mt-24">
                            Shop Now
                            <span class="icon text-xl d-flex"><i class="ph ph-arrow-right"></i></span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="" data-aos="fade-up" data-aos-duration="1400">
                <div
                    class="flash-sales-item rounded-16 overflow-hidden z-1 position-relative flex-align flex-0 justify-content-between gap-8">
                    <img src="{{url('public/asset/images/bg/flash-sale-bg2.png')}}" alt=""
                        class="position-absolute inset-block-start-0 inset-inline-start-0 w-100 h-100 object-fit-cover z-n1 flash-sales-item__bg">
                    <div class="flash-sales-item__thumb d-sm-block d-none">
                        <img src="{{url('public/asset/images/thumbs/flash-sale-img2.png')}}" alt="">
                    </div>
                    <div class="flash-sales-item__content ms-sm-auto">
                        <h6 class="text-32 mb-20">NG Gloves</h6>
                        <div class="countdown" id="countdown3">
                            <ul class="countdown-list flex-align flex-wrap">
                                <li class="countdown-list__item text-heading flex-align gap-4 text-sm fw-medium"><span
                                        class="days"></span>Days</li>
                                <li class="countdown-list__item text-heading flex-align gap-4 text-sm fw-medium"><span
                                        class="hours"></span>Hours</li>
                                <li class="countdown-list__item text-heading flex-align gap-4 text-sm fw-medium"><span
                                        class="minutes"></span>Min</li>
                                <li class="countdown-list__item text-heading flex-align gap-4 text-sm fw-medium"><span
                                        class="seconds"></span>Sec</li>
                            </ul>
                        </div>
                        <a href="shop.html"
                            class="btn btn-main d-inline-flex align-items-center rounded-pill gap-8 mt-24">
                            Shop Now
                            <span class="icon text-xl d-flex"><i class="ph ph-arrow-right"></i></span>
                        </a>
                    </div>
                </div>
            </div>
        </div> -->
    </div>
</section>
<!-- ========================= flash sales End ================================ -->

<div class="product mt-24">
    <div class="container container-lg">
        <div class="row gy-4 g-12">
            @foreach($featured as $fet)

            <div class="col-xxl-2 col-lg-3 col-sm-4 col-6" data-aos="fade-up" data-aos-duration="200">
                <div
                    class="product-card px-8 py-16 border border-gray-100 hover-border-main-600 rounded-16 position-relative transition-2">
                    <a href="{{ route('cart.add', $fet->id) }}"
                        class="product-card__cart btn bg-main-50 text-main-600 hover-bg-main-600 hover-text-white py-11 px-24 rounded-pill flex-align gap-8 position-absolute inset-block-start-0 inset-inline-end-0 me-16 mt-16">
                        Add <i class="ph ph-shopping-cart"></i>
                    </a>

                    <a href="{{url('/product/'.$fet->id)}}" class="product-card__thumb flex-center">
                        <img src="{{url('public/upload/product/'.$fet->img1)}}" alt="">
                    </a>
                    <div class="product-card__content mt-12">
                        <div class="product-card__price mb-16">
                             @if($fet->us_price_cut)
                            <span class="text-gray-400 text-md fw-semibold text-decoration-line-through">
                                ${{$fet->us_price_cut}}
                                </span>
                                @endif
                            <span class="text-heading text-md fw-semibold ">${{$fet->us_price_actual}} <span
                                    class="text-gray-500 fw-normal"></span> </span>
                        </div>
                        <div class="flex-align gap-6">
                            <span class="text-xs fw-bold text-gray-600">4.8</span>
                            <span class="text-15 fw-bold text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                            <!-- <span class="text-xs fw-bold text-gray-600">(17k)</span> -->
                        </div>
                        <h6 class="title text-lg fw-semibold mt-12 mb-8">
                            <a href="{{url('/product/'.$fet->id)}}" class="link text-line-2">{{$fet->product_name}}</a>
                        </h6>
                        <div class="flex-align gap-4">
                            <span class="text-main-600 text-md d-flex"><i class="ph-fill ph-storefront"></i></span>
                            <span class="text-gray-500 text-xs">NG Special Collection</span>
                        </div>
                        <!-- <div class="mt-12">
                            <div class="progress w-100  bg-color-three rounded-pill h-4" role="progressbar" aria-label="Basic example" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100">
                                <div class="progress-bar bg-main-600 rounded-pill" style="width: 35%"></div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>

<!-- =========================== Offer Section Start =============================== -->
<section class="offer pt-80 pb-80">
    <div class="container container-lg">
        <div class="row gy-4">
            <div class="col-sm-6" data-aos="zoom-in" data-aos-duration="600">
                <div
                    class="offer-card position-relative rounded-16 bg-main-600 overflow-hidden p-16 flex-align gap-16 flex-wrap z-1">
                    <img src="{{url('public/asset/images/shape/offer-shape.png')}}" alt=""
                        class="position-absolute inset-block-start-0 inset-inline-start-0 z-n1 w-100 h-100 opacity-6">
                    <div class="offer-card__thumb d-lg-block d-none">
                        <img src="{{url('public/asset/images/steel.png')}}" alt="" >
                    </div>
                    <div class="py-xl-4">
                        <div class="offer-card__logo mb-16 w-80 h-80 flex-center bg-white rounded-circle">
                            <img src="{{url('public/asset/images/steel.png')}}" alt="">
                        </div>
                        <h4 class="text-white mb-8">PRO MAX STEEl</h4>
                        <div class="flex-align gap-8">
                            <span class="text-sm text-white">Delivery by 6:15am</span>
                            <!--<span class="text-sm text-main-two-600">expired Aug 5</span>-->
                        </div>
                        <a href="https://ngsportsusa.com/product/2"
                            class="mt-16 btn bg-white hover-text-white hover-bg-main-800 text-heading fw-medium d-inline-flex align-items-center rounded-pill gap-8"
                            tabindex="0">
                            Shop Now
                            <span class="icon text-xl d-flex"><i class="ph ph-arrow-right"></i></span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6" data-aos="zoom-in" data-aos-duration="800">
                <div
                    class="offer-card position-relative rounded-16 bg-main-600 overflow-hidden p-16 flex-align gap-16 flex-wrap z-1">
                    <img src="{{url('public/asset/images/shape/offer-shape.png')}}" alt=""
                        class="position-absolute inset-block-start-0 inset-inline-start-0 z-n1 w-100 h-100 opacity-6">
                    <div class="offer-card__thumb d-lg-block d-none">
                        <img src="{{url('public/asset/images/tit.png')}}" alt="">
                    </div>
                    <div class="py-xl-4">
                        <div class="offer-card__logo mb-16 w-80 h-80 flex-center bg-white rounded-circle">
                            <img src="{{url('public/asset/images/tit.png')}}" alt="">
                        </div>
                        <h4 class="text-white mb-8">Pro Max Titanium</h4>
                        <div class="flex-align gap-8">
                            <span class="text-sm text-white">Delivery by 6:15am</span>
                            <!--<span class="text-sm text-main-two-600">expired Aug 5</span>-->
                        </div>
                        <a href="https://ngsportsusa.com/product/1"
                            class="mt-16 btn bg-white hover-text-white hover-bg-main-800 text-heading fw-medium d-inline-flex align-items-center rounded-pill gap-8"
                            tabindex="0">
                            Shop Now
                            <span class="icon text-xl d-flex"><i class="ph ph-arrow-right"></i></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- =========================== Offer Section End =============================== -->

<!-- ========================= Recommended Start ================================ -->
<section class="recommended overflow-hidden">
    <div class="container container-lg">
        <div class="section-heading flex-between flex-wrap gap-16">
            <h5 class="mb-0 wow bounceInLeft">Products for you</h5>
            <ul class="nav common-tab nav-pills wow bounceInRight" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-all-tab" data-bs-toggle="pill" data-bs-target="#pills-all"
                        type="button" role="tab" aria-controls="pills-all" aria-selected="true">All</button>
                </li>
                @foreach($category as $navcat)
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-{{$navcat->id}}-tab" data-bs-toggle="pill" data-bs-target="#pills-{{$navcat->id}}"
                        type="button" role="tab" aria-controls="pills-{{$navcat->id}}" aria-selected="true">{{$navcat->category_name}}</button>
                </li>
                @endforeach
                
                
            </ul>
        </div>

        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab"
                tabindex="0">
                <div class="row g-12">
                        @foreach($products as $allprod)
                        <div class="col-xxl-2 col-lg-3 col-sm-4 col-6" data-aos="fade-up" data-aos-duration="200">
                            <div
                                class="product-card h-100 p-8 border border-gray-100 hover-border-main-600 rounded-16 position-relative transition-2">
                                <a href="{{url('/product/'.$allprod->id)}}" class="product-card__thumb flex-center">
                                    <img src="{{url('public/upload/product/'.$allprod->img1)}}" alt="">
                                </a>
                                <div class="product-card__content p-sm-2 w-100">
                                    <h6 class="title text-lg fw-semibold mt-12 mb-8">
                                        <a href="{{url('/product/'.$allprod->id)}}" class="link text-line-2">
                                            {{$allprod->product_name}}</a>
                                    </h6>
                                    <div class="flex-align gap-4">
                                        <span class="text-main-600 text-md d-flex"><i
                                                class="ph-fill ph-storefront"></i></span>
                                        <span class="text-gray-500 text-xs">By NG Sports</span>
                                    </div>
    
                                    <div class="product-card__content mt-12">
                                        <div class="product-card__price mb-8">
                                            <span class="text-heading text-md fw-semibold ">${{$allprod->us_price_actual}} <span
                                                    class="text-gray-500 fw-normal">/Qty</span> </span>
                                                @if($allprod->us_price_cut)
                                            <span class="text-gray-400 text-md fw-semibold text-decoration-line-through">
                                               $ {{$allprod->us_price_cut}}
                                            </span>
                                            @endif
                                        </div>
                                        <div class="flex-align gap-6">
                                            <span class="text-xs fw-bold text-gray-600">4.8</span>
                                            <span class="text-15 fw-bold text-warning-600 d-flex"><i
                                                    class="ph-fill ph-star"></i></span>
                                            <span class="text-xs fw-bold text-gray-600">(17k)</span>
                                        </div>
                                        <a href="{{ route('cart.add', $allprod->id) }}"
                                            class="product-card__cart btn bg-main-50 text-main-600 hover-bg-main-600 hover-text-white py-11 px-24 rounded-pill flex-align gap-8 mt-24 w-100 justify-content-center">
                                            Add To Cart <i class="ph ph-shopping-cart"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        @endforeach
                    </div>
                </div>
            @foreach($category as $catpill)
            <div class="tab-pane fade" id="pills-{{$catpill->id}}" role="tabpanel" aria-labelledby="pills-{{$catpill->id}}-tab"
            tabindex="0">
            <div class="row g-12">
                    @foreach($products as $navprod)
                    @if($navprod->category_id == $catpill->id)
                    <div class="col-xxl-2 col-lg-3 col-sm-4 col-6" data-aos="fade-up" data-aos-duration="200">
                        <div
                            class="product-card h-100 p-8 border border-gray-100 hover-border-main-600 rounded-16 position-relative transition-2">
                            <a href="{{url('/product/'.$navprod->id)}}" class="product-card__thumb flex-center">
                                <img src="{{url('public/upload/product/'.$navprod->img1)}}" alt="">
                            </a>
                            <div class="product-card__content p-sm-2 w-100">
                                <h6 class="title text-lg fw-semibold mt-12 mb-8">
                                    <a href="product-details.html" class="link text-line-2">
                                        {{$navprod->product_name}}</a>
                                </h6>
                                <div class="flex-align gap-4">
                                    <span class="text-main-600 text-md d-flex"><i
                                            class="ph-fill ph-storefront"></i></span>
                                    <span class="text-gray-500 text-xs">By Lucky Supermarket</span>
                                </div>

                                <div class="product-card__content mt-12">
                                    <div class="product-card__price mb-8">
                                        <span class="text-heading text-md fw-semibold ">$14.99 <span
                                                class="text-gray-500 fw-normal">/Qty</span> </span>
                                        <span class="text-gray-400 text-md fw-semibold text-decoration-line-through">
                                            $28.99</span>
                                    </div>
                                    <div class="flex-align gap-6">
                                        <span class="text-xs fw-bold text-gray-600">4.8</span>
                                        <span class="text-15 fw-bold text-warning-600 d-flex"><i
                                                class="ph-fill ph-star"></i></span>
                                        <span class="text-xs fw-bold text-gray-600">(17k)</span>
                                    </div>
                                    <a href="cart.html"
                                        class="product-card__cart btn bg-main-50 text-main-600 hover-bg-main-600 hover-text-white py-11 px-24 rounded-pill flex-align gap-8 mt-24 w-100 justify-content-center">
                                        Add To Cart <i class="ph ph-shopping-cart"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- ========================= Recommended End ================================ -->


<!-- ========================= hot-deals Start ================================ -->
<section class="hot-deals pt-80 overflow-hidden">
    <div class="container container-lg">
        <div class="section-heading">
            <div class="flex-between flex-wrap gap-8">
                <h5 class="mb-0 wow bounceInLeft">Hot Deals Todays</h5>
                <div class="flex-align gap-16 wow bounceInRight">
                    <a href="#"
                        class="text-sm fw-medium text-gray-700 hover-text-main-600 hover-text-decoration-underline">View
                        All Deals</a>
                    <div class="flex-align gap-8">
                        <button type="button" id="deals-prev"
                            class="slick-prev slick-arrow flex-center rounded-circle border border-gray-100 hover-border-main-600 text-xl hover-bg-main-600 hover-text-white transition-1">
                            <i class="ph ph-caret-left"></i>
                        </button>
                        <button type="button" id="deals-next"
                            class="slick-next slick-arrow flex-center rounded-circle border border-gray-100 hover-border-main-600 text-xl hover-bg-main-600 hover-text-white transition-1">
                            <i class="ph ph-caret-right"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

       <div class="row g-12">
            <div class="col-md-4" data-aos="zoom-in">
                <div class="hot-deals position-relative rounded-16 bg-main-600 overflow-hidden p-28 z-1 text-center">
                    <img src="{{url('public/asset/images/shape/offer-shape.png')}}" alt=""
                        class="position-absolute inset-block-start-0 inset-inline-start-0 z-n1 w-100 h-100 opacity-6">
                    <div class="hot-deals__thumb">
                        <img src="{{url('public/asset/images/steel.png')}}" alt="">
                    </div>
                    <div class="py-xl-4">
                        <h4 class="text-white mb-8">Nxt Gen Cricket Helmet</h4>
                        <div class="countdown my-32" id="countdown4">
                            <ul class="countdown-list flex-center flex-wrap">
                                <li
                                    class="countdown-list__item text-heading flex-align gap-4 text-sm fw-medium colon-white">
                                    <span class="days"></span>Days</li>
                                <li
                                    class="countdown-list__item text-heading flex-align gap-4 text-sm fw-medium colon-white">
                                    <span class="hours"></span>Hours</li>
                                <li
                                    class="countdown-list__item text-heading flex-align gap-4 text-sm fw-medium colon-white">
                                    <span class="minutes"></span>Min</li>
                                <li
                                    class="countdown-list__item text-heading flex-align gap-4 text-sm fw-medium colon-white">
                                    <span class="seconds"></span>Sec</li>
                            </ul>
                        </div>
                        <a href="https://ngsportsusa.com/product/1"
                            class="mt-16 btn btn-main-two fw-medium d-inline-flex align-items-center rounded-pill gap-8"
                            tabindex="0">
                            Shop Now
                            <span class="icon text-xl d-flex"><i class="ph ph-arrow-right"></i></span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="hot-deals-slider arrow-style-two">
                    @foreach($featured as $fet)
                    <div data-aos="fade-up" data-aos-duration="200">
                        <div
                            class="product-card h-100 p-8 border border-gray-100 hover-border-main-600 rounded-16 position-relative transition-2">
                            <!--<span class="product-card__badge bg-danger-600 px-8 py-4 text-sm text-white">Sale Upto 50%-->
                            <!--</span>-->
                            <a href="{{url('/product/'.$fet->id)}}" class="product-card__thumb flex-center">
                                <img src="{{url('public/upload/product/'.$fet->img1)}}" alt="">
                            </a>
                            <div class="product-card__content p-sm-2 w-100">
                                <h6 class="title text-lg fw-semibold mt-12 mb-8">
                                    <a href="{{url('/product/'.$fet->id)}}" class="link text-line-2">{{$fet->product_name}}</a>
                                </h6>
                                <div class="flex-align gap-4">
                                    <span class="text-main-600 text-md d-flex"><i
                                            class="ph-fill ph-storefront"></i></span>
                                    <span class="text-gray-500 text-xs">By NXT GEN</span>
                                </div>

                                <div class="product-card__content mt-12">
                                    <div class="product-card__price mb-8">
                                        <span class="text-heading text-md fw-semibold ">${{$fet->us_price_actual}}<span
                                                class="text-gray-500 fw-normal">/Qty</span> </span>
                                        <span class="text-gray-400 text-md fw-semibold text-decoration-line-through">
                                            ${{$fet->us_price_cut}}</span>
                                    </div>
                                    <div class="flex-align gap-6">
                                        <span class="text-xs fw-bold text-gray-600">4.8</span>
                                        <span class="text-15 fw-bold text-warning-600 d-flex"><i
                                                class="ph-fill ph-star"></i></span>
                                        <span class="text-xs fw-bold text-gray-600">(17k)</span>
                                    </div>
                                    <a href="#"
                                        class="product-card__cart btn bg-main-50 text-main-600 hover-bg-main-600 hover-text-white py-11 px-24 rounded-pill flex-align gap-8 mt-24 w-100 justify-content-center">
                                        Add To Cart <i class="ph ph-shopping-cart"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                 
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ========================= hot-deals End ================================ -->




@endsection



@section('script')
@endsection