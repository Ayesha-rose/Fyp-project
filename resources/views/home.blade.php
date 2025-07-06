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
  <link href="css/home.css" rel="stylesheet" type="text/css">

</head>

<body>
  <!-- Bootstrap 5 CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

  <!-- Eduverse Landing Page -->
  <!-- <div class="bg1"> -->
  <!-- <nav class="navbar navbar-expand-lg navbar-light py-3">
      <div class="container d-flex justify-content-between">
        <a class="navbar-brand d-flex align-items-center" href="#">
          <img src="images/Logo (1).png" alt="Eduverse Logo" class="me-2" />
          <span class="fw-bold fs-4 text-dark">Eduverse</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
          <ul class="navbar-nav me-4 ms-5 ps-5">
            <li class="nav-item ps-5 ms-5 pe-2"><a class="nav-link fw-bold active" href="Home.html">Home</a></li>
            <li class="nav-item px-2"><a class="nav-link fw-bold text-muted" href="categories.html">Categories</a></li>
            <li class="nav-item px-2"><a class="nav-link fw-bold text-muted" href="feed.html">My Books</a></li>
            <li class="nav-item px-2"><a class="nav-link fw-bold text-muted" href="reviews.html">Review</a></li>
          </ul>
          <form class="d-flex align-items-center">
            <div class="input-group me-3 shadow-sm" style="width: 200px;">
              <span class="input-group-text bg-white border-0"><i class="fas fa-search text-muted"></i></span>
              <input type="text" class="form-control border-0 bg-light" placeholder="Search" />
            </div>
            <a class="btn btn-outline-primary me-2" href="login">Sign In</a>
            <a class="btn btn-primary text-white" href="signup">Sign Up</a>
          </form>
        </div>
      </div>
    </nav> -->
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
                href="categories">Categories</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-muted fw-bold me-2" href="feed.html">My Books</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-muted fw-bold me-2" href="reviews.html">Reviews</a>
            </li>
          </ul>
          <form class="d-flex">
            <div class="input-group" id="input-feild">
              <span class="input-group-text bg-white border-0"><i class="fas fa-search"></i></span>
              <input class="form-control border-0 me-0" type="search" placeholder="Search"
                aria-label="Search">
            </div>

            <a class="btn btn-outline-primary px-5 pt-2" href="login">Sign In</a>


            <a class="btn btn-primary text-white" href="signup">Sign Up</a>
          </form>
        </div>
      </div>
    </nav>
  </header>

  <!-- Hero Section -->
  <section class="py-5 ">
    <div class="container">
      <div class="row align-items-center position-relative">
        <div class="col-md-6 ">
          <div class="" style="max-width: 500px;">
            <h1 class="fw-bold text-dark mb-5 mt-5">Explore A World of <span class="text-primary">knowledge</span> &
              <span class="text-primary ">adventure!</span>
            </h1>
            <p class="fw-semibold text-muted">Your Next Great Read!</p>
            <p class="text-secondary">Embark on a literary journey like never before with our revolutionary library
              application! A seamless experience that transcends traditional boundaries, where you can effortlessly
              search your favorite books.</p>
            <button class="btn btn-primary mt-5 py-3 px-5 fs-5 fw-medium">Start Now →</button>
          </div>
        </div>
        <div class="col-md-6 position-relative d-flex">
          <div class="position-relative ms-5 " style="height: 300px; width: 300px;">
            <img src="images/h2.png" alt="Book 1" class="position-absolute rounded"
              style="top:0; left: 280px; width: 230px; height: 280px;" />
            <img src="images/h3.png" alt="Book 2" class="position-absolute rounded"
              style="top: 260px; left:280px;  width: 230px; height: 280px;" />
            <img src="images/h1.png" alt="Book 3" class="position-absolute rounded"
              style="top: 120px; left: 480px;  width: 230px; height: 280px;" />
            <img src="images/h4.png" alt="Book 4" class="position-absolute rounded"
              style="top: 120px; left: 80px; width: 230px; height: 280px;" />
          </div>
        </div>

      </div>
    </div>
  </section>
  <!-- </div> -->
  <!-- Font Awesome (for search icon) -->
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>



  <!-- Hero Section -->
  <div class="container my-5">
    <p class="text-primary fw-bold fs-5">FEATURES</p>
    <p class="fw-bold fs-1">What You Can Do?</p>

    <div class="row g-4 mt-4">
      <!-- Card 1 -->
      <div class="col-md-4">
        <div class="card text-center border-0 p-4">
          <img src="/images/Icon.png" alt="Audio books" class="img-fluid w-50 mx-auto d-block mb-0 ">
          <h5 class="card-title fw-bold fs-4">Search book</h5>
          <p class="card-text mt-3">
            Effortlessly find your next
            read with our powerful and intuitive
            book search.
          </p>
        </div>
      </div>
      <!-- Card 2 -->
      <div class="col-md-4">
        <div class="card text-center border-0 p-4">
          <img src="/images/Icon 3.png" alt="Audio books" class="img-fluid w-50 mx-auto d-block mb-0 ">
          <h5 class="card-title fw-bold fs-4">Review book</h5>
          <p class="card-text mt-3">
            Discover insightful critiques and
            share your thoughts on diverse
            literary masterpieces effortlessly.
          </p>
        </div>
      </div>


      <!-- Card 3 -->
      <div class="col-md-4">
        <div class="card text-center border-0 p-4">
          <img src="/images/Icon2.png" alt="Audio books" class="img-fluid w-50 mx-auto d-block mb-0 ">
          <h5 class="card-title fw-bold fs-4">Audio books</h5>
          <p class="card-text mt-3">
            Discover insightful critiques and share your thoughts on diverse literary masterpieces effortlessly.
          </p>
        </div>
      </div>
    </div>


    <!-- slider  -->
    <!-- Carousel Start -->
    <div id="multiImageCarousel" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">

        <!-- First Slide (active) -->
        <div class="carousel-item active">
          <div class="row my-5 justify-content-center gx-4"> <!-- Added gx-4 here -->
            <div class="col-6 col-sm-4 col-md-2">
              <div class="card border-0">
                <img src="/images/card.png" class="img-fluid" style="width: 500px; height: auto;" alt="Image 1">
              </div>
            </div>
            <div class="col-6 col-sm-4 col-md-2">
              <div class="card border-0">
                <img src="/images/card1.png" class="img-fluid" style="width: 500px; height: auto;" alt="Image 2">
              </div>
            </div>
            <div class="col-6 col-sm-4 col-md-2">
              <div class="card border-0">
                <img src="/images/card2.png" class="img-fluid" style="width: 500px; height: auto;" alt="Image 3">
              </div>
            </div>
            <div class="col-6 col-sm-4 col-md-2">
              <div class="card border-0">
                <img src="/images/card3.png" class="img-fluid" style="width: 500px; height: auto;" alt="Image 4">
              </div>
            </div>
            <div class="col-6 col-sm-4 col-md-2">
              <div class="card border-0">
                <img src="/images/card4.png" class="img-fluid" style="width: 500px; height: auto;" alt="Image 5">
              </div>
            </div>
          </div>
        </div>

        <!-- Second Slide -->
        <div class="carousel-item">
          <div class="row my-5 justify-content-center">
            <div class="col-6 col-sm-4 col-md-2">
              <div class="card border-0">
                <img src="/images/card.png" class="img-fluid" style="width: 500px; height: auto;" alt="Image 1">
              </div>
            </div>
            <div class="col-6 col-sm-4 col-md-2">
              <div class="card border-0">
                <img src="/images/card1.png" class="img-fluid" style="width: 500px; height: auto;" alt="Image 2">
              </div>
            </div>
            <div class="col-6 col-sm-4 col-md-2">
              <div class="card border-0">
                <img src="/images/card2.png" class="img-fluid" style="width: 500px; height: auto;" alt="Image 3">
              </div>
            </div>
            <div class="col-6 col-sm-4 col-md-2">
              <div class="card border-0">
                <img src="/images/card3.png" class="img-fluid" style="width: 500px; height: auto;" alt="Image 4">
              </div>
            </div>
            <div class="col-6 col-sm-4 col-md-2">
              <div class="card border-0">
                <img src="/images/card4.png" class="img-fluid" style="width: 500px; height: auto;" alt="Image 5">
              </div>
            </div>
          </div>
        </div>

      </div>

      <!-- Controls -->
      <button class="carousel-control-prev" type="button" data-bs-target="#multiImageCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon "></span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#multiImageCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
      </button>
    </div>

    <!-- Carousel End -->


    <!-- Button Section  -->
    <div class="container my-4">
      <div class="d-flex justify-content-between align-items-center mb-4">
        <p class="fs-1 fw-bold m-0 color">Browse Genres</p>
        <select class="form-select" style="width: 17%; color:#B0B0B0;">
          <option value="">All Categories</option>
          <option value="fiction">Fiction</option>
          <option value="non-fiction">Non-fiction</option>
        </select>

      </div>
      <style>
        @media (min-width: 992px) {
          .col-lg-1-5 {
            flex: 0 0 auto;
            width: 20%;
          }
        }
      </style>

      <div class="row g-5 text-center d-flex flex-wrap">
        <div class="col-6 col-sm-4 col-md-3 col-lg-1-5">
          <button class="btn btn-bg w-100 fs-5 text-white fw-semibold">Adventure</button>
        </div>
        <div class="col-6 col-sm-4 col-md-3 col-lg-1-5">
          <button class="btn btn-bg w-100 fs-5 text-white fw-semibold">Biography</button>
        </div>
        <div class="col-6 col-sm-4 col-md-3 col-lg-1-5">
          <button class="btn btn-bg w-100 fs-5 text-white fw-semibold">Thriller</button>
        </div>
        <div class="col-6 col-sm-4 col-md-3 col-lg-1-5">
          <button class="btn btn-bg w-100 fs-5 text-white fw-semibold">Horror</button>
        </div>
        <div class="col-6 col-sm-4 col-md-3 col-lg-1-5">
          <button class="btn btn-bg w-100 fs-5 text-white fw-semibold">Love</button>
        </div>
        <div class="col-6 col-sm-4 col-md-3 col-lg-1-5">
          <button class="btn btn-bg w-100 fs-5 text-white fw-semibold">Fiction</button>
        </div>
        <div class="col-6 col-sm-4 col-md-3 col-lg-1-5">
          <button class="btn btn-bg w-100 fs-5 text-white fw-semibold">Science Fiction</button>
        </div>
        <div class="col-6 col-sm-4 col-md-3 col-lg-1-5">
          <button class="btn btn-bg w-100 fs-5 text-white fw-semibold">History</button>
        </div>
        <div class="col-6 col-sm-4 col-md-3 col-lg-1-5">
          <button class="btn btn-bg w-100 fs-5 text-white fw-semibold">Geography</button>
        </div>
        <div class="col-6 col-sm-4 col-md-3 col-lg-1-5">
          <button class="btn btn-bg w-100 fs-5 text-white fw-semibold">Novels</button>
        </div>
      </div>


    </div>

    <!-- Services -->
    <div class="container my-5">
      <p class="text-uppercase fw-bold text-primary">Services</p>
      <h2 class="fw-bold mb-4">The Services for You</h2>

      <div class="row align-items-center mb-5">
        <div class="col-md-6">
          <img src="/images/sImage.png" alt="Service Image 1" class="img-fluid">
        </div>
        <div class="col-md-6">
          <p class="fs-4 fw-bold"><span class="fw-bold text-primary">Rent</span> your favorite book fairly easy on <span
              class="fw-bold text-primary">Eduverse</span> !</p>
          <div>
            <p class="fs-6 fw-normal">Viewing, rent, and organize your favorite books has never been easier. An
              integrated digital library rent that’s simple to use, Eduverse lets you spend less time managing your work
              and more time actually doing it!</p>
          </div>
          <p class="fs-6 fw-normal">Effortless rentals, personalized shelves—Eduverse transforms book management,
            enhancing your reading experience~</p>
        </div>
      </div>

      <div class="row align-items-center flex-md-row-reverse">
        <div class="col-md-6 d-flex justify-content-end">
          <img src="/images/sImage2.png" alt="Service Image 2" class="img-fluid">
        </div>
        <div class="col-md-6">
          <p class="fs-4 fw-bold">Quick Book Rentals: <span class="fw-bold text-primary">Dive</span>into <span
              class="fw-bold text-primary">Reading</span> Instantly</p>
          <p class="fs-6 fw-normal">Discover instant literary delight. Access a vast library, borrow your favorite
            reads, and dive into captivating stories within minutes. Reading made quick and easy, just a click away!</p>
          <p class="fs-6 fw-normal">Unlock a world of stories effortlessly. Browse genres, choose, rent in minutes.
            Seamlessly manage your reading adventures with our intuitive platform~</p>
        </div>
      </div>
    </div>

    <!-- Card SEction -->
    <div>
      <div class=" mb-4">
        <p class="fs-6 fw-bold text-primary">REVIEWS</p>
        <p class="fs-1 fw-bold">💬 Reviews of Others</p>
      </div>

      <div class="row g-5 mt-5justify-content-center">
        <div class="col-lg-4 col-md-6 col-sm-12">
          <div class="shadow-lg text-center bg-white border p-4 h-100">
            <img src="/images/profile1.png" alt="" class="img-fluid mb-3">
            <p class="fs-6 fw-medium mt-2">Engaging plot, vivid characters; a captivating read that lingers in your
              thoughts.</p>
            <p class="fs-6 fw-medium text-primary mt-2">Ahmad Saugi</p>
            <p class="fs-6 fw-medium">College Student</p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 col-sm-12">
          <div class="shadow-lg text-center bg-white border p-4 h-100">
            <img src="/images/profile2.png" alt="" class="img-fluid mb-3">
            <p class="fs-6 fw-medium">Engaging plot, vivid characters; a captivating read that lingers in your thoughts.
            </p>
            <p class="fs-6 fw-medium text-primary mt-2">Ahmad Saugi</p>
            <p class="fs-6 fw-medium mt-2">College Student</p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 col-sm-12">
          <div class="shadow-lg text-center bg-white border p-4 h-100">
            <img src="/images//profile3.png" alt="" class="img-fluid mb-3">
            <p class="fs-6 fw-medium mt-2">Engaging plot, vivid characters; a captivating read that lingers in your
              thoughts.</p>
            <p class="fs-6 fw-medium mt-2 text-primary">Ahmad Saugi</p>
            <p class="fs-6 fw-medium ">College Student</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Gwet in Touxh section -->
    <div class="bg-darkblue text-white rounded-4 p-5 my-5">
      <div class="py-5 my-2">
        <div class="text-center mb-4 ">
          <h2 class="fs-1 fw-bold mb-2">Get in touch with us</h2>
          <p class="fs-6 fw-medium t2 mb-4">Embark on a literary journey like never before with our revolutionary
            library application!</p>
        </div>

        <form class="d-flex justify-content-center gap-2 flex-wrap">
          <div class="input-group w-25 min-w-200">
            <span class="input-group-text bg-white">
              <i class="bi bi-envelope-fill text-muted"></i>
            </span>
            <input type="email" class="form-control" placeholder="Your email" required>
          </div> <button type="submit" class="btn btn-primary px-4">Join Us</button>
        </form>
      </div>
    </div>
    <style>
      .bg-darkblue {
        background: linear-gradient(135deg, #0a174d, #272ea3);
      }

      .min-w-250 {
        min-width: 250px;
      }
    </style>




    <!-- Recentlty Added -->
    <div class="py-5">
      <p class=" color t1 fs-1 fw-bold text-center text-dark mt-5">Recently Added</p>

      <div class="row g-4">
        <!-- Card 1 -->
        <div class="col-lg-3 col-md-6 col-sm-12">
          <img src="/images/rImage1.png" alt="" class="img-fluid">
          <div class="bg-light mt-2 p-3 rounded">
            <p class="fs-6 text-muted mb-1">May 8, 2023</p>
            <p class="fs-6 fw-semibold mb-1">Elit in dolor varius</p>
            <p class="fs-6 fw-semibold mb-0">vestibulum ipsum ut massa</p>
          </div>
        </div>

        <!-- Card 2 -->
        <div class="col-lg-3 col-md-6 col-sm-12">
          <img src="/images/rImage2.png" alt="" class="img-fluid">
          <div class="bg-light mt-2 p-3 rounded">
            <p class="fs-6 text-muted mb-1">May 8, 2023</p>
            <p class="fs-6 fw-semibold mb-1">Amet phasellus dui habitant</p>
            <p class="fs-6 fw-semibold mb-0">magna etiam dapibus justo</p>
          </div>
        </div>

        <!-- Card 3 -->
        <div class="col-lg-3 col-md-6 col-sm-12">
          <img src="/images/rImage3.png" alt="" class="img-fluid">
          <div class="bg-light mt-2 p-3 rounded">
            <p class="fs-6 text-muted mb-1">May 8, 2023</p>
            <p class="fs-6 fw-semibold mb-1">Donec platea nunc ridiculus</p>
            <p class="fs-6 fw-semibold mb-0">pellentesque eu.</p>
          </div>
        </div>

        <!-- Card 4 -->
        <div class="col-lg-3 col-md-6 col-sm-12">
          <img src="/images/rImage4.png" alt="" class="img-fluid">
          <div class="bg-light mt-2 p-3 rounded">
            <p class="fs-6 text-muted mb-1">May 8, 2023</p>
            <p class="fs-6 fw-semibold mb-0">Facilisis magna in elementum quam.</p>
            <p class="fs-6 fw-semibold mb-0">elementum quam.</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Footer -->
    <footer class="py-5 mt-5">
      <div class="container">
        <div class="row align-items-start">
          <!-- Left side (Logo + About) -->
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="d-flex align-items-center mb-3">
              <img src="/images/Logo (1).png" alt="Eduverse Logo" style="width: 40px; height: 40px;">
              <h5 class="ms-2 fw-bold fs-4 mb-0">Eduverse</h5>
            </div>
            <p class="text-muted fs-6 fw-normal mt-4 pt-1 small">
              We make onboarding new employees ridiculously easy. On day one, they're ready to go. And retaining them is
              easier.
            </p>
            <div class="d-flex gap-3">
              <p class="fs-6 fw-normal text-muted mt-1">Follow us on:</p>
              <a href="#" class="text-muted fs-5"><i class="bi bi-facebook"></i></a>
              <a href="#" class="text-muted fs-5"><i class="bi bi-instagram"></i></a>
              <a href="#" class="text-muted fs-5"><i class="bi bi-linkedin"></i></a>
              <a href="#" class="text-muted fs-5"><i class="bi bi-twitter"></i></a>
            </div>
          </div>

          <!-- Right side (Links) -->
          <div class="col-lg-8 col-md-6">
            <div class="row">
              <div class="col-6 col-md-4 mb-3 d-flex justify-content-end">
                <ul class="list-unstyled small">
                  <li><a href="#" class="text-decoration-none fs-6 fw-medium text-dark mb-2 d-block">Home</a></li>
                  <li><a href="#" class="text-decoration-none fs-6 fw-medium text-dark mb-2 d-block">Features</a></li>
                  <li><a href="#" class="text-decoration-none fs-6 fw-medium text-dark mb-2 d-block">Services</a></li>
                </ul>


              </div>
              <div class="col-6 col-md-4 mb-3 d-flex justify-content-end">
                <ul class="list-unstyled small ">
                  <li><a href="#" class="text-decoration-none fs-6 fw-medium mb-2 text-dark d-block">Categories</a></li>
                  <li><a href="#" class="text-decoration-none fs-6 fw-medium mb-2 text-dark d-block">My Books</a></li>
                </ul>
              </div>
              <div class="col-6 col-md-4 mb-3 d-flex justify-content-end">
                <ul class="list-unstyled small ">
                  <li><a href="#" class="text-decoration-none fs-6 fw-medium mb-2 text-dark d-block">Review</a></li>
                  <li><a href="#" class="text-decoration-none fs-6 fw-medium mb-2 text-dark d-block">Get Updates</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>

    <!-- Bootstrap icons (if not added already) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">


</body>