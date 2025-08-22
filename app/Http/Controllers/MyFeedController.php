<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Reading;

class MyFeedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
       public function index()
    {
        $userId = auth()->id();

        $seedBookIds = Reading::where('user_id', $userId)
            ->whereIn('status', ['read', 'complete'])
            ->pluck('book_id');

        $categoryIds = Book::whereIn('id', $seedBookIds)
            ->pluck('category_id')
            ->unique()
            ->values();

        if ($categoryIds->isEmpty()) {
            $relatedBooks = Book::with('category')
                ->orderByDesc('created_at')
                ->get();
        } else {
            $relatedBooks = Book::with('category')
                ->whereIn('category_id', $categoryIds)
                ->whereNotIn('id', $seedBookIds)
                ->orderByDesc('created_at')
                ->get();
        }

        return view('user_dashboard.myfeed', compact('relatedBooks'));
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
