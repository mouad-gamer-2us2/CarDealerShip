<x-master1 title="M's car GO " >

    <!-- CAROUSEL -->
    <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          @for($i = 1; $i <= 6; $i++)
            <div
              class="carousel-item @if($i === 1) active @endif"
              style="background: url('{{ asset("images/hero{$i}.png") }}') no-repeat center/cover; height: 90vh;"
            >
              <div class="carousel-caption d-none d-md-block text-start">
                <h1 class="display-4 text-info">M's car GO</h1>
                <p>With us, make your dream come true</p>
              </div>
            </div>
          @endfor
        </div>
      
        <button
          class="carousel-control-prev"
          type="button"
          data-bs-target="#heroCarousel"
          data-bs-slide="prev"
          aria-label="Previous"
        >
          <span class="carousel-control-prev-icon"></span>
          <span class="visually-hidden">Previous</span>
        </button>
      
        <button
          class="carousel-control-next"
          type="button"
          data-bs-target="#heroCarousel"
          data-bs-slide="next"
          aria-label="Next"
        >
          <span class="carousel-control-next-icon"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
      

  <div class="divider"></div>

  <!-- SHOWROOM -->
  <section id="showroom" class="container py-5">
    <div class="row align-items-center">
      <div class="col-lg-6 order-lg-2 mb-4 mb-lg-0">
        <img src="{{ asset('images/showroom.png') }}" class="img-fluid rounded" alt="Showroom">
      </div>
      <div class="col-lg-6 order-lg-1">
        <h2 class="text-info">Discover an incredible selection of exciting and exotic cars with us!</h2>
        <p>Welcome to our car showroom, where precision meets passion. We pride ourselves on showcasing a diverse range of vehicles, from sleek city cars to powerful luxury models. Each car in our collection is carefully selected to meet the highest standards of performance, safety, and design. Whether you’re looking for your first car, upgrading to something more sophisticated, or chasing your dream vehicle, our knowledgeable team is here to guide you every step of the way. At M’s Car GO, your satisfaction drives us forward.</p>
      </div>
    </div>
  </section>

  <div class="divider"></div>

  <!-- WHY CHOOSE US -->
  <section id="why" class="container py-5">
    <div class="row align-items-center">
      <div class="col-md-6 mb-4 mb-md-0">
        <img src="{{ asset('images/interior.png') }}" class="img-fluid rounded" alt="Interior">
      </div>
      <div class="col-md-6">
        <h3>Why Choose Us</h3>
        <h2 class="text-info">We go beyond just selling cars, we deliver a seamless and exceptional experience tailored to your needs.</h2>
        <ul>
          <li>Wide Selection: From budget-friendly compacts to high-performance exotics, our showroom features an extensive range of vehicles to suit every taste and lifestyle.</li>
          <li>Customer-Centric Approach: We listen to your needs and tailor our services to ensure a seamless and enjoyable buying experience, every time.</li>
          <li>Quality Assurance: Every vehicle is thoroughly inspected and certified to guarantee top-tier performance, reliability, and safety.</li>
          <li>Competitive Pricing: We offer transparent, market-aligned pricing with flexible financing options to help you make the best choice without compromise.</li>
          <li>After-Sales Excellence: Our support doesn’t end at the sale—enjoy peace of mind with dedicated after-sales service, maintenance support, and warranty follow-ups.</li>
        </ul>
      </div>
    </div>
    <div class="row text-center stats mt-4">
      <div class="col-6 col-md-3">
        <h2>1.</h2><p>Great value, high quality.</p>
      </div>
      <div class="col-6 col-md-3">
        <h2>2.</h2><p>Free delivery.</p>
      </div>
      <div class="col-6 col-md-3">
        <h2>3.</h2><p>Test your dream car at one of our branches.</p>
      </div>
      <div class="col-6 col-md-3">
        <h2>4.</h2><p>Over 10 000 happy customers.</p>
      </div>
    </div>
  </section>

  <div class="divider"></div>

  <!-- TEST DRIVE CTA -->
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