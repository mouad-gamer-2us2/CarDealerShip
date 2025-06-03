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

        <!-- Dashboard -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="dashboardDropdown" role="button" data-bs-toggle="dropdown">
            <i class="bi bi-speedometer2 me-1"></i>Dashboard
          </a>
          <ul class="dropdown-menu dropdown-menu-end bg-dark border-0 shadow" aria-labelledby="dashboardDropdown">
            <li>
              <a class="dropdown-item text-white" href="{{ route('admin.dashboard') }}">
                <i class="bi bi-speedometer2 me-2"></i>Admin Dashboard
              </a>
            </li>
          </ul>
        </li>

        <!-- Listings -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="listingsDropdown" role="button" data-bs-toggle="dropdown">
            <i class="bi bi-card-list me-1"></i>Listings
          </a>
          <ul class="dropdown-menu dropdown-menu-end bg-dark border-0 shadow">
            <li>
              <a class="dropdown-item text-white" href="{{ route('cars.create') }}">
                <i class="bi bi-plus-circle me-2"></i>List a Car
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

        <!-- Car Brands and Users -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="brandsUsersDropdown" role="button" data-bs-toggle="dropdown">
            <i class="bi bi-diagram-3-fill me-1"></i>Car Brands & Users
          </a>
          <ul class="dropdown-menu dropdown-menu-end bg-dark border-0 shadow">
            <li>
              <a class="dropdown-item text-white" href="{{ route('admin.showAdminBrands') }}">
                <i class="bi bi-tags-fill me-2"></i>Car Brands
              </a>
            </li>
            <li>
              <a class="dropdown-item text-white" href="{{ route('admin.showBodyStyles') }}">
                <i class="bi bi-ui-checks-grid me-2"></i>Car Body Styles
              </a>
            </li>
            <li>
              <a class="dropdown-item text-white" href="{{ route('admin.showBuyers') }}">
                <i class="bi bi-people-fill me-2"></i>Users
              </a>
            </li>
          </ul>
        </li>

        <!-- Settings -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="settingsDropdown" role="button" data-bs-toggle="dropdown">
            <i class="bi bi-gear-fill me-1"></i>Settings
          </a>
          <ul class="dropdown-menu dropdown-menu-end bg-dark border-0 shadow">
            <li>
              <a class="dropdown-item text-white" href="{{ route('admin.welcomeAdmin') }}">
                <i class="bi bi-sliders me-2"></i>Car Settings
              </a>
            </li>
            <li>
              <a class="dropdown-item text-white" href="{{ route('profile.edit') }}">
                <i class="bi bi-person-gear me-2"></i>Update Your Info
              </a>
            </li>
          </ul>
        </li>

        <!-- Logout -->
        <li class="nav-item">
          <form action="{{ route('logout') }}" method="POST" class="d-inline">
            @csrf
            <button type="submit" class="btn btn-outline-light btn-sm">
              <i class="bi bi-box-arrow-right me-1"></i>Logout
            </button>
          </form>
        </li>

      </ul>
    </div>
  </div>
</nav>
