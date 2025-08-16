@extends('user_dashboard.usersidebar')

@section('userpanelcontent')
<div class="main-content mt-4">
    <div class="feed">

        <h2 class="fw-bold">My Activity Streak</h2>

        @php
        $userId = Auth::id();
        $lastStreak = \App\Models\ActivityStreak::where('user_id', $userId)
        ->orderBy('activity_date', 'desc')
        ->first();
        $streakHistory = \App\Models\ActivityStreak::where('user_id', $userId)
        ->orderBy('activity_date','desc')
        ->get();
        @endphp

        <div class="row mb-4">
            <div class="col-md-6">
                <div class="card text-center border-0" style="background-color: #ffffff; transition: box-shadow 0.3s, transform 0.3s; border-radius: 4px; box-shadow: 4px 6px 10px rgba(0, 0, 0, 0.2);">
                    <div class="card-body">
                        <h5 class="card-title text-primary">Current Streak</h5>
                        @if($lastStreak)
                        <p class="display-6 fw-bold">{{ $lastStreak->streak_count }} <small>day(s)</small></p>
                        <p class="text-muted mb-0">Last Activity: {{ $lastStreak->activity_date->format('d M, Y') }}</p>
                        @else
                        <p class="text-muted">You have not started your reading streak yet.</p>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card border-0" style="background-color: #ffffff; transition: box-shadow 0.3s, transform 0.3s; border-radius: 4px; box-shadow: 4px 6px 10px rgba(0, 0, 0, 0.2);">
                    <div class="card-body">
                        <h5 class="card-title text-primary">Streak History</h5>
                        @if($streakHistory->count() > 0)
                        <ul class="list-group list-group-flush mt-3">
                            @foreach($streakHistory as $streak)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $streak->activity_date->format('d M, Y') }}
                                <span class="badge bg-success rounded-pill">{{ $streak->streak_count }} day(s)</span>
                            </li>
                            @endforeach
                        </ul>
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