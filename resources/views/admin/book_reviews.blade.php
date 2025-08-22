@extends('admin.master')

@section('adminpanel')
<div class="col-md-12 main-content">
    
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Reviews for: {{ $book->title }}</h2>
        <a href="{{ route ('admin.adminreviews')}}" class="btn text-white px-4 pt-2" style="background-color: #015F9E;">
            Back
        </a>
    </div>

    @if($book->reviews->count() > 0)
    @foreach($book->reviews as $review)
    <div class="card mb-2">
        <div class="card-body">
            <strong>User:</strong> {{ $review->user->name ?? 'Anonymous' }} <br>
            <strong>Review:</strong> {{ $review->review }} <br>
            <strong>Rating:</strong>
            <div class="star-rating mb-2 d-inline">
                @for ($i = 1; $i <= 5; $i++)
                    @if ($i <=$review->rating)
                    <i class="bi bi-star-fill text-warning"></i>
                    @else
                    <i class="bi bi-star text-warning"></i>
                    @endif
                    @endfor
                    <span class="text-muted ms-1">({{ $review->rating }}/5)</span>
            </div>
        </div>
    </div>
    @endforeach
    @else
    <p>No reviews for this book yet.</p>
    @endif
</div>
@endsection