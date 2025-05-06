<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="{{route('general.page')}}">
        <img src="{{ asset('images/carDealerLogo.png') }}"
           alt="M's car GO logo"
           class="me-2"
           style="height: 60px; width: auto;">
      <span>M's car GO</span>
      </a>
      <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navMenu">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div id="navMenu" class="collapse navbar-collapse">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link" href="{{route('general.page')}}">General</a></li>
          <li class="nav-item"><a class="nav-link" href="{{route('general.aboutUs')}}">about us</a></li>
          <li class="nav-item"><a class="nav-link" href="{{route('general.contactUs')}}">contact us</a></li>
          <li class="nav-item"><a class="nav-link" href="#contact">login </a></li>
          <li class="nav-item"><a class="nav-link" href="#contact">register </a></li>
        </ul>
      </div>
    </div>
  </nav>