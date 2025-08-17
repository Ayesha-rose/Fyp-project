@extends('user_dashboard.usersidebar')

@section('userpanelcontent')
<div class="main-content mt-4">
    <div class="feed">
        <h2 class="fw-bold">My Notes</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="m-0">
                    @foreach($errors->all() as $e)
                        <li>{{ $e }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if($notes->isEmpty())
            <div class="d-flex flex-column align-items-center text-muted feed-box fw-bold">
                <p class="text-center">
                    Your book notes are private and cannot be viewed<br>by other patrons.
                </p>
                <p class="text-center">No notes found.</p>
            </div>
            <div class="d-flex justify-content-end">
                <img src="{{ asset('images/books.png') }}" alt="Reading Illustration" class="img-fluid">
            </div>
        @else
            <div class="row g-3">
                @foreach($notes as $note)
                    <div class="col-md-6">
                        <div class="p-3 border rounded-3">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <div class="fw-bold">
                                        {{ $note->book?->title ?? 'Book #'.$note->book_id }}
                                    </div>
                                    <div class="small text-muted">
                                        Page {{ $note->page_no }} • {{ $note->created_at->format('d-M-Y h:i a') }}
                                    </div>
                                </div>
                                <div>
                                    {{-- Jump to page in reader --}}
                                    <a class="btn btn-sm btn-outline-primary"
                                       href="{{ route('book.read', $note->book_id) }}?page={{ $note->page_no }}">
                                        Open Page
                                    </a>
                                </div>
                            </div>

                            <div class="mt-2">{{ $note->detail }}</div>

                            <div class="mt-2 d-flex gap-2">
                                {{-- Edit (inline simple) --}}
                                <button class="btn btn-sm btn-secondary" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#editNote{{ $note->id }}">
                                    Edit
                                </button>
                                <form action="{{ route('notes.destroy', $note) }}" method="POST" onsubmit="return confirm('Delete this note?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger">Delete</button>
                                </form>
                            </div>

                            <div class="collapse mt-2" id="editNote{{ $note->id }}">
                                <form action="{{ route('notes.update', $note) }}" method="POST">
                                    @csrf @method('PATCH')
                                    <div class="row g-2">
                                        <div class="col-3">
                                            <input type="number" name="page_no" class="form-control" min="1" value="{{ $note->page_no }}">
                                        </div>
                                        <div class="col-9">
                                            <textarea name="detail" class="form-control" rows="2" required>{{ $note->detail }}</textarea>
                                        </div>
                                    </div>
                                    <div class="mt-2">
                                        <button class="btn btn-sm btn-primary">Save Changes</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
@endsection
