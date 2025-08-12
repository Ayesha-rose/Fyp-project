<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Eduverse </title>

  <!-- Bootstrap & Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
  <link href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  @yield('styles')

</head>

<body class="@yield('body-class')">

  <header>
    <nav class="navbar navbar-expand-lg navbar-light mx-0 px-0">
      <div class="container">
        <a class="navbar-brand" href="Home.html">
          <img src="images/Logo.png">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
          data-bs-target="#navbarTogglerDemo" aria-controls="navbarTogglerDemo" aria-expanded="false"
          aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0 mx-4 mt-1">
            <li class="nav-item">
              <a class="nav-link fw-bold me-2 {{ request()->routeIs('home')? 'active' : '' }}" href="{{ route('home') }}">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link fw-bold me-2 {{ request()->routeIs('categories') ? 'active' : '' }}" href="{{ route('categories') }}">Categories</a>
            </li>

            <li class="nav-item">
              <a class="nav-link fw-bold me-2 
            {{ request()->routeIs('user_dashboard.myfeed') || 
               request()->routeIs('user_dashboard.favorites') || 
               request()->routeIs('user_dashboard.currentlyread') || 
               request()->routeIs('user_dashboard.alreadyread') || 
               request()->routeIs('user_dashboard.mynotes') || 
               request()->routeIs('user_dashboard.mycalendar') || 
               request()->routeIs('user_dashboard.myreadingstat') ||
                request()->routeIs('user_dashboard.myreviews') 
               ? 'active' : '' }}"
                href="{{ route('user_dashboard.myfeed') }}">
                My Books
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link fw-bold me-2 {{ request()->routeIs('reviews') ? 'active' : '' }}" href="{{ route('reviews') }}">Reviews</a>
            </li>
            <!-- @auth
        @if(Auth::user()->role === 'admin')
            <li class="nav-item">
                <a class="nav-link fw-bold me-2 {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">Admin Dashboard</a>
            </li>
        @endif
    @endauth -->
          </ul>

          <div class="d-flex align-items-center">
            <div class="input-group me-3" id="input-feild">
              <span class="input-group-text bg-white border-0"><i class="fas fa-search"></i></span>
              <input class="form-control border-0 me-0" type="search" placeholder="Search" aria-label="Search">
            </div>

            @auth
            @if(Auth::user()->role === 'admin')
            <a href="{{ route('admin.dashboard') }}"class="btn px-4 mx-4 pt-2 fw-bold text-muted" style="border:none;">
              {{ Auth::user()->name }}
            </a>
            @else
            <span class="btn px-4 mx-4 pt-2 fw-bold text-muted" style="border:none;">{{ Auth::user()->name }}</span>
            @endif

            <form action="{{ route('logout.confirm') }}" method="GET">
              @csrf
              <button type="submit" class="btn btn-primary fw-bold bg-light text-danger" style="border: none;">Logout</button>
            </form>
            @else
            <a class="btn bg-light btn-outline-primary text-primary px-4 mx-4 pt-2" href="{{ route('login') }}">SignIn</a>
            <a class="btn btn-outline-light text-light px-4 pt-2" style="background-color: #36A5DC;" href="{{ url('signup') }}">SignUp</a>
            @endauth
          </div>
        </div>
      </div>
    </nav>
  </header>
  <div class="userpanel">
    @yield('userpanel')
  </div>
  @yield('scripts')

</body>

</html>