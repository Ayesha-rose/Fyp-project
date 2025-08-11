<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\CurrentlyReading;
use Illuminate\Routing\Controller;

class CurrentlyReadingController extends Controller
{
    public function store($bookId)
    {
        $user = Auth::user();


        $exists = CurrentlyReading::where('user_id', $user->id)
            ->where('book_id', $bookId)
            ->exists();

        if (!$exists) {
            CurrentlyReading::create([
                'user_id' => $user->id,
                'book_id' => $bookId,
            ]);
        }


        return redirect()->route('book.show', $bookId);
    }
    public function index()

    {
        $user = Auth::user();

        
        $books = CurrentlyReading::where('user_id', $user->id)
            ->with('book')
            ->latest()
            ->get();

        return view('user_dashboard.currentlyread', compact('books'));
    }
}
