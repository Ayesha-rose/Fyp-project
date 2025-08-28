@extends('user_dashboard.usersidebar')

@section('userpanelcontent')
<div class="main-content mt-4">
    <div class="feed">

        <h2 class="fw-bold">My Activity Streak</h2>

        <div class="row mb-4">
            <!-- Current Streak Card -->
            <div class="col-md-6">
                <div class="card text-center border-0" 
                     style="background-color: #ffffff; transition: box-shadow 0.3s, transform 0.3s; border-radius: 4px; box-shadow: 4px 6px 10px rgba(0, 0, 0, 0.2);">
                    <div class="card-body">
                        <h5 class="card-title text-primary">Current Streak</h5>

                        @if($lastStreak)
                            <p class="display-6 fw-bold" style="color: orangered;">
                                {{ $currentStreak }} <small><i class="fa-solid fa-fire"></i></small>
                            </p>

                            @if($currentStreak > 0)
                                <p class="text-muted mb-0">
                                    Last Activity: {{ $lastStreak->activity_date->format('d M, Y') }}
                                </p>
                            @else
                                <p class="text-muted mb-0">Your streak broke. Start reading again to build it up!</p>
                            @endif
                        @else
                            <p class="text-muted">You have not started your reading streak yet.</p>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Streak History Card -->
            <div class="col-md-6">
                <div class="card text-center border-0" 
                     style="background-color: #ffffff; transition: box-shadow 0.3s, transform 0.3s; border-radius: 4px; box-shadow: 4px 6px 10px rgba(0, 0, 0, 0.2);">
                    <div class="card-body">
                        <h5 class="card-title text-primary">Streak History</h5>

                        @php
                            $streakHistory = \App\Models\ActivityStreak::where('user_id', Auth::id())
                                ->orderBy('activity_date','desc')
                                ->get();
                        @endphp

                        @if($streakHistory->count() > 0)
                            <ul class="list-group list-group-flush mt-3" id="streakHistoryList">
                                @foreach($streakHistory as $index => $streak)
                                    <li class="list-group-item d-flex justify-content-between align-items-center streak-item 
                                        {{ $index >= 3 ? 'd-none' : '' }}">
                                        {{ $streak->activity_date->format('d M, Y') }}
                                        <span class="badge rounded-pill" style="background-color: orangered;">
                                            {{ $streak->streak_count }} <small><i class="fa-solid fa-fire"></i></small>
                                        </span>
                                    </li>
                                @endforeach
                            </ul>

                            @if($streakHistory->count() > 3)
                                <div class="text-center mt-3">
                                    <button class="btn btn-outline-primary btn-sm" id="showMoreBtn">Show More</button>
                                </div>
                            @endif
                        @else
                            <p class="text-muted mt-3">No streak history available.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection

@section('scripts')
    <script src="{{ asset('js/streak.js') }}"></script>
@endsection