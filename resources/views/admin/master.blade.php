<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>EduVerse Admin Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

  <link href="{{ asset('css/adminpanel.css') }}" rel="stylesheet" type="text/css">
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-light mx-0 px-0">
      <div class="container">
        <a class="navbar-brand" href="{{ route('admin.dashboard') }}">
          <img src="../images/Logo.png" alt="Logo" style="max-height: 40px;">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto mb-lg-0 mt-1">
            @auth
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle fw-bold text-muted" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{ Auth::user()->name }}
              </a>

              <ul class="dropdown-menu dropdown-menu-end p-0 m-0" aria-labelledby="navbarDropdown">
                <li>
                  <a href="{{ route('logout.confirm') }}">
                    <button class="btn">
                      <i class="fas fa-sign-out-alt"></i>
                    </button>
                  </a>
                </li>
              </ul>
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

  <div class="container" style="height: 85vh;">
    <div class="row d-flex mt-4" style="min-height: 100vh;">
      <div class="sidebar">
        <div class="py-3 mb-4">
          <ul class="nav flex-column">
            <li class="nav-item sidemenu">
              <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') || 
                request()->routeIs('admin_dashboard') ? 'active' : '' }}">
                <i class="fa-solid fa-house"></i> Dashboard
              </a>
            </li>
            <li class="nav-item sidemenu">
              <a href="{{ route('admin.users') }}" class="nav-link {{ request()->routeIs('admin.users') ? 'active' : '' }}">
                <i class="fas fa-users"></i> Manage Users
              </a>
            </li>
            <li class="nav-item sidemenu">
              <a href="{{ route('admin_categories.index') }}" class="nav-link {{ request()->routeIs('admin_categories.index') ? 'active' : '' }}">
                <i class="fas fa-tags"></i> Manage Categories
              </a>
            </li>
            <li class="nav-item sidemenu"><a href="{{ route('manage_books.index') }}"
                class="nav-link {{ request()->routeIs('manage_books.index')|| 
                request()->routeIs('manage_books.create') || 
                request()->routeIs('manage_books.edit') ? 'active' : '' }} ">
                <i class="fas fa-book"></i> Manage Books</a></li>
            <li class="nav-item sidemenu">
              <a href="{{ route('admin.notifications.index') }}"
                class="nav-link {{ request()->routeIs('admin.notifications.index') ? 'active' : '' }}">
                <i class="fas fa-bell"></i> Notifications
                @if(isset($unreadCount) && $unreadCount > 0)
                <span class="badge bg-danger">{{ $unreadCount }}</span>
                @endif
              </a>
            </li>

            <li class="nav-item sidemenu">
              <a href="{{ route('admin.adminreviews') }}" class="nav-link  {{ request()->routeIs('admin.adminreviews') || request()->routeIs('admin.book_reviews') ? 'active' : '' }}">
                <i class="fas fa-comment-dots"></i> Reviews
              </a>
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