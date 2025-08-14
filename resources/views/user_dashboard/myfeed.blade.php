@extends('user_dashboard.usersidebar')

@section('userpanelcontent')
<div class="main-content mt-4">
    <div class="feed">
        <h2 class="fw-bold">My Feed</h2>
        <div class="row">
            @forelse ($relatedBooks as $book)
                <div class="books-grid">
                    <div class="card" style="width: 160px;">
                        <a href="{{ route('book.read', $book->id) }}" class="book-card">
                            <img src="{{ asset('storage/' . $book->image) }}" class="card-img-top" alt="{{ $book->title }}">
                        </a>
                        <div class="card-body" style="margin: 0; padding: 0;">
                            <h6 class="mb-1">{{ $book->title }}</h6>
                            @if($book->category)
                                <small class="text-muted">{{ $book->category->category_name }}</small>
                            @endif
                            <a href="{{ route('book.show', $book->id) }}" class="btn btn-primary btn-sm mt-auto">View</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-info" style="display: flex; justify-content: center; align-items: center; margin-top: 150px;">
                        No personalized recommendations yet. Start reading to populate your feed.
                    </div>
                </div>
            @endforelse
        </div>

        <div class="mt-3">
            {{ $relatedBooks->links() }}
        </div>
    </div>
</div>
@endsection
