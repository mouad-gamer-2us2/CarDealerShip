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

        <!-- Simulator -->
        <li class="nav-item">
          <a class="nav-link" href="{{ route('payment.simulator') }}">
            <i class="bi bi-calculator-fill me-1"></i> Simulator
          </a>
        </li>

        <!-- Profile Dropdown -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown">
            <i class="bi bi-person-circle me-1"></i> Account
          </a>
          <ul class="dropdown-menu dropdown-menu-end bg-dark border-0 shadow" aria-labelledby="userDropdown">
            <li>
              <a class="dropdown-item text-white" href="{{ route('profile.edit') }}">
                <i class="bi bi-person-gear me-2"></i>Update Your Info
              </a>
            </li>
            <li><hr class="dropdown-divider bg-light"></li>
            <li>
              <form action="{{ route('logout') }}" method="POST" class="d-inline">
                @csrf
                <button type="submit" class="dropdown-item text-white">
                  <i class="bi bi-box-arrow-right me-2"></i>Logout
                </button>
              </form>
            </li>
          </ul>
        </li>

      </ul>
    </div>
  </div>
</nav>
