<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand d-flex align-items-center" href="#">
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

        {{--listings stuff --}}
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="settingsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Listings
          </a>
          <ul class="dropdown-menu dropdown-menu-end bg-dark border-0 shadow" aria-labelledby="settingsDropdown">
              <li>
                <a class="dropdown-item text-white" href="{{ route('cars.create') }}">
                  <i class="bi bi-car-front-fill me-2"></i>List a Car
                </a>
              </li>
              <li>
                <a class="dropdown-item text-white" href="{{ route('admin.showCars') }}">
                  <i class="bi bi-list-columns me-2"></i>All Listings
                </a>
              </li>
              <li>
                <a class="dropdown-item text-white" href="{{ route('cars.sold') }}">
                  <i class="bi bi-currency-dollar me-2"></i>Sold Cars
                </a>
              </li>
            </ul>

        </li>

        {{--listings drop down --}}
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="settingsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Car brands and users 
          </a>
          <ul class="dropdown-menu dropdown-menu-end bg-dark border-0 shadow" aria-labelledby="settingsDropdown">
            <li>
              <a class="dropdown-item text-white" href="{{route('admin.showAdminBrands')}}">
                <i class="bi bi-car-front-fill me-2"></i>Car brands
              </a>
            </li>
            <li>
              <a class="dropdown-item text-white" href="{{route('admin.showBodyStyles')}}">
                <i class="bi bi-car-front-fill me-2"></i>Car body styles 
              </a>
            </li>
            <li>
              <a class="dropdown-item text-white" href="{{route('admin.showBuyers')}}">
                <i class="bi bi-person-badge-fill me-2"></i>Users 
              </a>
            </li>
          </ul>
        </li>
        <!-- Settings Dropdown -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="settingsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Settings
          </a>
          <ul class="dropdown-menu dropdown-menu-end bg-dark border-0 shadow" aria-labelledby="settingsDropdown">
            <li>
              <a class="dropdown-item text-white" href="{{route('admin.welcomeAdmin')}}">
                <i class="bi bi-car-front-fill me-2"></i>Car Settings
              </a>
            </li>
            <li>
              <a class="dropdown-item text-white" href="{{ route('profile.edit') }}">
                <i class="bi bi-person-gear me-2"></i>update your informations 
              </a>
            </li>
          </ul>
        </li>

        <!-- Logout Button -->
        <li class="nav-item">
          <form action="{{ route('logout') }}" method="POST" class="d-inline">
            @csrf
            <button type="submit" class="btn btn-outline-light btn-sm">
              Logout
            </button>
          </form>
        </li>

      </ul>
    </div>
  </div>
</nav>
