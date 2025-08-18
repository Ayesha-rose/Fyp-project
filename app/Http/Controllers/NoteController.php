<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class NoteController extends Controller
{
    // Page specific notes
    public function pageNotes(Book $book, Request $request)
    {
        $page = $request->query('page_no', 1);

        $notes = Note::where('user_id', auth()->id())
            ->where('book_id', $book->id)
            ->where('page_no', $page)
            ->get(['x', 'y', 'detail']);

        return response()->json($notes);
    }

    // Store sticky note
    public function store(Request $request)
    {
        $data = $request->validate([
            'book_id' => 'required|exists:books,id',
            'page_no' => 'required|integer|min:1',
            'x' => 'required|numeric',
            'y' => 'required|numeric',
            'detail' => 'required|string|max:5000',
        ]);

        $data['user_id'] = auth()->id();

        Note::create($data);

        return response()->json(['success' => true]);
    }
}
