@extends('master')

@section('body-class', 'categories-background')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/categories.css') }}">
@endsection

@section('userpanel')
<div class="categories d-flex-lg p-0 m-0" id="categories">
    <div class="container">
        <div class="row">
            <div class="front">
                <div class="row mt-5">
                    <div class="col-6 p-0 mt-3">
                        <div class="left">
                            <h1 class="mt-3">CATEGORIES</h1>
                        </div>
<!-- Manage categories -->
                        <div class="row mt-5">
                            <div class="col-md-5 ms-3 me-2">
                                <ul class="category-list">
                                    @foreach($categories as $category)
                                    <li class="category-item">
                                        <b>
                                            <a class="category-term" href="#carousel{{ $category->id }}">
                                                {{ $category->category_name }}
                                            </a>
                                        </b>
                                    </li>

                                    @if(($loop->iteration % 6) == 0 && !$loop->last)
                                </ul>
                            </div>
                            <div class="col-md-5 ms-3 me-2">
                                <ul class="category-list">
                                    @endif
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
<!-- condition -->
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