@extends('front.app')

@section('style')
<style>

</style>
@endsection

@section('frontcontent')


<section class="site-banner jarallax min-height600 "
  style="background-color: #ecebeb; min-height:70px; ">
  <div class="container pt-5">
    <div class="d-flex justify-content-between align-items-end flex-wrap">
      <h4 class="mb-0">{{ $category->category_name }}</h4>

      <div class="breadcrumbs">
        <span class="item">
          <a href="{{ url('/') }}">Home /</a>
        </span>
        <span class="item">{{ $category->category_name }}</span>
      </div>
    </div>
  </div>
</section>

<div class="product mt-24">
  <div class="container container-lg">
    <div class="row gy-4 g-12">
      @foreach($products as $fet)

      <div class="col-xxl-2 col-lg-3 col-sm-4 col-6" data-aos="fade-up" data-aos-duration="200">
        <div
          class="product-card px-8 py-16 border border-gray-100 hover-border-main-600 rounded-16 position-relative transition-2">
          <a href="cart.html"
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
                ${{$fet->us_price_cut}}</span>
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
           
          </div>
        </div>
      </div>
      @endforeach

    </div>
  </div>
</div>

<hr>




@endsection



@section('script')
@endsection