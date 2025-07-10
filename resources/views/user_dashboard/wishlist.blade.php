@extends('user_dashboard.usersidebar')

@section('userpanelcontent')
<div class="main-content mt-4">
    <div class="feed">
        <h2 class="fw-bold">Wishlist</h2>
        <div class="d-flex flex-column align-items-center text-muted feed-box fw-bold">
            <p class="text-center">
                There are no recent books in your feed. When you<br> follow public accounts,
                their book updates will <br>appear here.
            </p>
            <button class="btn btn-primary mt-3">Add Now</button>
        </div>
        <div class="d-flex justify-content-end">
            <img src="images/books.png" alt="Reading Illustration" class="img-fluid">
        </div>
    </div>
</div>
@endsection