@extends('user_dashboard.usersidebar')

@section('userpanelcontent')
<div class="main-content mt-4">
    <div class="feed">
        <h2 class="fw-bold">Already Read</h2>
        <div class="row">
            @forelse ($books as $item)
                <div class="books-grid">
                    <div class="card">
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
                <p class="text-muted" style="display: flex; justify-content: center; align-items: center; margin-top: 150px;">You have not read any books yet.</p>
            @endforelse
        </div>
    </div>
</div>
@endsection
