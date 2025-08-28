<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Eduverse </title>

  <!-- Bootstrap & Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
  <link href="{{asset('bootstrap-5.0.2-dist/css/bootstrap.min.css')}}" rel="stylesheet">

  @yield('styles')

</head>

<body class="@yield('body-class')">

  <header>
    <nav class="navbar navbar-expand-lg navbar-light mx-0 px-0">
      <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
          <img src="{{ asset('images/Logo.png') }}" alt="Eduverse Logo">
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
               request()->routeIs('user_dashboard.activitystreak') ||
               request()->routeIs('user_dashboard.myreviews') ||
               request()->routeIs('books.search') ||
               request()->routeIs('book.show') ||
               request()->routeIs('book.read')
               ? 'active' : '' }}"
                href="{{ route('user_dashboard.myfeed') }}">
                My Book
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link fw-bold me-2 {{ request()->routeIs('reviews') ? 'active' : '' }}" href="{{ route('reviews') }}">Reviews</a>
            </li>
          </ul>

          <form action="{{ route('books.search') }}" method="GET" class="d-flex" role="search">
            <div class="input-group" id="input-feild">
              <span class="input-group-text bg-white border-0">
                <i class="fas fa-search"></i>
              </span>
              <input type="text" name="query" class="form-control border-0" placeholder="Search Book and Author" value="{{ old('query', request('query')) }}" required />
            </div>
            <button type="submit" class="d-none" aria-hidden="true"></button>
          </form>

          @auth
          @if(Auth::check() && Auth::user()->role === 'admin')
          <a href="{{ route('admin.dashboard') }}" class="btn px-4 mx-4 pt-2 fw-bold text-muted" style="border:none;">
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

  @if(request()->routeIs('home') || request()->routeIs('categories') || request()->routeIs('reviews'))

  <footer class="py-5 mt-5">
    <div class="container">
      <div class="row align-items-start">
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="d-flex align-items-center mb-3">
            <img src="/images/Logo (1).png" alt="Eduverse Logo" style="width: 40px; height: 40px;">
            <h5 class="ms-2 fw-bold fs-4 mb-0">Eduverse</h5>
          </div>
          <p class="text-muted fs-6 fw-normal mt-4 pt-1 small">
            We make onboarding new employees ridiculously easy. On day one, they're ready to go. And retaining them is
            easier.
          </p>
          <!-- <div class="d-flex gap-3">
            <p class="fs-6 fw-normal text-muted mt-1">Follow us on:</p>
            <a href="#" class="text-muted fs-5"><i class="bi bi-facebook"></i></a>
            <a href="#" class="text-muted fs-5"><i class="bi bi-instagram"></i></a>
            <a href="#" class="text-muted fs-5"><i class="bi bi-linkedin"></i></a>
            <a href="#" class="text-muted fs-5"><i class="bi bi-twitter"></i></a>
          </div> -->
        </div>

        <div class="col-lg-8 col-md-6">
          <div class="row">
            <div class="col-6 col-md-4 mb-3 d-flex justify-content-end">
              <ul class="list-unstyled small">
                <li><a href="{{ route('home') }}" class="text-decoration-none fs-6 fw-medium text-dark mb-2 d-block">Home</a></li>
                <li><a href="{{ route('home') }}#features" class="text-decoration-none fs-6 fw-medium text-dark mb-2 d-block">Features</a></li>
                <li><a href="{{ route('home') }}#services" class="text-decoration-none fs-6 fw-medium text-dark mb-2 d-block">Services</a></li>
              </ul>
            </div>
            <div class="col-6 col-md-4 mb-3 d-flex justify-content-end">
              <ul class="list-unstyled small ">
                <li><a href="{{ route('categories') }}" class="text-decoration-none fs-6 fw-medium mb-2 text-dark d-block">Categories</a></li>
                <li><a href="{{ route('user_dashboard.myfeed') }}" class="text-decoration-none fs-6 fw-medium mb-2 text-dark d-block">My Books</a></li>
              </ul>
            </div>
            <div class="col-6 col-md-4 mb-3 d-flex justify-content-end">
              <ul class="list-unstyled small ">
                <li><a href="{{ route('reviews') }}" class="text-decoration-none fs-6 fw-medium mb-2 text-dark d-block">Reviews</a></li>
                <li><a href="{{ route('user_dashboard.activitystreak') }}" class="text-decoration-none fs-6 fw-medium mb-2 text-dark d-block">Reading Streaks</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
  @endif

  @yield('scripts')

  @if(session('search_modal_message'))
  <div class="modal fade show" id="searchNotFoundModal" tabindex="-1" aria-labelledby="searchNotFoundLabel" aria-modal="true" role="dialog" style="display:block; background: rgba(0,0,0,0.5);">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content rounded-3 shadow">
        <div class="modal-header" style="color: #015F9E;">
          <h5 class="modal-title" id="searchNotFoundLabel"><i class="fas fa-search"></i> Search Result</h5>
          <a href="{{ url()->previous() }}" class="btn-close btn-close-black"></a>
        </div>
        <div class="modal-body text-center">
          <i class="bi bi-exclamation-triangle-fill fs-1 mb-3" style="color: #015F9E;"></i>
          <p class="fw-bold mb-0">
            {{ session('search_modal_message') }}
          </p>
        </div>

      </div>
    </div>
  </div>
  @endif

</body>

</html>