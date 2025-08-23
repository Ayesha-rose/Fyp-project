@extends('master')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/userpanel.css') }}">
@endsection

@section('userpanel')
<div class="container">
    <div class="row mt-5">
        <div class="col-12  mt-3">
            <h1 class="mt-3 fw-bold" style="color: #015F9E;">Reviews</h1>
        </div>

        <div class="row mt-4">
            @foreach($reviews as $bookReviews)
            <div class="col-12 mb-4">
                <div class="card w-100 shadow-sm p-3">
                    <div class="d-flex">

                        <img src="{{ asset('storage/' . $bookReviews->first()->book->image) }}" alt="{{ $bookReviews->first()->book->title }}"
                            class="rounded me-3" style="width: 120px; height: 170px; object-fit: cover; ">

                        <div class="flex-grow-1">
                            <h4 class="fw-bold mb-2">{{ $bookReviews->first()->book->title }}</h4>

                            @foreach($bookReviews as $review)
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

                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection