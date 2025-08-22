@extends('front.app')

@section('style')
<style>


body {
      background-color: #f8f9fa;
      font-family: 'Roboto', sans-serif;
      font-size: 14px;
    }

    .contact-container {
      margin-top: 60px;
      margin-bottom: 60px;
    }

    .card {
      border-radius: 15px;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
      padding: 30px; /* Extra padding */
    }

    h4 {
      color: #DAA520; /* Golden color */
      font-weight: bold;
    }

    .form-label {
      font-size: 13px;
    }

    .form-control {
      font-size: 13px;
      padding: 10px;
    }

    .btn {
      font-size: 14px;
      padding: 10px;
      margin-top: 20px;
    }

    .map-responsive {
      overflow: hidden;
      padding-bottom: 56.25%;
      position: relative;
      height: 0;
    }

    .map-responsive iframe {
      left: 0;
      top: 0;
      height: 100%;
      width: 100%;
      position: absolute;
      border: 0;
      border-radius: 10px;
    }

    ul li {
      font-size: 13px;
    }

</style>

@endsection

@section('frontcontent')


  <div class="container contact-container">
    <div class="row">
      <!-- Contact Form -->
      <div class="col-lg-6 mb-4">
        <div class="card bg-white">
          <h4 class="mb-5">Get in Touch</h4>
          <br>
          <form>
            <div class="mb-5">
              <label class="form-label">Full Name</label>
              <input type="text" class="form-control" placeholder="Your Name" required />
            </div>
            <div class="mb-5">
              <label class="form-label">Email Address</label>
              <input type="email" class="form-control" placeholder="your@example.com" required />
            </div>            
            <div class="mb-5">
              <label class="form-label">Subject</label>
              <input type="text" class="form-control" placeholder="Subject" />
            </div>
            <div class="mb-5">
              <label class="form-label">Message</label>
              <textarea class="form-control" rows="5" placeholder="Your message here..." required></textarea>
            </div>
            <button type="submit" class="btn btn-warning w-100 ">Send Message</button>
          </form>
        </div>
      </div>

      <!-- Contact Info and Map -->
      <div class="col-lg-6">
        <div class="card bg-white h-100">
          <h4 class="mb-4">Contact Information</h4>

          <br>
          <ul class="list-unstyled mb-5">
            <li class="mb-2"><strong>Address:</strong> 4381 Gateway Park BLVD, Suite 540 Sacramento, California 95834</li>
            <li class="mb-2"><strong>Email:</strong> info@ngsportsusa.com</li>
            <li class="mb-2"><strong>Phone:</strong> +1916-600-9978</li>
          </ul>
          <br>

          <div class="map-responsive my-5">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3115.9553680295426!2d-121.50589532506193!3d38.64990656127089!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x809ad6256662458d%3A0xd374f5c29c45624d!2s4381%20Gateway%20Park%20Blvd%2C%20Sacramento%2C%20CA%2095834%2C%20USA!5e0!3m2!1sen!2sin!4v1705891470079!5m2!1sen!2sin"></iframe>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection



@section('script')
@endsection