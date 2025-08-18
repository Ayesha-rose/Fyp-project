
@extends('user_dashboard.usersidebar')

@section('userpanelcontent')
<div class="main-content mt-4">
    <div class="feed">
        <h2 class="fw-bold">My Notes</h2>
        <div class="d-flex flex-column align-items-center text-muted feed-box fw-bold">
            <p class="text-center">
                Your book notes are private and cannot be viewed<br>by other patrons.
            </p>
            <p class="text-center">No notes found.</p>

        </div>
        <div class="d-flex justify-content-end">
            <img src="images/books.png" alt="Reading Illustration" class="img-fluid">
        </div>
    </div>
</div>

@endsection