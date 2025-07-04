<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="home.blade.css">
  <style>

    .sidebar {
      height: 200vh;
      position: absolute;
      top: 60;
      left: 0;
      width: 250px;
      padding: 10px 20px;
      background-color: rgb(100, 15, 126);
      padding-top: 70px;

    }

    .main-content {
      margin-left: 250px;
      padding: 20px;
    }

  </style>
</head>

<body>
  <div class="sidebar">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link text-white" href="/">Total Books</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="/categories">Categrories</a>
      </li>
    </ul>
  </div>
  @yield ('main-content')

</body>

</html>