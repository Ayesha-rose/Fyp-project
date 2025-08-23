<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Book;


class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check() && Auth::user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }
        $categories = Category::all();

        $books = Book::orderBy('created_at', 'desc')->take(4)->get();

        $topReviews = Review::with('book', 'user')
            ->orderByDesc('rating')
            ->take(5)
            ->get();

        $bestBooks = collect();

        foreach ($categories as $category) {
            $book = $category->books()
                ->withAvg('reviews', 'rating')
                ->orderByDesc('reviews_avg_rating')
                ->first();

            if ($book) {
                $bestBooks->push($book);
            }

            if ($bestBooks->count() >= 4) {
                break;
            }
        }

        return view('home', compact('topReviews', 'categories', 'books', 'bestBooks'));
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function show($id)
    {
        //
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
