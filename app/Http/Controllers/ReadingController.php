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
        return redirect()->route('book.show', $bookId);
    }

    public function read(Request $request, $bookId)
    {
        $userId = Auth::id();

        // 1️⃣ Update reading status
        Reading::updateOrCreate(
            ['user_id' => $userId, 'book_id' => $bookId],
            ['status' => 'read']
        );

        // 2️⃣ Update streak
        $this->updateStreak();

        // 3️⃣ Redirect to PDF
        $book = \App\Models\Book::findOrFail($bookId);
        return redirect()->away(asset('storage/' . $book->pdf_link));
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
        $userId = Auth::id();
        $today = Carbon::today();
        $yesterday = Carbon::yesterday();

        $lastStreak = ActivityStreak::where('user_id', $userId)
            ->orderBy('activity_date', 'desc')
            ->first();

        $currentStreak = 0;

        if ($lastStreak) {
            if (
                $lastStreak->activity_date->isSameDay($today) ||
                $lastStreak->activity_date->isSameDay($yesterday)
            ) {
                // Agar kal ya aaj ki activity hai → show actual streak
                $currentStreak = $lastStreak->streak_count;
            } else {
                // Gap > 1 day → streak reset ho chuki (UI me 0)
                $currentStreak = 0;
            }
        }

        return view('user_dashboard.activitystreak', compact('currentStreak', 'lastStreak'));
    }



    private function updateStreak()
    {
        $userId = Auth::id();
        $today = Carbon::today();

        $lastStreak = ActivityStreak::where('user_id', $userId)
            ->orderBy('activity_date', 'desc')
            ->first();

        if ($lastStreak) {
            $yesterday = Carbon::yesterday();

            if ($lastStreak->activity_date->isSameDay($yesterday)) {
                // Continue streak
                $streakCount = $lastStreak->streak_count + 1;
            } elseif ($lastStreak->activity_date->isSameDay($today)) {
                // Already updated today
                $streakCount = $lastStreak->streak_count;
            } else {
                // Gap aya (2 ya zyada din miss kiye) → reset streak
                $streakCount = 1;
            }
        } else {
            // First streak
            $streakCount = 1;
        }

        ActivityStreak::updateOrCreate(
            ['user_id' => $userId, 'activity_date' => $today],
            ['streak_count' => $streakCount]
        );
    }


    public function reads($id, Request $request)
    {
        $book = \App\Models\Book::findOrFail($id);

        $currentPage = (int) $request->query('page', 1);

        $notesForThisPage = $book->notes()
            ->where('user_id', auth()->id())
            ->where('page_no', $currentPage)
            ->latest()
            ->get();

        return view('books.show', compact('book', 'currentPage', 'notesForThisPage'));
    }
}
