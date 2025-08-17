<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class NoteController extends Controller
{
    public function index()
    {
        $user = auth()->user();

 
        $notes = Note::with('book')
            ->where('user_id', $user->id)
            ->orderByDesc('created_at')
            ->get();

        return view('user_dashboard.mynotes', compact('notes'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'book_id' => ['required','exists:books,id'],
            'page_no' => ['required','integer','min:1'],
            'detail'  => ['required','string','max:5000'],
        ]);

        $data['user_id'] = auth()->id();

        Note::create($data);

        return back()->with('success', 'Note saved!');
    }

    public function update(Request $request, Note $note)
    {
        abort_unless($note->user_id === auth()->id(), 403);

        $data = $request->validate([
            'detail'  => ['required','string','max:5000'],
            'page_no' => ['required','integer','min:1'],
        ]);

        $note->update($data);

        return back()->with('success', 'Note updated!');
    }

    public function destroy(Note $note)
    {
        abort_unless($note->user_id === auth()->id(), 403);

        $note->delete();

        return back()->with('success', 'Note deleted!');
    }
}
