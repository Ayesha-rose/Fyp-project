@extends('master')

@section('body-class', 'homepage-background')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endsection

@section('userpanel')
<!-- Hero Section -->
<div class="userpanel">
  <div class="container">
    <div class="row">
      <div class="col-md-6 py-5 mt-5">
        <h1 class="fw-bold text-dark mb-5">Explore A World of <br><span class="text-primary"><u>knowledge</u></span> &<br>
          <span class="text-primary "><u>adventure!</u></span>
        </h1>
        <p class="fw-semibold text-muted">Your Next Great Read!</p>
        <p class="text-secondary">Embark on a literary journey like never before with our revolutionary library
          application! A seamless experience that transcends traditional boundaries, where you can effortlessly
          search your favorite books.</p>
        <button class="btn btn-primary mt-5 py-3 px-5 fs-5 fw-medium">Start Now →</button>
        <br>
        <br><br>
      </div>
      <div class="col-md-6 mt-2">
        <div class="position-relative">
          <img src="images/h2.png" alt="Book 1" class="position-absolute rounded" href="#"
            style="top: 20px; left: 210px; height: 250px; width: 190px; " />
          <img src="images/h3.png" alt="Book 4" class="position-absolute rounded" href="#"
            style="top: 315px; left:270px; height: 230px; width: 170px; " />
          <img src="images/h1.png" alt="Book 2 right" class="position-absolute rounded" href="#"
            style="top: 120px; left: 390px; height: 240px; width: 190px; " />
          <img src="images/h4.png" alt="Book 2 left" class="position-absolute rounded" href="#"
            style="top: 210px; left: 0%; height: 320px; width: 245px; " />
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>



<!-- Hero Section -->
<div class="container my-5">
  <p class="text-primary fw-bold fs-5">FEATURES</p>
  <p class="fw-bold fs-1">What You Can Do?</p>

  <div class="row g-4 mt-4">
    <!-- Card 1 -->
    <div class="col-md-4">
      <div class="card text-center border-0 p-4">
        <div class="icon-box mx-auto mb-3">
          <i class="fas fa-search"></i>
        </div>
        <br>
        <h5 class="card-title fw-bold fs-4">Search Book and Author</h5>
        <p class="card-text mt-3 text-muted">
          Explore an intelligent search that connects you instantly with the books and authors you love making reading smarter and easier.
        </p>
      </div>
    </div>


    <div class="col-md-4">
      <div class="card text-center border-0 p-4">
        <div class="icon-box mx-auto mb-3">
          <i class="fa-solid fa-comment-dots"></i>
        </div>
        <br>
        <h5 class="card-title fw-bold fs-4">Review</h5>
        <p class="card-text mt-3 text-muted">
          Enables readers to share their experiences and provide star ratings, guiding others to make well informed decisions.
        </p>
      </div>
    </div>


    <div class="col-md-4">
      <div class="card text-center border-0 p-4">
        <div class="icon-box mx-auto mb-3">
          <i class="fa-solid fa-fire"></i>
        </div>
        <br>
        <h5 class="card-title fw-bold fs-4">Streak</h5>
        <p class="card-text mt-3 text-muted">
          Track your learning streaks to stay motivated, maintain consistency, and celebrate your daily progress in reading and learning.
        </p>
      </div>
    </div>
  </div>


  <h2 class="mb-4 " style="color: #015F9E;"><b>Top Rated Reviews</b></h2>
  @if($topReviews->count() > 0)
  <div class="row justify-content-center">
    <div class="books-grid d-flex flex-wrap justify-content-center gap-5">
      @foreach($topReviews as $review)
      <div class="card">
        <a href="#" class="book-card">
          <img src="{{ asset('storage/'.$review->book->image) }}" alt="{{ $review->book->title }}">
        </a>
        <div class="card-body" style="margin: 0; padding: 0; width: 160px; overflow: hidden;">
          <h5 class="card-text text-truncate">{{ $review->book->title }}</h5>
          <p class="card-text text-truncate">{{ $review->book->author }}</p>
          <p class="card-text">
            @for ($i = 1; $i <= 5; $i++)
              @if ($i <=$review->rating)
              <i class="fas fa-star text-warning"></i>
              @else
              <i class="far fa-star text-muted"></i>
              @endif
              @endfor
          </p>
        </div>
      </div>
      @endforeach
    </div>
  </div>
  @else
  <div class="d-flex flex-column align-items-center text-muted feed-box fw-bold">
    <p class="text-center">No top reviews available.</p>
  </div>
  @endif


  <div class="container my-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h2 class=" fw-bold m-0 color">Browse Genres</h2>
      <select class="form-select" style="width: 17%; color:#B0B0B0;">
        <option value="">All Categories</option>
        @foreach($categories->skip(5) as $category)
        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
        @endforeach
      </select>
    </div>

    <div class="row g-5 text-center d-flex justify-content-between">
      @foreach($categories->take(5) as $category)
      <div class="col-6 col-sm-4 col-md-3 col-lg-2">
        <a href="#carousel{{ $category->id }}" class="btn btn-bg btn-category w-100 text-white fw-semibold">
          {{ $category->category_name }}
        </a>
      </div>
      @endforeach
    </div>
  </div>


  <!-- Services -->
  <div class="container my-5">
    <p class="text-uppercase fw-bold text-primary">Services</p>
    <h2 class="fw-bold mb-4">The Services for You</h2>

    <div class="row align-items-center mb-5">
      <div class="col-md-5">
        <img src="/images/sImage.png" alt="Service Image 1" class="img-fluid">
      </div>
      <div class="col-md-7">
        <p class="fs-4 fw-bold"><span class="fw-bold text-primary">Rent</span> your favorite book fairly easy on <span
            class="fw-bold text-primary">Eduverse</span> !</p>
        <div>
          <p class="fs-6 text-muted">Viewing, rent, and organize your favorite books has never been easier. An
            integrated digital library rent that’s simple to use, Eduverse lets you spend less time managing your work
            and more time actually doing it!</p>
        </div>
        <p class="fs-6  text-muted fw-normal">Effortless rentals, personalized shelves—Eduverse transforms book management,
          enhancing your reading experience~</p>
      </div>
    </div>

    <div class="row align-items-center flex-md-row-reverse">
      <div class="col-md-6 d-flex justify-content-end">
        <img src="/images/sImage2.png" alt="Service Image 2" class="img-fluid">
      </div>
      <div class="col-md-6">
        <p class="fs-4 fw-bold ">Quick Book Rentals: <span class="fw-bold text-primary">Dive </span>into <span
            class="fw-bold text-primary">Reading</span> Instantly</p>
        <p class="fs-6 fw-normal text-muted">Discover instant literary delight. Access a vast library, borrow your favorite
          reads, and dive into captivating stories within minutes. Reading made quick and easy, just a click away!</p>
        <p class="fs-6 fw-normal text-muted">Unlock a world of stories effortlessly. Browse genres, choose, rent in minutes.
          Seamlessly manage your reading adventures with our intuitive platform~</p>
      </div>
    </div>
  </div>


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

</div>
@stop