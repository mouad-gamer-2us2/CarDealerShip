<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="">
        <img src="{{ asset('images/carDealerLogo.png') }}"
           alt="M's car GO logo"
           class="me-2"
           style="height: 70px; width: auto;">
      <span>M's car GO</span>
      </a>
      <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navMenu">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div id="navMenu" class="collapse navbar-collapse">
        <ul class="navbar-nav ms-auto">
         
          <li class="nav-item">
            <form action="{{ route('logout') }}" method="POST" class="d-inline">
              @csrf
              <button type="submit" class="nav-link btn btn-link p-0 m-0 align-baseline" style="text-decoration: none;">Logout</button>
            </form>
          </li>
        </ul>
      </div>
    </div>
  </nav>