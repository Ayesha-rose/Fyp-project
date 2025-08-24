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

        Reading::updateOrCreate(
            ['user_id' => $userId, 'book_id' => $bookId],
            ['status' => 'read']
        );

        $this->updateStreak();

        $book = \App\Models\Book::findOrFail($bookId);
        // dd($book->pdf_link);
        return view('view-pdf', [
            'pdfUrl' => asset('storage/' . $book->pdf_link),
            'book' => $book
        ]);

        // return redirect()->away(asset('storage/' . $book->pdf_link));
    }

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

    public function currently()
    {
        $userId = Auth::id();
        $books = Reading::where('user_id', $userId)
            ->where('status', 'read')
            ->with('book')
            ->get();

        return view('user_dashboard.currentlyread', compact('books'));
    }

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
            $existing->delete();
            return back()->with('message', 'Removed from favorites.');
        } else {
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
                $currentStreak = $lastStreak->streak_count;
            } else {
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
                $streakCount = $lastStreak->streak_count + 1;
            } elseif ($lastStreak->activity_date->isSameDay($today)) {
                $streakCount = $lastStreak->streak_count;
            } else {
                $streakCount = 1;
            }
        } else {
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
