<?php

namespace App\Http\Controllers;

use App\Models\Reading;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\ActivityStreak;
use Carbon\Carbon;


class ReadingController extends Controller
{
    // Mark book as currently reading
    public function store($bookId)
    {
        $userId = Auth::id();

        Reading::updateOrCreate(
            ['user_id' => $userId, 'book_id' => $bookId],
            ['status' => 'read']
        );
        $this->updateStreak();
        return redirect()->route('book.show', $bookId);
    }

    // Mark book as complete
    public function markComplete($bookId)
    {
        $userId = Auth::id();

        Reading::updateOrCreate(
            ['user_id' => $userId, 'book_id' => $bookId],
            ['status' => 'complete']
        );

        $this->updateStreak();

        return redirect()->route('reading.already');
    }

    // Show currently reading books
    public function currently()
    {
        $userId = Auth::id();
        $books = Reading::where('user_id', $userId)
            ->where('status', 'read')
            ->with('book')
            ->get();

        return view('user_dashboard.currentlyread', compact('books'));
    }

    // Show already read books
    public function already()
    {
        $userId = Auth::id();
        $books = Reading::where('user_id', $userId)
            ->where('status', 'complete')
            ->with('book')
            ->get();

        return view('user_dashboard.alreadyread', compact('books'));
    }

    public function favorites()
    {
        $userId = Auth::id();
        $books = Reading::where('user_id', $userId)
            ->where('status', 'favorite')
            ->with('book')
            ->get();

        return view('user_dashboard.favorites', compact('books'));
    }

    public function toggleFavorite($bookId)
    {
        $userId = Auth::id();

        $existing = Reading::where('user_id', $userId)
            ->where('book_id', $bookId)
            ->first();

        if ($existing && $existing->status === 'favorite') {
            // Remove favorite
            $existing->delete();
            return back()->with('message', 'Removed from favorites.');
        } else {
            // Mark as favorite
            Reading::updateOrCreate(
                ['user_id' => $userId, 'book_id' => $bookId],
                ['status' => 'favorite']
            );
            return back()->with('message', 'Added to favorites.');
        }
    }

    public function showStreak()
    {
        return view('user_dashboard.activitystreak'); // blade file ka exact naam
    }


    private function updateStreak()
    {
        $userId = Auth::id();
        $today = Carbon::today();

        // Get last streak
        $lastStreak = ActivityStreak::where('user_id', $userId)
            ->orderBy('activity_date', 'desc')
            ->first();

        if ($lastStreak) {
            $yesterday = Carbon::yesterday();

            if ($lastStreak->activity_date->toDateString() == $yesterday->toDateString()) {
                $streakCount = $lastStreak->streak_count + 1; // continue streak
            } elseif ($lastStreak->activity_date->toDateString() == $today->toDateString()) {
                $streakCount = $lastStreak->streak_count; // already updated today
            } else {
                $streakCount = 1; // streak broke
            }
        } else {
            $streakCount = 1; // first streak
        }

        // Insert or update streak
        ActivityStreak::updateOrCreate(
            ['user_id' => $userId, 'activity_date' => $today],
            ['streak_count' => $streakCount]
        );
    }
}
