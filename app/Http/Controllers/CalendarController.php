<?php

namespace App\Http\Controllers;


use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Models\Reading;
use Carbon\Carbon;

class CalendarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = auth()->user();

        $month = $request->query('month', Carbon::now()->month);
        $year = $request->query('year', Carbon::now()->year);


        $startOfMonth = Carbon::create($year, $month, 1)->startOfMonth();
        $endOfMonth = Carbon::create($year, $month, 1)->endOfMonth();

        $readings = Reading::with('book')
            ->where('user_id', $user->id)
            ->whereBetween('created_at', [$startOfMonth, $endOfMonth])
            ->get();

        $events = [];
        foreach ($readings as $reading) {
            $date = Carbon::parse($reading->created_at)->format('Y-m-d');
            if ($reading->status == 'complete') {
                $events[$date][] = "Completed: " . $reading->book->title;
            } elseif ($reading->status == 'read') {
                $events[$date][] = "Reading: " . $reading->book->title;
            }
        }

        $showMoreDay = $request->query('day');
        $showMoreAction = $request->query('action');

        $eventsToShow = [];
        foreach ($events as $day => $dayEvents) {
            if ($day === $showMoreDay && $showMoreAction === 'more') {
                $eventsToShow[$day] = $dayEvents;
            } else {
                $eventsToShow[$day] = array_slice($dayEvents, 0, 2);
            }
        }

        $streakDays = [];
        $dates = collect($readings)
            ->pluck('created_at')
            ->map(fn($d) => Carbon::parse($d)->format('Y-m-d'))
            ->unique()
            ->sort()
            ->values();

        $prevDate = null;
        $streakStart = null;
        $maxStreak = 0;
        $currentStreak = 0;

        foreach ($dates as $i => $date) {
            if (!$prevDate || Carbon::parse($prevDate)->addDay()->format('Y-m-d') != $date) {
                $streakStart = $date;
                $streakDays[$date]['start'] = true;
                $currentStreak = 1;
            } else {
                $streakDays[$date]['continue'] = true;
                $currentStreak++;
            }

            $streakDays[$date]['day'] = true;

            $nextDate = $dates->get($i + 1);
            if (!$nextDate || Carbon::parse($date)->addDay()->format('Y-m-d') != $nextDate) {
                
                $streakDays[$date]['end'] = true;
                // if ($date != $streakStart) {
                //     $streakDays[$date]['end'] = true;
                // }
            }

            $maxStreak = max($maxStreak, $currentStreak);
            $prevDate = $date;
        }

        // if ($prevDate && $prevDate == Carbon::today()->format('Y-m-d')) {
        //     unset($streakDays[$prevDate]['end']);
        //     $streakDays[$prevDate]['continue'] = true;
        // }

        $startedCount = $readings->where('status', 'read')->count();
        $completedCount = $readings->where('status', 'complete')->count();

        return view('user_dashboard.mycalendar', compact('month', 'year', 'startOfMonth', 'endOfMonth', 'events', 'eventsToShow', 'streakDays', 'startedCount', 'completedCount', 'maxStreak', 'showMoreDay'));
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
