@extends('master')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/userpanel.css') }}">
@endsection

@section('userpanel')
<div class="container">
    <div class="row">
        <button id="sidebarToggle" class="btn btn-primary m-3 toggle-btn">
            <i class="fa-solid fa-bars"></i>
        </button>
        <div class="vertical-nav mt-4" id="sidebar">
            <div class="py-4 mb-4">
                <div class="media d-flex align-items-center">
                    <i class="fa-solid fa-user me-2 fs-5"></i>
                    @auth
                    <span>{{ Auth::user()->name }}</span>
                    @else
                    <a class="btn" style="border:none;" href="{{ route('login') }}">Username</a>

                    @endauth
                </div>


                <h4 class="p-3 mb-0">User</h4>
                <ul class="nav flex-column">
                    <li class="nav-item" id="sidemenu"><a href="{{ route('user_dashboard.myfeed') }}" class="nav-link" id="bar"><i
                                class="fa-solid fa-house"></i> My Feed</a></li>
                    <li class="nav-item" id="sidemenu"><a href="{{ route('user_dashboard.myreadingstat') }}" class="nav-link "><i
                                class="fa-solid fa-square-poll-vertical"></i> My Reading Stat</a></li>
                    <li class="nav-item" id="sidemenu"><a href="{{ route('user_dashboard.mycalendar') }}" class="nav-link "><i
                                class="fa-solid fa-calendar-days"></i> My Calendar</a></li>
                    <h4 class="p-3 mb-0">Reading Log</h4>
                    <li class="nav-item" id="sidemenu"><a href="{{ route('user_dashboard.wishlist') }}" class="nav-link"><i
                                class="fa-solid fa-book-open"></i> Wishlist</a></li>
                    <li class="nav-item" id="sidemenu"><a href="{{ route('user_dashboard.currentlyread') }}" class="nav-link "><i
                                class="fa-solid fa-book-open-reader"></i> Currently Read</a></li>
                    <li class="nav-item" id="sidemenu"><a href="{{ route('user_dashboard.alreadyread') }}" class="nav-link "><i
                                class="fa-solid fa-check-double"></i> Already Read</a></li>
                    <li class="nav-item" id="sidemenu"><a href="{{ route('user_dashboard.mynotes') }}" class="nav-link "><i
                                class="fa-solid fa-note-sticky"></i> My Notes</a></li>
                    <li class="nav-item" id="sidemenu"><a href="{{ route('user_dashboard.myreviews') }}" class="nav-link"><i
                                class="fa-solid fa-star"></i> My Reviews</a></li>
                </ul>
            </div>
        </div>
        <div class="userpanelcontent">
            @yield('userpanelcontent')
        </div>
    </div>
</div>
@endsection


@section('scripts')
<!-- <script src="main.js"></script> -->
<script src="{{ asset('js/main.js') }}"></script> 
<script src="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js') }}"></script> 

<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script> -->
@endsection