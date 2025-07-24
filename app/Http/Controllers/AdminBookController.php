<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AdminBookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('manage_books.index', compact('books'));
    }

    public function create()
    {
        $book = new Book();
        $categories = Category::all(); 
        return view('manage_books.create', compact('book', 'categories'));
    }

    public function store(Request $request)
    {
        $book = new Book();
        $book->category_id = $request->category_id;
        $book->title = $request->title;
        $book->author = $request->author;
        $book->pdf_link = $request->pdf->store('book-pdf');
        $book->description = $request->description;
        $book->image = $request->image->store('book-image');
        $book->save();

        return redirect()->route('manage_books.index');
    }

    public function edit($id)
    {
        $book = Book::findOrFail($id);
        $categories = Category::all();
       
        return view('manage_books.create', compact('book', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);
        $book->category_id = $request->category_id;
        $book->title = $request->title;
        $book->author = $request->author;
        $book->description = $request->description;

        if ($request->hasFile('pdf')) {
            $book->pdf_link = $request->pdf->store('book-pdf');
        }

        if ($request->hasFile('image')) {
            $book->image = $request->image->store('book-image');
        }

        $book->save();

        return redirect()->route('manage_books.index');
    }

    public function destroy($id)
    {
        Book::findOrFail($id)->delete();
        return redirect()->route('manage_books.index');
    }
}
