<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <style>
    * {
      font-family: Poppins, sans-serif;
    }

    .vertical-nav {
      width: 270px;
      height: 100vh;
      /* padding: 20px; */
      /* position: absolute; */
      left: 0;
      top: 60px;
      overflow-y: auto;
    }

    #mybooks,
    #reviews,
    .nav-item {
      color: #015F9E;
    }

    .main-content {
      /* margin-left: 250px; */
      width: calc(100% - 270px);
    }

    /* .navbar {
    position: relative; 
    width: 100%;
} */
    nav {
      position: top;
      font-size: 16px;
    }

    #sidemenu:hover {
      color: #015F9E;
      font-style: bold;
      background-color: #ebf6fd;
      border-radius: 8px;
    }

    .input-group,
    #logout-btn {
      box-shadow: 4px 6px 10px rgba(0, 0, 0, 0.2);
      border-radius: 4px;
    }

    #bar {
      background-color: #ebf6fd;
      border-radius: 8px;
    }

    #input-feild input:focus,
    #input-main input:focus {
      outline: none;
      box-shadow: none;
    }

    #logout-btn {
      color: red;
      background-color: white;
    }

    #logout-btn:hover {
      background-color: #015F9E;
      color: white;
    }

    .feed {
      color: #015F9E;
      width: 100%;
      padding: 15px;
    }

    .feed-box {
      padding: 40px;
      margin-top: 20px;
      text-align: center;
    }

    .toggle-btn {
      display: none;
    }

    @media (max-width: 768px) {
      .vertical-nav {
        display: none;
        position: absolute;
        width: 100%;
      }

      .toggle-btn {
        display: block;
        margin-left: 20px;
      }

      .main-content {
        margin-left: 0;
        width: 100%;
      }

      .vertical-nav.show {
        display: block;
        position: relative;
      }
    }

    .calendar-box {
      height: 120px;
      padding: 10px;
      vertical-align: top;
    }

    .event {
      font-size: 0.7rem;
      color: red;
    }

    .background {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: url('images/logout.png') center/cover no-repeat;
      justify-content: center;
      align-items: center;
      display: flex;
    }

    .card {
      width: 350px;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="vertical-nav" id="sidebar">
        <div class="py-4 mb-4">
          <div class="media d-flex align-items-center">
            <i class="fa-solid fa-user me-2 fs-5"></i> Admin
          </div>
          <ul class="nav flex-column">
            <li class="nav-item" id="sidemenu"><a href="categories" class="nav-link">
                <i class="fa-solid fa-folder"></i> Categories</a></li>
            <li class="nav-item" id="sidemenu"><a href="admin.dashboard" class="nav-link"><i
                  class="fa-solid fa-square-poll-vertical"></i> Total Books</a></li>
            <li class="nav-item" id="sidemenu"><a href="#" class="nav-link "><i
                  class="fa-solid fa-calendar-days"></i> Calendar</a></li>
            <li class="nav-item" id="sidemenu"><a href="#" class="nav-link "><i
                  class="fa-solid fa-clock"></i> History</a></li>
          </ul>
        </div>
      </div>
      <div class="main-content mt-4">
        @yield ('main-content')
      </div>
    </div>

  </div>



</body>

</html>