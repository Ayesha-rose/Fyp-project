<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Models\Book;
use App\Models\GeminiService;
use Illuminate\Http\Request;


class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    public function store(Request $request, Book $book)
    {
        $validated = $request->validate([
            'review' => 'required|string|min:5|max:2000',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        $status = GeminiService::analyzeReview($validated['review']);
        // dd($status == "Appropriate\n");
        if($status != "Appropriate\n") {
            return back()->withErrors(['review' => 'Your review contains inappropriate content or mistakes.']);
        }
        $book->reviews()->updateOrCreate(
            ['user_id' => auth()->id()],
            [
                'review' => $validated['review'],
                'rating' => $validated['rating'],
            ]
        );

        return back()->with('status', 'Your review and rating have been saved.');
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
