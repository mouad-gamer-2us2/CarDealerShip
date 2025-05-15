<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
      <img src="{{ asset('images/carDealerLogo.png') }}"
           alt="M's car GO logo"
           class="me-2"
           style="height: 60px; width: auto;">
      <span class="fw-bold">M's car GO</span>
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navMenu">
      <ul class="navbar-nav ms-auto align-items-center gap-2">

        <!-- Page Brands -->
        <li class="nav-item">
          <a class="nav-link" href="{{ route('Brand') }}">
            <i class="bi bi-tags-fill me-1"></i> Brands
          </a>
        </li>

        <!-- Page Cars -->
        <li class="nav-item">
          <a class="nav-link" href="{{ route('Car') }}">
            <i class="bi bi-car-front-fill me-1"></i> Cars
          </a>
        </li>

        <!-- Optional: Page d'accueil user -->
        <li class="nav-item">
          <a class="nav-link" href="{{ route('general.page') }}">
            <i class="bi bi-house-door-fill me-1"></i> Général
          </a>
        </li>

        <!-- Déconnexion -->
        <li class="nav-item">
          <form action="{{ route('logout') }}" method="POST" class="d-inline">
            @csrf
            <button type="submit" class="btn btn-outline-light btn-sm">
              <i class="bi bi-box-arrow-right me-1"></i> Logout
            </button>
          </form>
        </li>

      </ul>
    </div>
  </div>
</nav>
