@extends('user_dashboard.usersidebar')

@section('userpanelcontent')
<div class="main-content mt-4">
    <div class="feed">
        <h2 class="fw-bold">Favorites</h2>
        <div class="row">
            @forelse ($books as $item)
            <div class="books-grid">
                <div class="card">
                    <form action="{{ route('book.favorite', $item->book->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="favorite-btn btn btn-danger btn-sm">
                            <i class="fa{{ $item->book->is_favorite ? 's' : 'r' }} fa-heart"></i>
                        </button>
                    </form>
                    <a href="{{ route('book.show', $item->book->id) }}" class="book-card">
                        <img src="{{ asset('storage/' . $item->book->image) }}" alt="Book Image">
                    </a>
                    <div class="card-body">
                        <a href="{{ route('book.show', $item->book->id) }}" class="card-text">
                            <b>Title: </b>{{ $item->book->title }}
                        </a>
                        <p class="card-text"><b>Author: </b>{{ $item->book->author }}</p>
                    </div>
                </div>
            </div>
            @empty
            <p class="text-muted" style="display: flex; justify-content: center; align-items: center; margin-top: 150px;">No books in favorites.</p>
            @endforelse
        </div>
    </div>
</div>
@endsection