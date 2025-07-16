<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>EduVerse Admin Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
  <link href="{{ asset('css/adminpanel.css') }}" rel="stylesheet" type="text/css">
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-light mx-0 px-0">
      <div class="container">
        <a class="navbar-brand" href="#">
          <img src="images/Logo.png" alt="Logo" style="max-height: 40px;">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0 mt-1">
            @auth
              <li class="nav-item">
                <span class="btn px-4 mx-2 pt-2 fw-bold text-muted" style="border: none;">{{ Auth::user()->name }}</span>
              </li>
            @else
              <li class="nav-item">
                <a class="btn bg-light btn-outline-primary text-primary px-4 mx-2 pt-2" href="{{ route('login') }}">SignIn</a>
              </li>
              <li class="nav-item">
                <a class="btn btn-outline-light text-light px-4 pt-2" style="background-color: #36A5DC;" href="{{ url('signup') }}">SignUp</a>
              </li>
            @endauth
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <div class="container">
    <div class="row d-flex mt-4" style="min-height: 100vh;">
      <div class="sidebar">
        <div class="py-3 mb-4">
          <ul class="nav flex-column">
            <li class="nav-item sidemenu">
              <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="fa-solid fa-house"></i>Dashboard
              </a>
            </li>
            <li class="nav-item sidemenu">
              <a href="{{ route('admin_categories.index') }}" class="nav-link {{ request()->routeIs('admin_categories.index') ? 'active' : '' }}">
                <i class="fas fa-tags"></i> Manage Categories
              </a>
            </li>
            <li class="nav-item sidemenu"><a href="{{ route('manage_books.index') }}" class="nav-link {{ request()->routeIs('manage_books.index')|| request()->routeIs('manage_books.create') || request()->routeIs('manage_books.edit') ? 'active' : '' }} "><i class="fas fa-book"></i> Manage Books</a></li>
            <li class="nav-item sidemenu"><a href="#" class="nav-link"><i class="fas fa-calendar"></i> Calendar</a></li>
            <li class="nav-item sidemenu"><a href="#" class="nav-link"><i class="fas fa-bell"></i> Notifications</a></li>
            <li class="nav-item sidemenu"><a href="#" class="nav-link"><i class="fas fa-robot"></i> AI Chatbot</a></li>
            <li class="nav-item sidemenu"><a href="#" class="nav-link"><i class="fas fa-comment-dots"></i>Reviews</a></li>
            <li class="nav-item">
              <form action="{{ route('logout.confirm') }}" method="GET">
                @csrf
                <button type="submit" class="btn btn-primary fw-bold bg-light text-danger" style="border: none;">Logout</button>
              </form>
            </li>
          </ul>
        </div>
      </div>

      <div class="adminpanel">
        <div class="py-3 mb-4">
          @yield('adminpanel')
        </div>
      </div>
    </div>
  </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
