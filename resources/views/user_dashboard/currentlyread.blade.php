@extends('user_dashboard.usersidebar')

@section('userpanelcontent')
<div class="main-content mt-4">
    <div class="feed">
        <h2 class="fw-bold">Currently Reading</h2>
        <div class="row">
            @forelse ($books as $item)
                <div class="books-grid">
                    <div class="card" style="width: 160px;">
                        <a href="{{ route('book.read', $item->book->id) }}" class="book-card">
                            <img src="{{ asset('storage/' . $item->book->image) }}" alt="Book Image">
                        </a>
                        <div class="card-body" style="margin: 3px 0px 0px 3px; padding: 3px 0px 0px 3px;">
                            <a href="{{ route('book.show', $item->book->id) }}" class="card-text d-block text-truncate">
                                <b>Title: </b>{{ $item->book->title }}
                            </a>
                            <p class="card-text text-truncate"><b>Author: </b>{{ $item->book->author }}</p>
                        </div>
                        <div class="p-2 text-center">
                            <form action="{{ route('book.complete', $item->book->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary btn-sm ">
                                    Mark as Read
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-muted" style="display: flex; justify-content: center; align-items: center; margin-top: 150px;">
                    You are not currently reading any books.
                </p>
            @endforelse
        </div>
    </div>
</div>
@endsection
