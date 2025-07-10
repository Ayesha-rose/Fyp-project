@extends('user_dashboard.usersidebar')

@section('userpanelcontent')
<div class="main-content mt-4">
    <div class="feed">
        <h2 class="fw-bold ">Already Read</h2>
        <div class="d-flex flex-column align-items-center text-muted feed-box fw-bold">
            <p class="text-center">
                You haven't added any books to this shelf<br> yet. Search for a book to add your
                reading<br> log.
            </p>
            <button class="btn btn-primary mt-3">Search For a Book</button>
        </div>
        <div class="d-flex justify-content-end">
            <img src="images/books.png" alt="Reading Illustration" class="img-fluid">
        </div>
    </div>
</div>
</div>
</div>

@endsection