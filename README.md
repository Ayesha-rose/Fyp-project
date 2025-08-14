

<!-- @extends('user_dashboard.usersidebar')

@section('userpanelcontent')
<div class="main-content mt-4">
    <div class="feed">
        <h2 class="fw-bold">My Reviews</h2>
        @if($reviews->count() > 0)
        <div class="row">
            @foreach($reviews as $review)
            <div class="books-grid">
                <div class="card " style="width: 160px;">
                
                    <img src="{{ asset('storage/' . $review->book->image) }}"
                        class="book-card card-img-top"style="margin: 0; padding: 0;" alt="{{ $review->book->title }}">
                    <div class="card-body">
                        <h6 class="mb-1"><b>Title: </b>{{ $review->book->title }}</h6>
                        <small class="text-muted">
                            {{ $review->book->category->category_name ?? 'Uncategorized' }}
                        </small>
                        <p class="mt-2">{{ $review->review }}</p>
                        <div class="star-rating">
                            @for ($i = 1; $i <= 5; $i++)
                                @if ($i <=$review->rating)
                                <i class="bi bi-star-fill text-warning"></i>
                                @else
                                <i class="bi bi-star text-warning"></i>
                                @endif
                                @endfor
                        </div>
                        

                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="d-flex flex-column align-items-center text-muted feed-box fw-bold">
            <p class="text-center">You haven’t reviewed any books yet.</p>
        </div>
        @endif
    </div>
</div>
@endsection-->


