<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AdminCategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin_categories.index', compact('categories'));
    }

    public function create()
    {
        $category = new Category();
        return view('admin_categories.create', compact('category'));
    }

    public function store(Request $request)
    {
        $category = new Category();
        $category->category_name = $request->category_name;
        $category->book_name = $request->book_name;
        $category->date = $request->date;
        $category->save();

        return redirect()->route('admin_categories.index');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin_categories.create', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->category_name = $request->category_name;
        $category->book_name = $request->book_name;
        $category->date = $request->date;
        $category->save();

        return redirect()->route('admin_categories.index');
    }

    public function destroy($id)
    {
        Category::findOrFail($id)->delete();
        return redirect()->route('admin_categories.index');
    }
}
