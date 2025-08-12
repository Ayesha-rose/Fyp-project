@extends('user_dashboard.usersidebar')

@section('userpanelcontent')
<div class="main-content mt-4">
    <div class="feed">
        <h2 class="fw-bold">Currently Reading Stat</h2>
        <div class="row">
            @forelse ($books as $item)
                <div class="books-grid">
                    <div class="card" style="width: 160px;">
                        <a href="{{ route('book.read', $item->book->id) }}" class="book-card">
                            <img src="{{ asset('storage/' . $item->book->image) }}" alt="Book Image">
                        </a>
                        <div class="card-body" style="margin: 0; padding: 0;">
                            <a href="{{ route('book.show', $item->book->id) }}" class="card-text">
                                <b>Title: </b>{{ $item->book->title }}
                            </a>
                            <p class="card-text"><b>Author: </b>{{ $item->book->author }}</p>
                        </div>
                        <div class="p-2">
                            <form action="{{ route('book.complete', $item->book->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-success btn-sm">
                                    Mark as Read
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-muted">You are not currently reading any books.</p>
            @endforelse
        </div>
    </div>
</div>
@endsection
