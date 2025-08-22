@extends('admin.master')

@section('adminpanel')
<div class="main-content ">
    <h2 class="fw-bold">All Reviews</h2>
    <div class="row">
        @foreach($books as $book)
        @php
        $avgRating = round($book->reviews->avg('rating'), 1); 
        @endphp

        <div class="books-grid">
            <div class="card" style="width: 160px;">
                <img src="{{ asset('storage/'.$book->image) }}" class="book-card" alt="{{ $book->title }}">

                <div class="card-body" style="margin: 3px 0px 0px 3px; padding: 3px 0px 0px 3px;">
                    <h5 class="card-title text-truncate" style="font-size: medium;">Title: {{ $book->title }}</h5>

                    @if($book->reviews->count() > 0)
                    @php
                    $avgRating = round($book->reviews->avg('rating'));
                    @endphp

                    <div class="star-rating mb-2">
                        @for ($i = 1; $i <= 5; $i++)
                            @if ($i <=$avgRating)
                            <i class="bi bi-star-fill text-warning"></i>
                            @else
                            <i class="bi bi-star text-warning"></i>
                            @endif
                            @endfor
                            <span class="text-muted ms-1">({{ $avgRating }}/5)</span>
                    </div>
                    @else
                    <span class="text-muted">No ratings yet</span>
                    @endif

                    <a href="{{ route('admin.book_reviews', $book->id) }}" class="btn btn-sm ms-3 mb-2 text-center" style="background-color: #015F9E; color: white;">
                        View Reviews
                    </a>

                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection