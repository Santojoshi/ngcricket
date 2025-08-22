@extends('front.app')

@section('style')

@endsection

@section('frontcontent')


<section class="product-details py-80">
    <div class="container container-lg">
        <div class="row gy-4">
            <div class="col-lg-12">
                <div class="row gy-4">
                    <div class="col-xl-6">
                        <div class="product-details__left">
                            
                            <div class="product-details__thumb-slider border border-gray-100 rounded-16">
                                <div class="">
                                    <div class="product-details__thumb flex-center h-100">
                                        <img src="{{url('public/upload/product/'.$product->img1)}}" alt="">
                                    </div>
                                </div>
                                @if(!empty($product->img2))
                                <div class="">
                                    <div class="product-details__thumb flex-center h-100">
                                        <img src="{{url('public/upload/product/'.$product->img2)}}" alt="">
                                    </div>
                                </div>
                                @endif
                                @if(!empty($product->img3))
                                <div class="">
                                    <div class="product-details__thumb flex-center h-100">
                                        <img src="{{url('public/upload/product/'.$product->img3)}}" alt="">
                                    </div>
                                </div>
                                @endif
                                @if(!empty($product->img4))
                                <div class="">
                                    <div class="product-details__thumb flex-center h-100">
                                        <img src="{{url('public/upload/product/'.$product->img4)}}" alt="">
                                    </div>
                                </div>
                                @endif
                                
                            </div>

                            <div class="mt-24">
                                <div class="product-details__images-slider">
                                    <div>
                                        <div class="max-w-120 max-h-120 h-100 flex-center border border-gray-100 rounded-16 p-8">
                                            <img src="{{url('public/upload/product/'.$product->img1)}}" alt="">
                                        </div>
                                    </div>
                                    @if(!empty($product->img2))
                                    <div>
                                        <div class="max-w-120 max-h-120 h-100 flex-center border border-gray-100 rounded-16 p-8">
                                            <img src="{{url('public/upload/product/'.$product->img2)}}" alt="">
                                        </div>
                                    </div>
                                    @endif
                                    @if(!empty($product->img3))
                                    <div>
                                        <div class="max-w-120 max-h-120 h-100 flex-center border border-gray-100 rounded-16 p-8">
                                            <img src="{{url('public/upload/product/'.$product->img3)}}" alt="">
                                        </div>
                                    </div>
                                    @endif
                                    @if(!empty($product->img4))
                                    <div>
                                        <div class="max-w-120 max-h-120 h-100 flex-center border border-gray-100 rounded-16 p-8">
                                            <img src="{{url('public/upload/product/'.$product->img4)}}" alt="">
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="product-details__content">
                            <h5 class="mb-12">{{$product->product_name}}</h5>
                            <div class="flex-align flex-wrap gap-12">
                                <div class="flex-align gap-12 flex-wrap">
                                    <div class="flex-align gap-8">
                                        <span class="text-15 fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                        <span class="text-15 fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                        <span class="text-15 fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                        <span class="text-15 fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                        <span class="text-15 fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                    </div>
                                    <span class="text-sm fw-medium text-neutral-600">4.7 Star Rating</span>
                                    <!-- <span class="text-sm fw-medium text-gray-500">(21,671)</span> -->
                                </div>
                                <span class="text-sm fw-medium text-gray-500">|</span>
                                <span class="text-gray-900"> <span class="text-gray-400">SKU:</span>{{$product->sku}}</span>
                            </div>
                            <span class="mt-32 pt-32 text-gray-700 border-top border-gray-100 d-block"></span>
                            <p class="text-gray-700">{{$product->description}} Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam perferendis architecto itaque possimus in aut soluta esse quos illo nihil? lorem30</p>
                            <div class="mt-32 flex-align flex-wrap gap-32">
                                <div class="flex-align gap-8">
                                    <h4 class="mb-0">$25.00</h4>
                                    <span class="text-md text-gray-500">$38.00</span>
                                </div>
                                <a href="#" class="btn btn-main rounded-pill">Order on What'sApp</a>
                            </div>
                            <span class="mt-32 pt-32 text-gray-700 border-top border-gray-100 d-block"></span>

                            <div class="flex-align flex-wrap gap-16 bg-color-one rounded-8 py-16 px-24">
                                <div class="flex-align gap-16">
                                    <span class="text-main-600 text-sm">Special Offer:</span>
                                </div>
                                <div class="countdown" id="countdown11">
                                    <ul class="countdown-list flex-align flex-wrap">
                                        <li class="countdown-list__item text-heading flex-align gap-4 text-xs fw-medium w-28 h-28 rounded-4 border border-main-600 p-0 flex-center"><span class="days"></span></li>
                                        <li class="countdown-list__item text-heading flex-align gap-4 text-xs fw-medium w-28 h-28 rounded-4 border border-main-600 p-0 flex-center"><span class="hours"></span></li>
                                        <li class="countdown-list__item text-heading flex-align gap-4 text-xs fw-medium w-28 h-28 rounded-4 border border-main-600 p-0 flex-center"><span class="minutes"></span></li>
                                        <li class="countdown-list__item text-heading flex-align gap-4 text-xs fw-medium w-28 h-28 rounded-4 border border-main-600 p-0 flex-center"><span class="seconds"></span></li>
                                    </ul>
                                </div>
                                <span class="text-gray-900 text-xs">Remains untill the end of the offer</span>
                            </div>

                            <div class="mb-24">
                                <div class="mt-32 flex-align gap-12 mb-16">
                                    <span class="w-32 h-32 bg-white flex-center rounded-circle text-main-600 box-shadow-xl"><i class="ph-fill ph-lightning"></i></span>
                                    <h6 class="text-md mb-0 fw-bold text-gray-900">Products are almost sold out</h6>
                                </div>
                                <div class="progress w-100 bg-gray-100 rounded-pill h-8" role="progressbar" aria-label="Basic example" aria-valuenow="32" aria-valuemin="0" aria-valuemax="100">
                                    <div class="progress-bar bg-main-two-600 rounded-pill" style="width: 32%"></div>
                                </div>
                                <span class="text-sm text-gray-700 mt-8">Available only:45</span>
                            </div>

                            <span class="text-gray-900 d-block mb-8">Quantity:</span>
                            <div class="flex-between gap-16 flex-wrap">
                                <div class="flex-align flex-wrap gap-16">
                                    <div class="border border-gray-100 rounded-pill py-9 px-16 flex-align">
                                        <button type="button" class="quantity__minus p-4 text-gray-700 hover-text-main-600 flex-center"><i class="ph ph-minus"></i></button>
                                        <input type="number" class="quantity__input border-0 text-center w-32" value="1">
                                        <button type="button" class="quantity__plus p-4 text-gray-700 hover-text-main-600 flex-center"><i class="ph ph-plus"></i></button>
                                    </div>
                                    <a href="#" class="btn btn-main rounded-pill flex-align d-inline-flex gap-8 px-48"> <i class="ph ph-shopping-cart"></i> Add To Cart</a>
                                </div>
                                
                                <div class="flex-align gap-12">
                                    <a href="#" class="w-52 h-52 bg-main-50 text-main-600 text-xl hover-bg-main-600 hover-text-white flex-center rounded-circle">
                                        <i class="ph ph-heart"></i>
                                    </a>
                                    <a href="#" class="w-52 h-52 bg-main-50 text-main-600 text-xl hover-bg-main-600 hover-text-white flex-center rounded-circle">
                                        <i class="ph ph-shuffle"></i>
                                    </a>
                                    <a href="#" class="w-52 h-52 bg-main-50 text-main-600 text-xl hover-bg-main-600 hover-text-white flex-center rounded-circle">
                                        <i class="ph ph-share-network"></i>
                                    </a>
                                </div>
                            </div>
                            
                            <span class="mt-32 pt-32 text-gray-700 border-top border-gray-100 d-block"></span>

                            <div class="flex-between gap-16 p-12 border border-main-two-600 border-dashed rounded-8 mb-16">
                                <div class="flex-align gap-12">
                                    <button type="button" class="w-18 h-18 flex-center border border-gray-900 text-xs rounded-circle hover-bg-gray-100">
                                        <i class="ph ph-plus"></i>
                                    </button>
                                    <span class="text-gray-900 fw-medium text-xs">Mfr. coupon. $3.00 off 5</span>
                                </div>
                                <a href="cart.html" class="text-xs fw-semibold text-main-two-600 text-decoration-underline hover-text-main-two-700">View Details</a>
                            </div>
                           
                            
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="col-lg-3">
                <div class="product-details__sidebar border border-gray-100 rounded-16 overflow-hidden">
                    <div class="p-24">
                        <div class="flex-between bg-main-600 rounded-pill p-8">
                            <div class="flex-align gap-8">
                                <span class="w-44 h-44 bg-white rounded-circle flex-center text-2xl"><i class="ph ph-storefront"></i></span>
                                <span class="text-white">by Marketpro</span>
                            </div>
                            <a href="shop.html" class="btn btn-white rounded-pill text-uppercase">View Store</a>
                        </div>
                    </div>
                    <div class="p-24 bg-color-one d-flex align-items-start gap-24 border-bottom border-gray-100">
                        <span class="w-44 h-44 bg-white text-main-600 rounded-circle flex-center text-2xl flex-shrink-0">
                            <i class="ph-fill ph-truck"></i>
                        </span>
                        <div class="">
                            <h6 class="text-sm mb-8">Fast Delivery</h6>
                            <p class="text-gray-700">Lightning-fast shipping, guaranteed.</p>
                        </div>
                    </div>
                    <div class="p-24 bg-color-one d-flex align-items-start gap-24 border-bottom border-gray-100">
                        <span class="w-44 h-44 bg-white text-main-600 rounded-circle flex-center text-2xl flex-shrink-0">
                            <i class="ph-fill ph-arrow-u-up-left"></i>
                        </span>
                        <div class="">
                            <h6 class="text-sm mb-8">Free 90-day returns</h6>
                            <p class="text-gray-700">Shop risk-free with easy returns.</p>
                        </div>
                    </div>
                    <div class="p-24 bg-color-one d-flex align-items-start gap-24 border-bottom border-gray-100">
                        <span class="w-44 h-44 bg-white text-main-600 rounded-circle flex-center text-2xl flex-shrink-0">
                            <i class="ph-fill ph-check-circle"></i>
                        </span>
                        <div class="">
                            <h6 class="text-sm mb-8">Pickup available at Shop location</h6>
                            <p class="text-gray-700">Usually ready in 24 hours</p>
                        </div>
                    </div>
                    <div class="p-24 bg-color-one d-flex align-items-start gap-24 border-bottom border-gray-100">
                        <span class="w-44 h-44 bg-white text-main-600 rounded-circle flex-center text-2xl flex-shrink-0">
                            <i class="ph-fill ph-credit-card"></i>
                        </span>
                        <div class="">
                            <h6 class="text-sm mb-8">Payment</h6>
                            <p class="text-gray-700">Payment upon receipt of goods, Payment by card in the department, Google Pay, Online card.</p>
                        </div>
                    </div>
                    <div class="p-24 bg-color-one d-flex align-items-start gap-24 border-bottom border-gray-100">
                        <span class="w-44 h-44 bg-white text-main-600 rounded-circle flex-center text-2xl flex-shrink-0">
                            <i class="ph-fill ph-check-circle"></i>
                        </span>
                        <div class="">
                            <h6 class="text-sm mb-8">Warranty</h6>
                            <p class="text-gray-700">The Consumer Protection Act does not provide for the return of this product of proper quality.</p>
                        </div>
                    </div>
                    <div class="p-24 bg-color-one d-flex align-items-start gap-24 border-bottom border-gray-100">
                        <span class="w-44 h-44 bg-white text-main-600 rounded-circle flex-center text-2xl flex-shrink-0">
                            <i class="ph-fill ph-package"></i>
                        </span>
                        <div class="">
                            <h6 class="text-sm mb-8">Packaging</h6>
                            <p class="text-gray-700">Research & development value proposition graphical user interface investor.</p>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>

        <div class="pt-80">
            <div class="product-dContent border rounded-24">
                <div class="product-dContent__header border-bottom border-gray-100 flex-between flex-wrap gap-16">
                    <ul class="nav common-tab nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                          <button class="nav-link active" id="pills-description-tab" data-bs-toggle="pill" data-bs-target="#pills-description" type="button" role="tab" aria-controls="pills-description" aria-selected="true">Description</button>
                        </li>
                        <li class="nav-item" role="presentation">
                          <button class="nav-link" id="pills-reviews-tab" data-bs-toggle="pill" data-bs-target="#pills-reviews" type="button" role="tab" aria-controls="pills-reviews" aria-selected="false">Reviews</button>
                        </li>
                    </ul>
                    <a href="#" class="btn bg-color-one rounded-16 flex-align gap-8 text-main-600 hover-bg-main-600 hover-text-white">
                        <img src="assets/images/icon/satisfaction-icon.png" alt="">
                        100% Satisfaction Guaranteed
                    </a>
                </div>
                <div class="product-dContent__box">
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-description" role="tabpanel" aria-labelledby="pills-description-tab" tabindex="0">
                            <div class="mb-40">
                                <h6 class="mb-24">Product Description</h6>
                                <p><span class="text-gray-900"> <span class="text-gray-400">SKU:</span>{{$product->sku}}</span>
                                 <br>
                                {{$product->description}}
                                <br>
                                 Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam iusto autem cum dolorem quam quia delectus et perspiciatis. Blanditiis fugit libero consectetur sapiente exercitationem asperiores quasi quo delectus quas quos.
                                </p>                                
                            </div>
                           

                        </div>
                        <div class="tab-pane fade" id="pills-reviews" role="tabpanel" aria-labelledby="pills-reviews-tab" tabindex="0">
                            <div class="row g-4">
                                <div class="col-lg-6">
                                    <h6 class="mb-24">Product Description</h6>
                                    <div class="d-flex align-items-start gap-24 pb-44 border-bottom border-gray-100 mb-44">
                                        <img src="assets/images/thumbs/comment-img1.png" alt="" class="w-52 h-52 object-fit-cover rounded-circle flex-shrink-0">
                                        <div class="flex-grow-1">
                                            <div class="flex-between align-items-start gap-8 ">
                                                <div class="">
                                                    <h6 class="mb-12 text-md">Nicolas cage</h6>
                                                    <div class="flex-align gap-8">
                                                        <span class="text-15 fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                                        <span class="text-15 fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                                        <span class="text-15 fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                                        <span class="text-15 fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                                        <span class="text-15 fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                                    </div>
                                                </div>
                                                <span class="text-gray-800 text-xs">3 Days ago</span>
                                            </div>
                                            <h6 class="mb-14 text-md mt-24">Greate Product</h6>
                                            <p class="text-gray-700">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour</p>

                                            <div class="flex-align gap-20 mt-44">
                                                <button class="flex-align gap-12 text-gray-700 hover-text-main-600">
                                                    <i class="ph-bold ph-thumbs-up"></i>
                                                    Like
                                                </button>
                                                <a href="#comment-form" class="flex-align gap-12 text-gray-700 hover-text-main-600">
                                                    <i class="ph-bold ph-arrow-bend-up-left"></i>
                                                    Replay
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-start gap-24">
                                        <img src="assets/images/thumbs/comment-img1.png" alt="" class="w-52 h-52 object-fit-cover rounded-circle flex-shrink-0">
                                        <div class="flex-grow-1">
                                            <div class="flex-between align-items-start gap-8 ">
                                                <div class="">
                                                    <h6 class="mb-12 text-md">Nicolas cage</h6>
                                                    <div class="flex-align gap-8">
                                                        <span class="text-15 fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                                        <span class="text-15 fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                                        <span class="text-15 fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                                        <span class="text-15 fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                                        <span class="text-15 fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                                    </div>
                                                </div>
                                                <span class="text-gray-800 text-xs">3 Days ago</span>
                                            </div>
                                            <h6 class="mb-14 text-md mt-24">Greate Product</h6>
                                            <p class="text-gray-700">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour</p>

                                            <div class="flex-align gap-20 mt-44">
                                                <button class="flex-align gap-12 text-gray-700 hover-text-main-600">
                                                    <i class="ph-bold ph-thumbs-up"></i>
                                                    Like
                                                </button>
                                                <a href="#comment-form" class="flex-align gap-12 text-gray-700 hover-text-main-600">
                                                    <i class="ph-bold ph-arrow-bend-up-left"></i>
                                                    Replay
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mt-56">
                                        <div class="">
                                            <h6 class="mb-24">Write a Review</h6>
                                            <span class="text-heading mb-8">What is it like to Product?</span>
                                            <div class="flex-align gap-8">
                                                <span class="text-15 fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                                <span class="text-15 fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                                <span class="text-15 fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                                <span class="text-15 fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                                <span class="text-15 fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                            </div>
                                        </div>
                                        <div class="mt-32">
                                            <form action="#">   
                                                <div class="mb-32">
                                                    <label for="title" class="text-neutral-600 mb-8">Review Title</label>
                                                    <input type="text" class="common-input rounded-8" id="title" placeholder="Great Products">
                                                </div>
                                                <div class="mb-32">
                                                    <label for="desc" class="text-neutral-600 mb-8">Review Content</label>
                                                    <textarea class="common-input rounded-8" id="desc">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</textarea>
                                                </div>
                                                <button type="submit" class="btn btn-main rounded-pill mt-48">Submit Review</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="ms-xxl-5">
                                        <h6 class="mb-24">Customers Feedback</h6>
                                        <div class="d-flex flex-wrap gap-44">
                                            <div class="border border-gray-100 rounded-8 px-40 py-52 flex-center flex-column flex-shrink-0 text-center">
                                                <h2 class="mb-6 text-main-600">4.8</h2>
                                                <div class="flex-center gap-8">
                                                    <span class="text-15 fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                                    <span class="text-15 fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                                    <span class="text-15 fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                                    <span class="text-15 fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                                    <span class="text-15 fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                                </div>
                                                <span class="mt-16 text-gray-500">Average Product Rating</span>
                                            </div>
                                            <div class="border border-gray-100 rounded-8 px-24 py-40 flex-grow-1">
                                                <div class="flex-align gap-8 mb-20">
                                                    <span class="text-gray-900 flex-shrink-0">5</span>
                                                    <div class="progress w-100 bg-gray-100 rounded-pill h-8" role="progressbar" aria-label="Basic example" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100">
                                                        <div class="progress-bar bg-main-600 rounded-pill" style="width: 70%"></div>
                                                    </div>
                                                    <div class="flex-align gap-4">
                                                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                                    </div>
                                                    <span class="text-gray-900 flex-shrink-0">124</span>
                                                </div>
                                                <div class="flex-align gap-8 mb-20">
                                                    <span class="text-gray-900 flex-shrink-0">4</span>
                                                    <div class="progress w-100 bg-gray-100 rounded-pill h-8" role="progressbar" aria-label="Basic example" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                                                        <div class="progress-bar bg-main-600 rounded-pill" style="width: 50%"></div>
                                                    </div>
                                                    <div class="flex-align gap-4">
                                                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                                    </div>
                                                    <span class="text-gray-900 flex-shrink-0">52</span>
                                                </div>
                                                <div class="flex-align gap-8 mb-20">
                                                    <span class="text-gray-900 flex-shrink-0">3</span>
                                                    <div class="progress w-100 bg-gray-100 rounded-pill h-8" role="progressbar" aria-label="Basic example" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100">
                                                        <div class="progress-bar bg-main-600 rounded-pill" style="width: 35%"></div>
                                                    </div>
                                                    <div class="flex-align gap-4">
                                                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                                    </div>
                                                    <span class="text-gray-900 flex-shrink-0">12</span>
                                                </div>
                                                <div class="flex-align gap-8 mb-20">
                                                    <span class="text-gray-900 flex-shrink-0">2</span>
                                                    <div class="progress w-100 bg-gray-100 rounded-pill h-8" role="progressbar" aria-label="Basic example" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                        <div class="progress-bar bg-main-600 rounded-pill" style="width: 20%"></div>
                                                    </div>
                                                    <div class="flex-align gap-4">
                                                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                                    </div>
                                                    <span class="text-gray-900 flex-shrink-0">5</span>
                                                </div>
                                                <div class="flex-align gap-8 mb-0">
                                                    <span class="text-gray-900 flex-shrink-0">1</span>
                                                    <div class="progress w-100 bg-gray-100 rounded-pill h-8" role="progressbar" aria-label="Basic example" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100">
                                                        <div class="progress-bar bg-main-600 rounded-pill" style="width: 5%"></div>
                                                    </div>
                                                    <div class="flex-align gap-4">
                                                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                                    </div>
                                                    <span class="text-gray-900 flex-shrink-0">2</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>  
                            </div>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    <!-- ========================== Similar Product Start ============================= -->
<section class="new-arrival pb-80">
    <div class="container container-lg">
        <div class="section-heading">
            <div class="flex-between flex-wrap gap-8">
                <h5 class="mb-0">You Might Also Like</h5>
                <div class="flex-align gap-16">
                    <a href="shop.html" class="text-sm fw-medium text-gray-700 hover-text-main-600 hover-text-decoration-underline">All Products</a>
                    <div class="flex-align gap-8">
                        <button type="button" id="new-arrival-prev" class="slick-prev slick-arrow flex-center rounded-circle border border-gray-100 hover-border-main-600 text-xl hover-bg-main-600 hover-text-white transition-1" >
                            <i class="ph ph-caret-left"></i>
                        </button>
                        <button type="button" id="new-arrival-next" class="slick-next slick-arrow flex-center rounded-circle border border-gray-100 hover-border-main-600 text-xl hover-bg-main-600 hover-text-white transition-1" >
                            <i class="ph ph-caret-right"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="new-arrival__slider arrow-style-two">
            <div>
                <div class="product-card h-100 p-8 border border-gray-100 hover-border-main-600 rounded-16 position-relative transition-2">
                    <a href="product-details.html" class="product-card__thumb flex-center">
                        <img src="assets/images/thumbs/product-img7.png" alt="">
                    </a>
                    <div class="product-card__content p-sm-2 w-100">
                        <h6 class="title text-lg fw-semibold mt-12 mb-8">
                            <a href="product-details.html" class="link text-line-2">C-500 Antioxidant Protect Dietary Supplement</a>
                        </h6>   
                        <div class="flex-align gap-4">
                            <span class="text-main-600 text-md d-flex"><i class="ph-fill ph-storefront"></i></span>
                            <span class="text-gray-500 text-xs">By Lucky Supermarket</span>
                        </div>

                        <div class="product-card__content mt-12">
                            <div class="product-card__price mb-8">
                                <span class="text-heading text-md fw-semibold ">$14.99 <span class="text-gray-500 fw-normal">/Qty</span> </span>
                                <span class="text-gray-400 text-md fw-semibold text-decoration-line-through"> $28.99</span>
                            </div>
                            <div class="flex-align gap-6">
                                <span class="text-xs fw-bold text-gray-600">4.8</span>
                                <span class="text-15 fw-bold text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                <span class="text-xs fw-bold text-gray-600">(17k)</span>
                            </div>
                             <a href="cart.html" class="product-card__cart btn bg-main-50 text-main-600 hover-bg-main-600 hover-text-white py-11 px-24 rounded-pill flex-align gap-8 mt-24 w-100 justify-content-center">
                                Add To Cart <i class="ph ph-shopping-cart"></i> 
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="product-card h-100 p-8 border border-gray-100 hover-border-main-600 rounded-16 position-relative transition-2">
                    <span class="product-card__badge bg-danger-600 px-8 py-4 text-sm text-white">Sale 50% </span>
                    <a href="product-details.html" class="product-card__thumb flex-center">
                        <img src="assets/images/thumbs/product-img8.png" alt="">
                    </a>
                    <div class="product-card__content p-sm-2 w-100">
                        <h6 class="title text-lg fw-semibold mt-12 mb-8">
                            <a href="product-details.html" class="link text-line-2">Marcel's Modern Pantry Almond Unsweetened</a>
                        </h6>
                        <div class="flex-align gap-4">
                            <span class="text-main-600 text-md d-flex"><i class="ph-fill ph-storefront"></i></span>
                            <span class="text-gray-500 text-xs">By Lucky Supermarket</span>
                        </div>

                        <div class="product-card__content mt-12">
                            <div class="product-card__price mb-8">
                                <span class="text-heading text-md fw-semibold ">$14.99 <span class="text-gray-500 fw-normal">/Qty</span> </span>
                                <span class="text-gray-400 text-md fw-semibold text-decoration-line-through"> $28.99</span>
                            </div>
                            <div class="flex-align gap-6">
                                <span class="text-xs fw-bold text-gray-600">4.8</span>
                                <span class="text-15 fw-bold text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                <span class="text-xs fw-bold text-gray-600">(17k)</span>
                            </div>
                             <a href="cart.html" class="product-card__cart btn bg-main-50 text-main-600 hover-bg-main-600 hover-text-white py-11 px-24 rounded-pill flex-align gap-8 mt-24 w-100 justify-content-center">
                                Add To Cart <i class="ph ph-shopping-cart"></i> 
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="product-card h-100 p-8 border border-gray-100 hover-border-main-600 rounded-16 position-relative transition-2">
                    <span class="product-card__badge bg-danger-600 px-8 py-4 text-sm text-white">Sale 50% </span>
                    <a href="product-details.html" class="product-card__thumb flex-center">
                        <img src="assets/images/thumbs/product-img9.png" alt="">
                    </a>
                    <div class="product-card__content p-sm-2 w-100">
                        <h6 class="title text-lg fw-semibold mt-12 mb-8">
                            <a href="product-details.html" class="link text-line-2">O Organics Milk, Whole, Vitamin D</a>
                        </h6>
                        <div class="flex-align gap-4">
                            <span class="text-main-600 text-md d-flex"><i class="ph-fill ph-storefront"></i></span>
                            <span class="text-gray-500 text-xs">By Lucky Supermarket</span>
                        </div>

                        <div class="product-card__content mt-12">
                            <div class="product-card__price mb-8">
                                <span class="text-heading text-md fw-semibold ">$14.99 <span class="text-gray-500 fw-normal">/Qty</span> </span>
                                <span class="text-gray-400 text-md fw-semibold text-decoration-line-through"> $28.99</span>
                            </div>
                            <div class="flex-align gap-6">
                                <span class="text-xs fw-bold text-gray-600">4.8</span>
                                <span class="text-15 fw-bold text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                <span class="text-xs fw-bold text-gray-600">(17k)</span>
                            </div>
                             <a href="cart.html" class="product-card__cart btn bg-main-50 text-main-600 hover-bg-main-600 hover-text-white py-11 px-24 rounded-pill flex-align gap-8 mt-24 w-100 justify-content-center">
                                Add To Cart <i class="ph ph-shopping-cart"></i> 
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="product-card h-100 p-8 border border-gray-100 hover-border-main-600 rounded-16 position-relative transition-2">
                    <span class="product-card__badge bg-info-600 px-8 py-4 text-sm text-white">Best Sale </span>
                    <a href="product-details.html" class="product-card__thumb flex-center">
                        <img src="assets/images/thumbs/product-img10.png" alt="">
                    </a>
                    <div class="product-card__content p-sm-2 w-100">
                        <h6 class="title text-lg fw-semibold mt-12 mb-8">
                            <a href="product-details.html" class="link text-line-2">Whole Grains and Seeds Organic Bread</a>
                        </h6>
                        <div class="flex-align gap-4">
                            <span class="text-main-600 text-md d-flex"><i class="ph-fill ph-storefront"></i></span>
                            <span class="text-gray-500 text-xs">By Lucky Supermarket</span>
                        </div>

                        <div class="product-card__content mt-12">
                            <div class="product-card__price mb-8">
                                <span class="text-heading text-md fw-semibold ">$14.99 <span class="text-gray-500 fw-normal">/Qty</span> </span>
                                <span class="text-gray-400 text-md fw-semibold text-decoration-line-through"> $28.99</span>
                            </div>
                            <div class="flex-align gap-6">
                                <span class="text-xs fw-bold text-gray-600">4.8</span>
                                <span class="text-15 fw-bold text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                <span class="text-xs fw-bold text-gray-600">(17k)</span>
                            </div>
                             <a href="cart.html" class="product-card__cart btn bg-main-50 text-main-600 hover-bg-main-600 hover-text-white py-11 px-24 rounded-pill flex-align gap-8 mt-24 w-100 justify-content-center">
                                Add To Cart <i class="ph ph-shopping-cart"></i> 
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="product-card h-100 p-8 border border-gray-100 hover-border-main-600 rounded-16 position-relative transition-2">
                    <a href="product-details.html" class="product-card__thumb flex-center">
                        <img src="assets/images/thumbs/product-img11.png" alt="">
                    </a>
                    <div class="product-card__content p-sm-2 w-100">
                        <h6 class="title text-lg fw-semibold mt-12 mb-8">
                            <a href="product-details.html" class="link text-line-2">Lucerne Yogurt, Lowfat, Strawberry</a>
                        </h6>
                        <div class="flex-align gap-4">
                            <span class="text-main-600 text-md d-flex"><i class="ph-fill ph-storefront"></i></span>
                            <span class="text-gray-500 text-xs">By Lucky Supermarket</span>
                        </div>

                        <div class="product-card__content mt-12">
                            <div class="product-card__price mb-8">
                                <span class="text-heading text-md fw-semibold ">$14.99 <span class="text-gray-500 fw-normal">/Qty</span> </span>
                                <span class="text-gray-400 text-md fw-semibold text-decoration-line-through"> $28.99</span>
                            </div>
                            <div class="flex-align gap-6">
                                <span class="text-xs fw-bold text-gray-600">4.8</span>
                                <span class="text-15 fw-bold text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                <span class="text-xs fw-bold text-gray-600">(17k)</span>
                            </div>
                             <a href="cart.html" class="product-card__cart btn bg-main-50 text-main-600 hover-bg-main-600 hover-text-white py-11 px-24 rounded-pill flex-align gap-8 mt-24 w-100 justify-content-center">
                                Add To Cart <i class="ph ph-shopping-cart"></i> 
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="product-card h-100 p-8 border border-gray-100 hover-border-main-600 rounded-16 position-relative transition-2">
                    <span class="product-card__badge bg-danger-600 px-8 py-4 text-sm text-white">Sale 50% </span>
                    <a href="product-details.html" class="product-card__thumb flex-center">
                        <img src="assets/images/thumbs/product-img12.png" alt="">
                    </a>
                    <div class="product-card__content p-sm-2 w-100">
                        <h6 class="title text-lg fw-semibold mt-12 mb-8">
                            <a href="product-details.html" class="link text-line-2">Nature Valley Whole Grain Oats and Honey Protein</a>
                        </h6>
                        <div class="flex-align gap-4">
                            <span class="text-main-600 text-md d-flex"><i class="ph-fill ph-storefront"></i></span>
                            <span class="text-gray-500 text-xs">By Lucky Supermarket</span>
                        </div>

                        <div class="product-card__content mt-12">
                            <div class="product-card__price mb-8">
                                <span class="text-heading text-md fw-semibold ">$14.99 <span class="text-gray-500 fw-normal">/Qty</span> </span>
                                <span class="text-gray-400 text-md fw-semibold text-decoration-line-through"> $28.99</span>
                            </div>
                            <div class="flex-align gap-6">
                                <span class="text-xs fw-bold text-gray-600">4.8</span>
                                <span class="text-15 fw-bold text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                <span class="text-xs fw-bold text-gray-600">(17k)</span>
                            </div>
                             <a href="cart.html" class="product-card__cart btn bg-main-50 text-main-600 hover-bg-main-600 hover-text-white py-11 px-24 rounded-pill flex-align gap-8 mt-24 w-100 justify-content-center">
                                Add To Cart <i class="ph ph-shopping-cart"></i> 
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="product-card h-100 p-8 border border-gray-100 hover-border-main-600 rounded-16 position-relative transition-2">
                    <span class="product-card__badge bg-info-600 px-8 py-4 text-sm text-white">Best Sale </span>
                    <a href="product-details.html" class="product-card__thumb flex-center">
                        <img src="assets/images/thumbs/product-img10.png" alt="">
                    </a>
                    <div class="product-card__content p-sm-2 w-100">
                        <h6 class="title text-lg fw-semibold mt-12 mb-8">
                            <a href="product-details.html" class="link text-line-2">Whole Grains and Seeds Organic Bread</a>
                        </h6>
                        <div class="flex-align gap-4">
                            <span class="text-main-600 text-md d-flex"><i class="ph-fill ph-storefront"></i></span>
                            <span class="text-gray-500 text-xs">By Lucky Supermarket</span>
                        </div>

                        <div class="product-card__content mt-12">
                            <div class="product-card__price mb-8">
                                <span class="text-heading text-md fw-semibold ">$14.99 <span class="text-gray-500 fw-normal">/Qty</span> </span>
                                <span class="text-gray-400 text-md fw-semibold text-decoration-line-through"> $28.99</span>
                            </div>
                            <div class="flex-align gap-6">
                                <span class="text-xs fw-bold text-gray-600">4.8</span>
                                <span class="text-15 fw-bold text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                <span class="text-xs fw-bold text-gray-600">(17k)</span>
                            </div>
                             <a href="cart.html" class="product-card__cart btn bg-main-50 text-main-600 hover-bg-main-600 hover-text-white py-11 px-24 rounded-pill flex-align gap-8 mt-24 w-100 justify-content-center">
                                Add To Cart <i class="ph ph-shopping-cart"></i> 
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 </section>
<!-- ========================== Similar Product End ============================= -->
    
    <!-- ========================== Shipping Section Start ============================ -->
 <section class="shipping mb-24" id="shipping">
    <div class="container container-lg">
        <div class="row gy-4">
            <div class="col-xxl-3 col-sm-6" data-aos="zoom-in" data-aos-duration="400">
                <div class="shipping-item flex-align gap-16 rounded-16 bg-main-50 hover-bg-main-100 transition-2">
                    <span class="w-56 h-56 flex-center rounded-circle bg-main-600 text-white text-32 flex-shrink-0"><i class="ph-fill ph-car-profile"></i></span>
                    <div class="">
                        <h6 class="mb-0">Free Shipping</h6>
                        <span class="text-sm text-heading">Free shipping all over the US</span>
                    </div>
                </div>
            </div>
            <div class="col-xxl-3 col-sm-6" data-aos="zoom-in" data-aos-duration="600">
                <div class="shipping-item flex-align gap-16 rounded-16 bg-main-50 hover-bg-main-100 transition-2">
                    <span class="w-56 h-56 flex-center rounded-circle bg-main-600 text-white text-32 flex-shrink-0"><i class="ph-fill ph-hand-heart"></i></span>
                    <div class="">
                        <h6 class="mb-0"> 100% Satisfaction</h6>
                        <span class="text-sm text-heading">Free shipping all over the US</span>
                    </div>
                </div>
            </div>
            <div class="col-xxl-3 col-sm-6" data-aos="zoom-in" data-aos-duration="800">
                <div class="shipping-item flex-align gap-16 rounded-16 bg-main-50 hover-bg-main-100 transition-2">
                    <span class="w-56 h-56 flex-center rounded-circle bg-main-600 text-white text-32 flex-shrink-0"><i class="ph-fill ph-credit-card"></i></span>
                    <div class="">
                        <h6 class="mb-0"> Secure Payments</h6>
                        <span class="text-sm text-heading">Free shipping all over the US</span>
                    </div>
                </div>
            </div>
            <div class="col-xxl-3 col-sm-6" data-aos="zoom-in" data-aos-duration="1000">
                <div class="shipping-item flex-align gap-16 rounded-16 bg-main-50 hover-bg-main-100 transition-2">
                    <span class="w-56 h-56 flex-center rounded-circle bg-main-600 text-white text-32 flex-shrink-0"><i class="ph-fill ph-chats"></i></span>
                    <div class="">
                        <h6 class="mb-0"> 24/7 Support</h6>
                        <span class="text-sm text-heading">Free shipping all over the US</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
 </section>
<!-- ========================== Shipping Section End ============================ -->
@endsection



@section('script')

@endsection