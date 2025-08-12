<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AlreadyRead;
use App\Models\AlreadyReading;
use App\Models\CurrentlyReading;
use Illuminate\Routing\Controller;

class AlreadyReadController extends Controller
{
    public function store($id)
    {
        $user = auth()->user();

        $exists = AlreadyReading::where('user_id', $user->id)
            ->where('book_id', $id)
            ->first();

        if ($exists) {
            return redirect()->back()->with('message', 'Already marked as read.');
        }

        // Save in already_read
        AlreadyReading::create([
            'user_id' => $user->id,
            'book_id' => $id,
            'finished_at' => now(),
        ]);

        // Remove from currently_reading
        CurrentlyReading::where('user_id', $user->id)
            ->where('book_id', $id)
            ->delete();

        return redirect()->route('user_dashboard.alreadyread')
            ->with('message', 'Book marked as read!');
    }

    public function index()
    {
        $user = auth()->user();
        $books = AlreadyReading::where('user_id', $user->id)->with('book')->get();
        return view('user_dashboard.alreadyread', compact('books'));
    }
}
