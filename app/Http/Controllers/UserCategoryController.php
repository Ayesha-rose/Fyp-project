<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Category;
use App\Models\Book;


class UserCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::with(['books.reviews'])->get();
        return view('categories', compact('categories'));

    }
    // public function showCategoriesWithBooks()
    // {
    //     $categories = Category::with('books')->get();
    //     return view('categories', compact('categories'));
    // }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    public function search(Request $request)
    {
        $q = trim($request->query('query', ''));
        if ($q === '') {
            return back();
        }

        $needle = mb_strtolower($q);
        $exactTitle  = Book::whereRaw('LOWER(title) = ?',  [$needle])->get();
        $exactAuthor = Book::whereRaw('LOWER(author) = ?', [$needle])->get();

        $exactUnion = $exactTitle->merge($exactAuthor)->unique('id')->values();

        if ($exactUnion->count() === 1) {
            return redirect()->route('book.show', $exactUnion->first()->id);
        }
        if ($exactUnion->count() > 1) {
            $categories = Category::with('books.reviews')->get();
            $books = $exactUnion->sortBy('title')->values();
            return view('books.result', [
                'books' => $books,
                'query' => $q,
                'categories' => $categories,
                'mode' => 'exact',
            ]);
        }

        $partial = Book::query()
            ->where('title', 'LIKE', "%{$q}%")
            ->orWhere('author', 'LIKE', "%{$q}%")
            ->orderBy('title')
            ->get();

        if ($partial->count() === 1) {
            return redirect()->route('book.show', $partial->first()->id);
        }
        if ($partial->count() > 1) {
            $categories = Category::with('books.reviews')->get();
            return view('books.result', [
                'books' => $partial,
                'query' => $q,
                'categories' => $categories,
                'mode' => 'partial',
            ]);
        }

        return back()->withInput()->with('search_modal_message', "No book or author found for \"{$q}\".");
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
    public function show(Book $book)
    {
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
