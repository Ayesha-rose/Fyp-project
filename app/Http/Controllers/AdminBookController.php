<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AdminBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $books = Book::all();
        // return view('manage_books.index', compact('books'));
        $books = Book::with('category')->get();
        return view('manage_books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $book = new Book();
        $categories = Category::all();
        return view('manage_books.create', compact('book', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = Category::findOrFail($request->category_id);
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $book = Book::with('category')->findOrFail($id);
        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::findOrFail($id);
        $categories = Category::all();

        return view('manage_books.create', compact('book', 'categories'));
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
        $book = Book::findOrFail($id);
        $category = Category::findOrFail($request->category_id);
        $book->category_id = $category->id;
        $book->title = $request->title;
        $book->author = $request->author;
        if ($request->hasFile('pdf_link')) {
            $book->pdf_link = $request->pdf->store('book-pdf');
        }
        $book->description = $request->description;
        if ($request->hasFile('image')) {
            $book->image = $request->image->store('book-image');
        }

        $book->save();

        return redirect()->route('manage_books.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Book::findOrFail($id)->delete();
        return redirect()->route('manage_books.index');
    }
}
