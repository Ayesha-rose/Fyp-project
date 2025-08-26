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
            $relatedBooks = collect(); 
        } else {
           
            $relatedBooks = Book::with('category')
                ->whereIn('category_id', $categoryIds)
                ->whereNotIn('id', $seedBookIds)
                ->orderByDesc('created_at')
                ->get();
        }

        return view('user_dashboard.myfeed', compact('relatedBooks'));
    }
}