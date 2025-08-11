@extends('user_dashboard.usersidebar')

@section('userpanelcontent')
<div class="main-content mt-4">
    <div class="feed">
        <h2 class="fw-bold">Currently Reading Stat</h2>
        
     <div class="row">
            @forelse($books as $item)
                <div class="col-md-2 mb-4">
                    <div class="card">
                        <a href="{{ route('book.read', $item->book->id) }}">
                            <img src="{{ asset('storage/' . $item->book->image) }}" alt="Book Image" style="height: 200px; object-fit: cover;">
                        </a>
                        <div class="card-body" style="margin: 0px; padding: 0px;">
                            <a href="{{ route('book.show', $item->book->id) }}" class="card-text">
                                <b>Title: </b>{{ $item->book->title }}
                            </a>
                            <p class="card-text"><b>Author: </b>{{ $item->book->author }}</p>
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