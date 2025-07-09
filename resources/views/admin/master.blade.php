<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>EduVerse Admin Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f8fafc;
    }

    .sidebar {
      height: 100vh;
      background-color: #1e293b;
      color: white;
      padding-top: 20px;
    }

    .sidebar .nav-link {
      color: white;
      padding: 12px 20px;
    }

    .sidebar .nav-link:hover,
    .sidebar .nav-link.active {
      background-color: #334155;
      border-radius: 8px;
    }

    .sidebar i {
      margin-right: 10px;
    }

    .topbar {
      display: flex;
      justify-content: space-between;
      padding: 20px;
    }

    .card {
      border: none;
      border-radius: 12px;
      background-color: #ffffff;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
    }

    .logout {
      color: #374151;
      font-weight: 500;
      cursor: pointer;
    }

    .logout:hover {
      text-decoration: underline;
    }

    .card-icon {
      font-size: 28px;
      color: #3b82f6;
      margin-bottom: 10px;
    }
  </style>
</head>

<body>
  <div class="container-fluid">
    <div class="row">
      <!-- Sidebar -->
      <div class="col-md-2 sidebar">
        <h4 class="text-white text-center mb-4">EduVerse</h4>
        <nav class="nav flex-column">
          <a href="{{ route('admin.dashboard') }}" class="nav-link"><i class="fas fa-chart-bar"></i> Dashboard</a>
         <a href="{{ route('admin_categories.index') }}" class="nav-link"><i class="fas fa-tags"></i> Manage Catego</a>
          <a href="#" class="nav-link"><i class="fas fa-book"></i> Manage Books</a>
          <a href="#" class="nav-link"><i class="fas fa-chart-line"></i> Reading Stats</a>
          <a href="#" class="nav-link"><i class="fas fa-calendar"></i> Calendar</a>
          <a href="#" class="nav-link"><i class="fas fa-bell"></i> Notifications</a>
          <a href="#" class="nav-link"><i class="fas fa-robot"></i> AI Chatbot</a>
          <a href="#" class="nav-link"><i class="fas fa-comment-dots"></i>Reviews</a>
        </nav>
      </div>

      <!-- Main Content -->
      <div class="col-md-10 p-4">
        <div class="topbar">
          <h3>Dashboard</h3>
          <div class="logout">
             <form action="{{ route('logout.confirm') }}" method="GET">
              @csrf
              <button type="submit" class="btn btn-primary">Logout</button>
            </form>
          </div>
        </div>

        @yield('adminpanel')
      </div>
    </div>
  </div>
</body>

</html>
