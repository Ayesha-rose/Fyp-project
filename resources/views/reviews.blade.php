@extends('master')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/userpanel.css') }}">
@endsection

@section('userpanel')
<div class="container">
    <div class="row mt-5">
        <div class="col-12 mt-3">
            <h1 class="mt-3 fw-bold" style="color: #015F9E;">Reviews</h1>
        </div>

        <div class="row mt-4">
            {{-- Books Loop --}}
            @foreach($books as $book)
                <div class="col-12 mb-4">
                    <div class="card w-100 shadow-sm p-3">
                        <div class="d-flex">
                            <img src="{{ asset('storage/' . $book->image) }}" 
                                 alt="{{ $book->title }}"
                                 class="rounded me-3" 
                                 style="width: 120px; height: 170px; object-fit: cover;">

                            <div class="flex-grow-1">
                                <h4 class="fw-bold mb-2">{{ $book->title }}</h4>

                                @php
                                    $allReviews = $book->reviews; 
                                    $showAll = isset($expandedBookId) && $expandedBookId == $book->id;
                                    $reviewsToShow = $showAll ? $allReviews : $allReviews->take(2);
                                @endphp

                                {{-- Reviews list --}}
                                @foreach($reviewsToShow as $review)
                                    <div class="mb-3 position-relative" style="padding-right: 100px;">
                                        <div>
                                            <strong>{{ $review->user->name }}:</strong> {{ $review->review }}
                                        </div>
                                        <small class="text-muted position-absolute" style="top: 0; right: 0;">
                                            {{ $review->created_at->diffForHumans() }}
                                        </small>
                                    </div>
                                    <hr class="my-2">
                                @endforeach

                                {{-- Show More / Show Less link for reviews --}}
                                @if($allReviews->count() > 2)
                                    @if($showAll)
                                        <a href="{{ route('reviews', ['book_limit' => $limit]) }}" class="text-danger">
                                            Show Less
                                        </a>
                                    @else
                                        <a href="{{ route('reviews', ['book_id' => $book->id, 'book_limit' => $limit]) }}" 
                                           class="text-primary">
                                            Show More
                                        </a>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Show More Books --}}
        @if($totalBooks > $limit)
            <div class="text-center mt-4">
                <a href="{{ route('reviews', ['book_limit' => $limit + 4]) }}">
                    Show More
                </a>
            </div>
        @endif
    </div>
</div>
@endsection
