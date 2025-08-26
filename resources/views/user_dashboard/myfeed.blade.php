@extends('user_dashboard.usersidebar')

@section('userpanelcontent')
<div class="main-content mt-4">
    <div class="feed">
        <h2 class="fw-bold mb-4">My Feed</h2>

        <div class="row g-3">
            @forelse ($relatedBooks as $book)
                <div class="col-md-3 col-sm-6">
                    <div class="card h-100 shadow-sm">
                        <a href="{{ route('book.read', $book->id) }}" class="book-card">
                            <img src="{{ asset('storage/' . $book->image) }}" class="card-img-top" alt="{{ $book->title }}" style="height: 220px; object-fit: cover;">
                        </a>
                        <div class="card-body p-2">
                            <h6 class="mb-1 text-truncate">{{ $book->title }}</h6>
                            @if($book->category)
                                <div class="d-flex justify-content-between align-items-center">
                                    <small class="text-muted">{{ $book->category->category_name }}</small>
                                    <a href="{{ route('book.show', $book->id) }}" class="btn btn-primary btn-sm">View</a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="text-muted text-center mt-5">
                        <h5>No personalized recommendations yet</h5>
                        <p>Start reading books to see them appear in your feed.</p>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection