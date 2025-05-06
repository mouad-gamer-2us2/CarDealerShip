<x-master1 title="Contact">

    {{-- HERO SECTION --}}
    <section 
      class="contact-hero overlay d-flex align-items-center text-start text-light"
      style="background: url('{{ asset('images/contactHero.png') }}') no-repeat center/cover; height: 90vh;"
    >
      <div class="container">
        <h1 class="display-2 text-info">Contact</h1>
        <p class="h5">See something you like?<br>Give us a call.</p>
      </div>
    </section>
  
    {{-- MESSAGE & FORM --}}
    <section class="contact-section py-5">
      <div class="container position-relative">
        <small class="text-muted">Not sure if it is the right car?</small>
        <h2 class="text-info mb-4">
          Don't be shy, drop us a message and take it for a spin.
        </h2>
  
        <hr class="border-info mb-5">
  
        <div class="row gx-5">
          {{-- Get in Touch --}}
          <div class="col-md-4">
            <h5>Get in Touch</h5>
            <p><i class="bi bi-telephone-fill me-2"></i>+212 6 26 43 06 57</p>
            <p><i class="bi bi-envelope-fill me-2"></i>hman3787@gmail.com</p>
            <p><i class="bi bi-geo-alt-fill me-2"></i>
              3502 S Susan St, Santa Ana, CA 92704, United States
            </p>
          </div>
  
          {{-- Message Us form --}}
          <div class="col-md-8">
            <form>
              <div class="row mb-3">
                <div class="col">
                  <input type="text" class="form-control" placeholder="First Name">
                </div>
                <div class="col">
                  <input type="text" class="form-control" placeholder="Last Name">
                </div>
              </div>
  
              <div class="mb-3">
                <label class="form-label">Email *</label>
                <input type="email" class="form-control" placeholder="Email Address" required>
              </div>
  
              <div class="mb-3">
                <label class="form-label">Subject</label>
                <input type="text" class="form-control" placeholder="Subject">
              </div>
  
              <div class="mb-4">
                <label class="form-label">Your Message *</label>
                <textarea class="form-control" rows="4" placeholder="Your Message" required></textarea>
              </div>
  
              <button type="submit" class="btn btn-primary">SEND</button>
            </form>
          </div>
        </div>
      </div>
    </section>
  
  
  </x-master1>
  