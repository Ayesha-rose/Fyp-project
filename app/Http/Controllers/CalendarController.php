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

    $events = [];
    foreach ($readings as $reading) {
        $date = Carbon::parse($reading->created_at)->format('Y-m-d');
        if ($reading->status == 'complete') {
            $events[$date][] = "✅ Completed: " . $reading->book->title;
        } elseif ($reading->status == 'read') {
            $events[$date][] = "📖 Reading: " . $reading->book->title;
        }
    }

    // 🔥 Streak logic
    $streak = 0;
    $maxStreak = 0;
    $streakDays = [];

    $dates = collect($readings)->pluck('created_at')->map(fn($d) => Carbon::parse($d)->format('Y-m-d'))->unique()->sort();

    $prevDate = null;
    foreach ($dates as $date) {
        if ($prevDate && Carbon::parse($prevDate)->addDay()->format('Y-m-d') == $date) {
            $streak++;
        } else {
            $streak = 1;
        }
        $streakDays[] = $date;
        $maxStreak = max($maxStreak, $streak);
        $prevDate = $date;
    }

    return view('user_dashboard.mycalendar', [
        'month' => $month,
        'year' => $year,
        'startOfMonth' => $startOfMonth,
        'endOfMonth' => $endOfMonth,
        'events' => $events,
        'streakDays' => $streakDays,
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
