@extends('master')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endsection

@section('userpanel')
<div class="container">
  <div class="main-content mt-4">
    <h2 class="fw-bold" style="color: #015F9E">Search Results</h2>
    <h5 class="mb-3">
      Results for <span class="fw-semibold">“{{ $query }}”</span>
      @isset($mode)
      <small class="text-muted">({{ $mode }} matches)</small>
      @endisset
    </h5>

    <div class="list-group shadow-sm">
      @forelse($books as $book)
      <div class="col-12 mb-3">
        <div class="card w-100">
          <div class="row g-0">

          <div class="col-md-1">
              <img src="{{ asset('storage/' . $book->image) }}"
                class="img-fluid rounded-start book-image"
                alt="{{ $book->title }}">
            </div>

            <div class="col-md-11">
              <div class="card-body">
                <a href="{{ route('book.show', $book->id) }}"
                  class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                  <div class="mt-3 mb-3">
                    
                    <div class="fw-bold">{{ $book->title }}</div>
                    <small class="text-muted">{{ $book->author }}</small>
                  </div>
                  <br>
                  <i class="fas fa-chevron-right"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      @empty
      <p class="text-muted">No books found for your search.</p>
      @endforelse
    </div>

    @isset($categories)
    {{-- Optional: render categories below if your UX requires it --}}
    @endisset
  </div>
</div>
@endsection