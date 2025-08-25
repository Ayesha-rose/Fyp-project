@extends('user_dashboard.usersidebar')

@section('userpanelcontent')
@php
    // Previous & Next Month
    $prevMonth = \Carbon\Carbon::create($year, $month, 1)->subMonth();
    $nextMonth = \Carbon\Carbon::create($year, $month, 1)->addMonth();
@endphp

<div class="main-content mt-4">
    <div class="feed">

        {{-- Month Navigation --}}
        <div class="d-flex justify-content-between mb-3">
            <a href="{{ route('user_dashboard.mycalendar', ['month' => $prevMonth->month, 'year' => $prevMonth->year]) }}" class="btn btn-sm btn-outline-primary">&laquo; Previous Month</a>

            <span class="fw-bold">{{ \Carbon\Carbon::create($year, $month)->format('F Y') }}</span>

            <a href="{{ route('user_dashboard.mycalendar', ['month' => $nextMonth->month, 'year' => $nextMonth->year]) }}" class="btn btn-sm btn-outline-primary">Next Month &raquo;</a>
        </div>

       
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th>Sun</th><th>Mon</th><th>Tue</th><th>Wed</th>
                    <th>Thu</th><th>Fri</th><th>Sat</th>
                </tr>
            </thead>
            <tbody>
                @php $currentDay = $startOfMonth->copy(); @endphp
                <tr>
                    
                    @for ($i = 0; $i < $startOfMonth->dayOfWeek; $i++)
                        <td></td>
                    @endfor

                    
                    @while ($currentDay <= $endOfMonth)
                        @php $dayKey = $currentDay->format('Y-m-d'); @endphp
                        <td style="vertical-align: top; height: 120px; @if(isset($streakDays[$dayKey])) background-color: lightblue; @endif">
                            <strong>{{ $currentDay->day }}</strong>
                            <div style="font-size: 11px; text-align:left;">

                                
                                @if(isset($eventsToShow[$dayKey]))
                                    @foreach($eventsToShow[$dayKey] as $event)
                                        <div><b>{{ $event }}</b></div>
                                    @endforeach

                                    @if(count($events[$dayKey]) > 2)
                                        @if($showMoreDay === $dayKey)
                                            <a href="{{ route('user_dashboard.mycalendar', ['month' => $month, 'year' => $year]) }}">Show Less</a>
                                        @else
                                            <a href="{{ route('user_dashboard.mycalendar', ['month' => $month, 'year' => $year, 'day' => $dayKey, 'action' => 'more']) }}">Show More</a>
                                        @endif
                                    @endif
                                @endif

                                
                                @if(isset($streakDays[$dayKey]['start']))
                                    <div><i class="fa-solid fa-fire" style="color: orangered;"></i> Streak Started</div>
                                @endif
                                @if(isset($streakDays[$dayKey]['continue']))
                                    <div><i class="fa-solid fa-fire" style="color: orangered;"></i> Streak Continue</div>
                                @endif
                                @if(isset($streakDays[$dayKey]['end']))
                                    <div><i class="fa-solid fa-fire" style="color: orangered;"></i> Streak Ended</div>
                                @endif
                            </div>
                        </td>

                        
                        @if ($currentDay->dayOfWeek == 6)
                            </tr><tr>
                        @endif

                        @php $currentDay->addDay(); @endphp
                    @endwhile

                    
                    @for ($i = $endOfMonth->dayOfWeek; $i < 6; $i++)
                        <td></td>
                    @endfor
                </tr>
            </tbody>
        </table>

        {{-- Monthly Report --}}
        <hr>
        <div class="my-4 p-3 border rounded">
            <h4 class="fw-bold"><i class="fa-solid fa-square-poll-vertical"></i> Monthly Report</h4>
            <p><i class="fa-solid fa-book-open"></i> <b>Books Started:</b> {{ $startedCount }}</p>
            <p><i class="fa-solid fa-square-check" style="color: green;"></i> <b>Books Completed:</b> {{ $completedCount }}</p>
            <p><i class="fa-solid fa-fire" style="color: orangered;"></i> <b>Longest Streak:</b> {{ $maxStreak }} days</p>
        </div>
    </div>
</div>
@endsection
