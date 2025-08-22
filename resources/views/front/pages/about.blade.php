@extends('front.app')

@section('style')
<style>
    .banner {
      background: url('{{url('public/asset/images/bg/bannernew.jpeg')}}') no-repeat center center;
      background-size: cover;
      color: white;
      padding: 100px 0;
      text-align: center;
    }
    .banner h1 {
      font-size: 3rem;
      font-weight: 700;
    }
    .mission-icon {
      font-size: 2.5rem;
      color: #dc3545;
    }
    .about-img {
      max-width: 100%;
      border-radius: 15px;
      box-shadow: 0 5px 20px rgba(0, 0, 0, 0.15);
    }
  </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />

@endsection

@section('frontcontent')

<!-- Banner -->

  <section class="banner position-relative">
  <div class="banner-overlay position-absolute top-0 start-0 w-100 h-100" style="background: rgba(0, 0, 0, 0.6); z-index: 1;"></div>
  <div class="container position-relative text-white" style="z-index: 2;">
    <h1 class="text-white">About Us</h1>
</div>
</section>

  <!-- About Section -->
  <section class="py-5 bg-light">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-6 mb-4 mb-md-0">
            <figure>
          <img src="{{url('public/asset/images/bg/nickyp.webp')}}" alt="About Image" class="about-img" />
          <figcaption class="mt-3">
           <small> Nicholas Pooran, a Trinidadian batsman representing the “West Indies and a proud NG brand ambassador, seen wearing our helmet."</small>
          </figcaption>
          </figure>
        
        </div>
        <div class="col-md-6">
          <h2 class="fw-bold">Who We Are</h2>
          <p class="mt-3">
           Next Generation (NG) is a forward-thinking sports company founded in 2023, dedicated to providing safe, certified, and high-performance gear for athletes. With an initial focus on cricket helmets, NG is pushing the boundaries of innovation in sports equipment by integrating advanced analytics and immersive technology to revolutionize the athlete experience.

At the helm of NG is Mr. Bhupinder Singh Gill, CEO and Managing Director, a former national-level athlete from Punjab, India. With his extensive background in sports, Mr. Gill brings valuable insight into the needs and performance requirements of athletes. Under his leadership, NG is focused on developing cutting-edge, regulation-compliant sports gear designed to support and elevate the next generation of athletes.

Our mission is to enhance athletic performance through gear that prioritizes comfort, innovation, and safety—both in training and competition. With a blend of creativity, expertise, and a customer-centric approach, NG is dedicated to exceeding expectations and making a meaningful impact in the world of sports.
            </p>
          <p>
            With a blend of creativity, experience, and customer-focus, we strive to exceed expectations and make a difference.
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- Mission Section -->
  <section class="py-5">
    <div class="container text-center">
      <h2 class="fw-bold mb-4">Our Mission And Vision</h2>
      <div class="row g-4">
        <div class="col-md-4">
          <div class="p-4 border rounded shadow-sm">
            <div class="mission-icon mb-3">
              🚀
            </div>
            <h5 class="fw-bold"> Driving Performance Through Innovation</h5>
            <p>Our mission is to empower athletes and sports organizations to reach peak performance and foster deeper fan engagement through cutting-edge technology and data-driven insights. By prioritizing innovation, we aim to transform the sports experience both on and off the field.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="p-4 border rounded shadow-sm">
            <div class="mission-icon mb-3">
              🤝
            </div>
            <h5 class="fw-bold">Commitment to Our Customers</h5>
            <p>We are committed to fostering long-term relationships with our customers by consistently delivering exceptional value, personalized support, and a trusted partnership that evolves with their needs.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="p-4 border rounded shadow-sm">
            <div class="mission-icon mb-3">
              🌍
            </div>
            <h5 class="fw-bold">Pioneering the Future of Athletics </h5>
            <p>Our vision is to become the global leader in sports innovation by setting new benchmarks for excellence in athletic performance and safety. Through cutting-edge advancements and a commitment to quality, we aim to make a lasting, positive impact on the world of sports</p>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection



@section('script')
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

@endsection