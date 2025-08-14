@extends('user_dashboard.usersidebar')

@section('userpanelcontent')
<div class="main-content mt-4">
    <div class="feed">
        <h2 class="fw-bold">My Reviews</h2>

        @if($reviews->count() > 0)
        <div class="row g-3">
            @foreach($reviews as $review)
            <div class="col-12">
                <div class="card w-100">
                    <div class="row ">
                        <!-- Book Image -->

                        <div class="col-md-2 d-flex align-items-center">
                            <img src="{{ asset('storage/' . $review->book->image) }}"
                                class="img-fluid rounded-start book-image"
                                alt="{{ $review->book->title }}">
                        </div>

                        <!-- Book Details -->
                        <div class="col-md-10">
                            <div class="card-body" style="padding:  5px 5px 5px 0px; margin-left: 0;">
                                <h6>
                                    <b>Title: </b>{{ $review->book->title }}
                                </h6>
                                <small class="text-muted">
                                    {{ $review->book->category->category_name ?? 'Uncategorized' }}
                                </small>
                                <p class="my-0 " style="text-align: justify;"><b>Review:</b> {{ $review->review }}</p>

                                <!-- Star Rating -->
                                <div class="star-rating ">
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
@endsection