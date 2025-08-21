@extends('master')

@section('userpanel')
<div class="container">
  <h5 class="mb-3">
    Results for <span class="fw-semibold">“{{ $query }}”</span>
    @isset($mode)
      <small class="text-muted">({{ $mode }} matches)</small>
    @endisset
  </h5>

  <div class="list-group shadow-sm">
    @foreach($books as $book)
      <a href="{{ route('book.show', $book->id) }}"
         class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
        <div>
          <div class="fw-bold">{{ $book->title }}</div>
          <small class="text-muted">{{ $book->author }}</small>
        </div>
        <i class="fas fa-chevron-right"></i>
      </a>
    @endforeach
  </div>

  @isset($categories)
    {{-- Optional: render categories below if your UX requires it --}}
  @endisset
</div>

@endsection
