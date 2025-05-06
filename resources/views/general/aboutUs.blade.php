<x-master1 title="About Us">

    {{-- HERO BANNER --}}
    <section class="about-hero d-flex align-items-center justify-content-center text-center text-light">
      <div class="banner-text">
        <h1 class="display-2 text-info">About Us</h1>
        <p class="h5">The best rated CarDealer in California</p>
      </div>
    </section>
  
    {{-- ABOUT CONTENT --}}
    <section class="about-section py-5">
      <div class="container">
        <div class="row align-items-center">
          {{-- Left text --}}
          <div class="col-lg-6 mb-4 mb-lg-0">
            <h5 class="text-white-50">About us</h5>
            <h2 class="text-info">A premium experience every time.</h2>
            <p>
              Welcome to our website, where we deliver a premium car-buying experience like no other. 
              From a curated selection of luxury and high-performance vehicles to personalized customer 
              service, every detail is designed to exceed your expectations. Explore our offerings and 
              discover a world of elegance, power, and exclusivity tailored just for you.
            </p>
          </div>
          {{-- Right image --}}
          <div class="col-lg-6 text-center">
            <img 
              src="{{ asset('images/aboutCar.jpg') }}" 
              alt="Premium experience" 
              class="img-fluid rounded shadow-lg about-img"
            >
          </div>
        </div>
      </div>
    </section>
  
    {{-- WHY CHOOSE US --}}
    <section class="why-section py-5">
      <div class="container">
        <h3 class="mb-1">Why Choose Us</h3>
        <h2 class="text-info mb-4">
          We go beyond just selling cars, we deliver a seamless and exceptional experience tailored to your needs.
        </h2>
  
        <div class="row">
          <div class="col-md-6">
            <ul class="list-unstyled mb-0">
              <li><strong>Wide Selection:</strong> From reliable everyday vehicles to luxurious and exotic models, we offer a diverse inventory to match your style and budget.</li>
              <li><strong>Customer-Centric Approach:</strong> Your satisfaction is our priority. Our friendly, knowledgeable team guides you every step of the way.</li>
              <li><strong>Quality Assurance:</strong> Every vehicle in our showroom undergoes rigorous inspection to ensure top-notch quality, reliability, and performance.</li>
            </ul>
          </div>
          <div class="col-md-6">
            <ul class="list-unstyled mb-0">
              <li><strong>Competitive Pricing:</strong> We provide transparent and fair pricing, along with flexible financing options to suit your goals.</li>
              <li><strong>After-Sales Excellence:</strong> Our commitment doesn’t end with the sale. We offer exceptional after-sales services, including maintenance and customization.</li>
            </ul>
          </div>
        </div>
  
        <div class="row text-center stat-grid mt-5">
          <div class="col-6 col-md-3 mb-4">
            <h2>1.</h2><p>Great value, high quality.</p>
          </div>
          <div class="col-6 col-md-3 mb-4">
            <h2>2.</h2><p>Free delivery.</p>
          </div>
          <div class="col-6 col-md-3 mb-4">
            <h2>3.</h2><p>Test your dream car at one of our branches.</p>
          </div>
          <div class="col-6 col-md-3 mb-4">
            <h2>4.</h2><p>Over 10 000 happy customers.</p>
          </div>
        </div>
      </div>
    </section>
  
    {{-- TEST-DRIVE CTA --}}
   
  <section
  id="testdrive"
  class="overlay d-flex flex-column justify-content-center align-items-center text-center min-vh-100"
  style="
    background-image: url('{{ asset('images/testdrive.jpg') }}');
    background-size: cover;
    background-position: center;
  "
>
  <h2 class="display-5">See a car you love? Or want to book a test drive?</h2>
  <p>We are available between 9 am to 4 pm, Monday to Friday</p>
  <a href="mailto:hman3787@gmail.com" class="btn btn-outline-info mb-2">Email Us</a>
  <p class="h4 text-info">+212 6 28 43 06 57</p>
</section>

  
  </x-master1>
  