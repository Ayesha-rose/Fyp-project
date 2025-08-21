<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Eduverse</title>
    <!-- Bootstrap & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <style>
        .star-rating {
            flex-direction: row-reverse;
            /* highest star first */
            justify-content: flex-end;
        }

        .star-rating input {
            display: none;
            /* hide the radio buttons */
        }

        .star-rating label {
            font-size: 1.5rem;
            color: #ccc;
            cursor: pointer;
            transition: color 0.2s;
        }

        /* Highlight stars when selected */
        .star-rating input:checked~label,
        .star-rating label:hover,
        .star-rating label:hover~label {
            color: #ffc107;
            /* yellow stars */
        }
    </style>
</head>


<body>

    <div class="container">
        <div class="row align-items-center my-4 g-4">
            <div class="col-md-4">
                <img src="{{ asset('storage/' . $book->image) }}" class="img-fluid rounded" alt="Book Image">
            </div>

            <div class="col-md-8">
                <h2>Title: {{ $book->title }}</h2>
                <h5>Author: {{ $book->author }}</h5>
                <h5>Category: {{ $book->category->category_name }}</h5>
                <p style="text-align: justify;"><b>Description:</b> {{ $book->description }}</p>
                <div class="d-flex gap-2 my-2">
                    @auth
                    <form action="{{ route('book.read', $book->id) }}" method="POST" target="_blank">
                        @csrf
                        <button type="submit" class="btn btn-primary">Read Book</button>
                    </form>
                    @endauth

                    @guest
                    <a href="{{ route('login') }}" class="btn btn-primary">
                        Read Book
                    </a>
                    @endguest

                    @auth
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#reviewModal">
                        Add your Review
                    </button>
                    @else
                    <div class="alert alert-info my-3">
                        Please <a href="{{ route('login') }}" class="alert-link">log in</a> to submit a review.
                    </div>
                    @endauth
                </div>
            </div>
        </div>

        {{-- Flash message --}}
        @if (session('status'))
        <div class="alert alert-success my-2">{{ session('status') }}</div>
        @endif

        {{-- Validation errors --}}
        @error('review')
        <div class="alert alert-danger my-2">{{ $message }}</div>
        @enderror

        {{-- Reviews List --}}
        <h5 class="mt-3">Reviews ({{ $book->reviews->count() }})</h5>
        @if ($book->reviews->isEmpty())
        <p class="text-muted">Be the first to review this book.</p>
        @else
        @foreach ($book->reviews as $rev)
        <div class="border rounded p-3 mb-2">
            <div class="d-flex justify-content-between align-items-center mb-1">
                <strong>{{ $rev->user->name }}</strong>
                <small class="text-muted">{{ $rev->created_at->diffForHumans() }}</small>
            </div>
            <p class="mb-0">{!! nl2br(e($rev->review)) !!}</p>

            <p class="mb-1">
                @for ($i = 1; $i <= 5; $i++)
                    <i class="bi {{ $i <= $rev->rating ? 'bi-star-fill text-warning' : 'bi-star text-muted' }}"></i>
                    @endfor
            </p>
        </div>
        @endforeach
        @endif
    </div>

    {{-- Review Modal --}}
    <div class="modal fade" id="reviewModal" tabindex="-1" aria-labelledby="reviewModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content p-3 rounded-4 shadow">
                <div class="modal-header border-0">
                    <h5 class="modal-title fw-bold" id="reviewModalLabel" style="color: #015F9E;">
                        <i class="fa-solid fa-star"></i> Write Your Review
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @php
                    $existingReview = $book->reviews->where('user_id', auth()->id())->first();
                    $currentRating = optional($existingReview)->rating ?? 0;
                    @endphp

                    <form method="POST" action="{{ route('books.reviews.store', $book) }}">
                        @csrf

                        {{-- Review --}}
                        <div class="mb-3">
                            <textarea name="review" class="form-control" rows="4" required>{{ old('review', optional($existingReview)->review) }}</textarea>
                        </div>

                        {{-- Star Rating --}}
                        <div class="mb-3">
                            <label class="form-label fw-bold" style="color: #015F9E;">Rate this book:</label>
                            <div class="star-rating d-flex gap-1">

                                @for ($i = 5; $i >= 1; $i--)
                                <input type="radio" name="rating" id="rating{{ $i }}" value="{{ $i }}"
                                    autocomplete="off" {{ $i == $currentRating ? 'checked' : '' }} required>
                                <label for="rating{{ $i }}" title="{{ $i }} stars">&#9733;</label>
                                @endfor

                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">
                            {{ $existingReview ? 'Update Review' : 'Submit Review' }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
