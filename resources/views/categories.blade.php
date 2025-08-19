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
                        <div class="left">
                            <h1 class="mt-0">CATEGORIES</h1>
                        </div>
                        <!-- <div class="row mt-4">
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
                        </div> -->
                        <div class="row mt-4">
                            <div class="col-8">
                                <form action="{{ route('books.search') }}" method="GET">
                                    <div class="input-group" id="input-main">
                                        <span class="input-group-text bg-white border-0"><i class="fas fa-search"></i></span>
                                        <input type="text" name="query" class="form-control border-0"
                                            placeholder="Search book name or author"
                                            value="{{ request('query') }}">
                                    </div>
                            </div>
                            <div class="col-2">
                                <button type="submit" class="btn rounded text-white bg-primary fw-bold"
                                    id="search_button">Search</button>
                                </form>
                            </div>
                        </div>

                        @if(isset($books) && request('query'))
                        <div class="col-8 border rounded bg-white shadow-sm" style="max-height:250px; overflow-y:auto;">
                            @if($books->count() > 0)
                            @foreach($books as $book)
                            <a href="{{ route('book.show', $book->id) }}" class="d-block p-2 border-bottom text-decoration-none text-dark">
                                <b>{{ $book->title }}</b> <br>
                                <small>{{ $book->author }}</small>
                            </a>
                            @endforeach
                            @else
                            <div class="p-2 text-muted">No book found</div>
                            @endif
                        </div>
                        @endif

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
            <div class="col-12 mt-3 mb-1">
                <h4><a href="#category{{ $category->id }}" class="categ">{{ $category->category_name }}</a></h4>
            </div>
            <div id="carousel{{ $category->id }}" class="carousel slide carousel-dark" data-bs-interval="false">
                <div class="carousel-inner">
                    @foreach($category->books as $book)
                    @if($loop->index % 6 == 0)
                    <div class="carousel-item @if($loop->first) active @endif">
                        <div class="books-grid">
                            @endif
                            @php
                            $avgRating = round($book->reviews->avg('rating'), 1);
                            @endphp
                            <div class="card">
                                <form action="{{ route('book.favorite', $book->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="favorite-btn btn btn-outline-danger btn-sm">
                                        <i class="fa{{ $book->is_favorite ? 's' : 'r' }} fa-heart"></i>
                                    </button>
                                </form>
                                <a href="{{ route('book.read', $book->id) }}" class="book-card">
                                    <img src="{{ asset('storage/' . $book->image) }}" alt="Book Image">
                                </a>
                                <div class="card-body" style="margin: 0px; padding: 0px;">

                                    @auth
                                    <a href="{{ route('book.show', $book->id) }}" class="card-text text-truncate">
                                        <b>Title: </b>{{$book->title}}
                                    </a>
                                    @else
                                    <a href="{{ route('login') }}" class="card-text text-truncate">
                                        <b>Title: </b>{{$book->title}}
                                    </a>
                                    @endauth
                                    <p class="card-text text-truncate"><b>Author: </b>{{$book->author}}</p>
                                </div>
                                <p class="mb-1">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <i class="bi {{ $i <= round($avgRating) ? 'bi-star-fill text-warning' : 'bi-star text-muted' }}"></i>
                                        @endfor
                                        <span class="text-muted ms-1">{{ $avgRating ?? 'No ratings' }}</span>
                                </p>
                            </div>

                            @if($loop->index % 6 == 5 || $loop->last)
                        </div>
                    </div>
                    @endif
                    @endforeach

                </div>

                @if($category->books->count() > 6)
                <a class="carousel-control-prev" href="#carousel{{ $category->id }}" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carousel{{ $category->id }}" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </a>
                @endif
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection