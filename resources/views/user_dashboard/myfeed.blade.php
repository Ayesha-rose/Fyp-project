@extends('user_dashboard.usersidebar')

@section('userpanelcontent')
<div class="main-content mt-4">
    <div class="feed">
        <h2 class="fw-bold">My Feed</h2>

        <div class="row">
            @forelse ($relatedBooks as $book)
                <div class="books-grid">
                    <div class="card"  style="width: 160px;">
                        <a href="{{ route('book.read', $book->id) }}" class="book-card">
                            <img src="{{ asset('storage/' . $book->image) }}" alt="{{ $book->title }}" style="height: 220px; object-fit: cover;">
                        </a>
                        <div class="card-body" style="margin: 3px 0px 0px 3px; padding: 3px 0px 0px 3px;">
                            <h6 class="mb-1 text-truncate">{{ $book->title }}</h6>
                            @if($book->category)
                                <div class="d-flex justify-content-between align-items-center">
                                    <small class="text-muted">{{ $book->category->category_name }}</small>
                                    <a href="{{ route('book.show', $book->id) }}" class="btn btn-primary btn-sm me-1 mb-1">View</a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                 <p class="text-muted" style="display: flex; justify-content: center; align-items: center; margin-top: 150px;">
                    No personalized recommendations yet. Start reading books to see them appear in your feed.
                </p>
            @endforelse
        </div>
    </div>
</div>
@endsection