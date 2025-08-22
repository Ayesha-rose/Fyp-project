<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\User;
use App\Models\Book;
use Illuminate\Support\Facades\DB;


class AdminDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $totalUsers = User::where('role', 'user')->count();
        $totalBooks = Book::count();
        $averageRating = DB::table('reviews')->avg('rating');

        return view('admin.dashboard', compact('totalUsers', 'totalBooks', 'averageRating'));
    }


    public function users()
    {
        $users = User::where('role', 'user')->orderBy('id', 'asc')->get();

        return view('admin.users', compact('users'));
    }

    public function reviews()
    {
        $books = Book::whereHas('reviews')->get();

        return view('admin.adminreviews', compact('books'));
    }

    public function bookReviews($id)
    {
        $book = Book::with('reviews.user')->findOrFail($id);
        return view('admin.book_reviews', compact('book'));
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
