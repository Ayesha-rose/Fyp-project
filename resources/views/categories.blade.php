@extends('master')

@section('body-class', 'categories-background')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/categories.css') }}">
@endsection

@section('userpanel')
<div class="categories d-flex-lg  p-0 m-0" id="categories">
    <div class="container">
        <div class="row">
            <div class="front">
                <div class="row mt-5">
                    <div class="col-6 p-0 mt-3">
                        <div class="left text-primary fw-bold" id="heading">
                            <h1 class="heading-main mt-0"><b>CATEGORIES</b></h1>
                        </div>
                        <div class="row mt-4">
                            <div class="col-8">
                                <div class="input-group" id="input-main">
                                    <span class="input-group-text bg-white border-0"><i
                                            class="fas fa-search"></i></span>
                                    <input type="text" class="form-control border-0"
                                        placeholder="Search book name and author" src="">
                                </div>
                            </div>
                            <div class="col-2">
                                <button class="btn rounded text-white bg-primary fw-bold"
                                    id="search_button">Search</button>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-md-5 ms-3 me-2">
                                <ul class="category-list">
                                    @foreach($categories as $category)
                                    <li class="category-item">
                                        <b>
                                            <a class="category-term" href="#carousel{{ $category->id }}">{{ $category->category_name }}</a>
                                        </b>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 ml-5 mt-3">
                        <img src="images/globe.png" class="globe ms-5">
                    </div>
                </div>
            </div>
            <!-- <div class="carousel carousel-dark slide mt-3" id="carouseldemo" data-bs-wrap="false">
                <div class="carousel-inner  mt-0">
                    <div class="col-12 mb-0 text-primary fw-bold" id="Computer">
                        @foreach($categories as $category)
                        <h4><b>{{ $category->category_name }}</b></h4>
                        @endforeach
                        <ol class="carousel-indicators mx-5 carousel-dark">
                            <li data-bs-target="#carouseldemo" data-bs-slide-to="0" class="active"></li>
                            <li data-bs-target="#carouseldemo" data-bs-slide-to="1"></li>
                            <li data-bs-target="#carouseldemo" data-bs-slide-to="2"></li>
                        </ol>
                    </div>
                    <div class="carousel-item active">
                        <div class="row">
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="../images/shelf_computer/1.png" alt="Image 1" style="object-fit:cover;">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_computer/2.png" alt="Image 2" style="object-fit: contain;">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_computer/3.png" alt="Image 3" style="object-fit: contain;">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_computer/4.png" alt="Image 4" style="object-fit: contain;">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_computer/5.png" alt="Image 5" style="object-fit: contain;">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_computer/6.png" alt="Image 6" style="object-fit: contain;">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_computer/7.png" alt="Image 7" style="object-fit: contain;">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_computer/8.png" alt="Image 8" style="object-fit: contain;">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_computer/9.png" alt="Image 9" style="object-fit: contain;">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_computer/10.png" alt="Image 10" style="object-fit: contain;">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_computer/11.png" alt="Image 11" style="object-fit: contain;">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_computer/12.png" alt="Image 12" style="object-fit: contain;">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_computer/13.png" alt="Image 13" style="object-fit:cover;">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_computer/14.png" alt="Image 14" style="object-fit: contain;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouseldemo" type="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#carouseldemo" type="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
            </div> -->
            @foreach($categories as $category)
            <div class="col-12 mt-3 text-primary fw-bold">
                <h4><b>{{ $category->category_name }}</b></h4>
            </div>
            <div class="carousel carousel-dark slide" id="carousel{{ $category->id }}" data-bs-ride="carousel">
                <div class="carousel-inner ">
                    {{-- First Carousel Item (Active) --}}
                    <div class="carousel-item active">
                        <div class="row">
                            {{-- Dummy Book/Image Card --}}
                            @foreach($category->books as $book)

                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <a href="{{ route('book.show', $book->id) }}" class="card-text">
                                        <img src="{{ asset ('storage/' . $book->image)}}" class="card-img-top" alt="">
                                    </a>
                                    <!-- <div class="card-body">
                                        <a href="{{ route('book.show', $book->id) }}" class="card-text"> {{$book->title}}</a>
                                        <p class="card-text">{{$book->category->category_name}}</p>
                                    </div> -->

                                </div>
                            </div>
                            @endforeach

                            {{-- You can repeat more dummy cards here or fetch real data --}}
                        </div>
                    </div>

                    {{-- Optional: Add More Carousel Items for more books --}}
                </div>

                {{-- Controls --}}
                <a class="carousel-control-prev" href="#carousel{{ $category->id }}" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#carousel{{ $category->id }}" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
            </div>
            @endforeach
        </div>
    </div>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-5 mt-5 " id="footer">
                    <img src="images/Logo_ft.png" class="footer_logo">
                    <p class="text-muted">We make our onboarding new employees <br> ridiculously easy. On day one
                        ther're <br> ready to go.
                        And
                        retaining them is easier.</p>
                    <p class="text-muted">Follow us on:
                        <a href="#" class="icon"><i class="fa-brands fa-facebook"></i></a>
                        <a href="#" class="icon"><i class="fa-brands fa-instagram"></i></a>
                        <a href="#" class="icon"><i class="fa-brands fa-linkedin"></i></a>
                        <a href="#" class="icon"><i class="fa-brands fa-twitter"></i></a>

                    </p>
                </div>
                <div class="col-6 mt-4 ms-5 text-muted">
                    <div class="row  my-5">
                        <div class="col-4 ">
                            <b>Home</b><br>
                            <b>Features</b><br>
                            <b>Services</b>
                        </div>
                        <div class="col-4 ">
                            <b>Catagories</b><br>
                            <b>My Books</b>
                        </div>
                        <div class="col-4 ">
                            <b>Reviews</b><br>
                            <b>Get Updates</b>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
@endsection

@section('scripts')
<script>
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();

            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection