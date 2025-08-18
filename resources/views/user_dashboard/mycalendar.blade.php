@extends('user_dashboard.usersidebar')

@section('userpanelcontent')
<div class="container mt-4">

    <!-- 🔥 Streak Summary -->
    <div class="alert alert-success text-center">
        🔥 Current Streak: {{ count($streakDays) }} days <br>
        🏆 Longest Streak: {{ $maxStreak }} days
    </div>

    <h2 class="fw-bold text-center mb-4">📅 My Reading Calendar - {{ \Carbon\Carbon::create($year, $month)->format('F Y') }}</h2>

    <table class="table table-bordered text-center">
        <thead>
            <tr>
                <th>Sun</th>
                <th>Mon</th>
                <th>Tue</th>
                <th>Wed</th>
                <th>Thu</th>
                <th>Fri</th>
                <th>Sat</th>
            </tr>
        </thead>
        <tbody>
            @php
                $currentDay = $startOfMonth->copy();
            @endphp

            <tr>
                {{-- Empty cells before month start --}}
                @for ($i = 0; $i < $startOfMonth->dayOfWeek; $i++)
                    <td></td>
                @endfor

                {{-- Calendar Days --}}
                @while ($currentDay <= $endOfMonth)
                    <td style="vertical-align: top; height: 120px;
                        @if(in_array($currentDay->format('Y-m-d'), $streakDays)) 
                            background-color: #d4edda; /* light green for streak */
                            border: 2px solid green;
                        @endif
                    ">
                        <strong>{{ $currentDay->day }}</strong>
                        <div style="font-size: 12px; text-align:left;">
                            @if(isset($events[$currentDay->format('Y-m-d')]))
                                @foreach($events[$currentDay->format('Y-m-d')] as $event)
                                    <div>• {{ $event }}</div>
                                @endforeach
                            @endif
                        </div>
                    </td>

                    {{-- Row break on Saturday --}}
                    @if ($currentDay->dayOfWeek == 6)
                        </tr><tr>
                    @endif

                    @php
                        $currentDay->addDay();
                    @endphp
                @endwhile

                {{-- Empty cells after month end --}}
                @for ($i = $endOfMonth->dayOfWeek; $i < 6; $i++)
                    <td></td>
                @endfor
            </tr>
        </tbody>
    </table>
</div>
@endsection
