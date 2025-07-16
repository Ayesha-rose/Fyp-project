@extends('admin.master')


@section('adminpanel')
<div class="container">
    <h2>Create Book</h2>
    <form action="{{ route('books.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="category_id">Category_id</label>
            <input type="text" class="form-control" placeholder="Category_id" name="category_id" required value="{{ $category->category_id ?? '' }}">
        </div>
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" placeholder="Title" required value="{{ $category->title ?? '' }}">
        </div>
        <div class="form-group">
            <label for="author">Author</label>
            <input type="text" class="form-control" placeholder="Author" name="author" required value="{{ $category->author ?? '' }}">
        </div>
        <div class="form-group">
            <label for="pdf_path">Pdf_Path</label>
            <input type="link" class="form-control" placeholder="Pdf_Path" name="pdf_path" required value="{{ $category->pdf_path ?? '' }}">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" class="form-control" placeholder="description" name="description" required value="{{ $category->description ?? '' }}">
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="image" class="form-control" placeholder="Image" name="image" required value="{{ $category->image ?? '' }}">
        </div>
        
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@stop