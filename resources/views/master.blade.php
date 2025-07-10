<!DOCTYPE html>
<html lang="en">


<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Eduverse - Home</title>

  <!-- Bootstrap & Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
  <link href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('css/home.css')}}" rel="stylesheet" type="text/css">


</head>

<body class="@yield('body-class')">
  <!-- Bootstrap 5 CDN -->
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
              <a class="nav-link text-muted fw-bold me-2 " href="Home.html">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link fw-bold me-2" id="catag" aria-current="page"
                href="categories.html">Categories</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-muted fw-bold me-2" href="feed.html">My Books</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-muted fw-bold me-2" href="reviews.html">Reviews</a>
            </li>
          </ul>
          <div class="d-flex align-items-center">
            <div class="input-group me-3" id="input-feild">
              <span class="input-group-text bg-white border-0"><i class="fas fa-search"></i></span>
              <input class="form-control border-0 me-0" type="search" placeholder="Search" aria-label="Search">
            </div>

            @auth
            <span class="btn px-4 mx-4 pt-2 fw-bold text-white" style="border:none;">{{ Auth::user()->name }}</span>

            <form action="{{ route('logout.confirm') }}" method="GET">
              @csrf
              <button type="submit" class="btn btn-primary fw-bold bg-light text-danger">Logout</button>
            </form>
            @else
            <a class="btn bg-light text-primary px-4 mx-4 pt-2" href="{{ route('login') }}">SignIn</a>
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
</body>

</html>