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
    public function index()
    {
       $user = auth()->user();

        $month = Carbon::now()->month;
        $year = Carbon::now()->year;

        $startOfMonth = Carbon::create($year, $month, 1)->startOfMonth();
        $endOfMonth = Carbon::create($year, $month, 1)->endOfMonth();

        $readings = Reading::with('book')
            ->where('user_id', $user->id)
            ->whereBetween('created_at', [$startOfMonth, $endOfMonth])
            ->get();

        // 📌 Events (completed / reading)
        $events = [];
        foreach ($readings as $reading) {
            $date = Carbon::parse($reading->created_at)->format('Y-m-d');
            if ($reading->status == 'complete') {
                $events[$date][] = "✅ Completed: " . $reading->book->title;
            } elseif ($reading->status == 'read') {
                $events[$date][] = "📖 Reading: " . $reading->book->title;
            }
        }

        // 🔥 Streak Logic
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
                // ✨ New streak start
                $streakStart = $date;
                $streakDays[$date]['start'] = true;
                $currentStreak = 1;
            } else {
                // ✨ Streak continue
                $streakDays[$date]['continue'] = true;
                $currentStreak++;
            }

            // Always mark day
            $streakDays[$date]['day'] = true;

            // Check next day (end of streak)
            $nextDate = $dates->get($i + 1);
            if (!$nextDate || Carbon::parse($date)->addDay()->format('Y-m-d') != $nextDate) {
                if ($date != $streakStart) {
                    $streakDays[$date]['end'] = true;
                }
            }

            $maxStreak = max($maxStreak, $currentStreak);
            $prevDate = $date;
        }

        // ✅ Agar streak aaj tak chal rahi hai → last day "continue" hoga, "end" nahi
        if ($prevDate && $prevDate == Carbon::today()->format('Y-m-d')) {
            unset($streakDays[$prevDate]['end']);
            $streakDays[$prevDate]['continue'] = true;
        }

        // 📊 Monthly report
        $startedCount = $readings->where('status', 'read')->count();
        $completedCount = $readings->where('status', 'complete')->count();

        return view('user_dashboard.mycalendar', [
            'month' => $month,
            'year' => $year,
            'startOfMonth' => $startOfMonth,
            'endOfMonth' => $endOfMonth,
            'events' => $events,
            'streakDays' => $streakDays,
            'startedCount' => $startedCount,
            'completedCount' => $completedCount,
            'maxStreak' => $maxStreak,
        ]);
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
