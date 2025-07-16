@extends('admin.master')


@section('adminpanel')
<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2>Add Books</h2>
                <a href="{{ route ('manage_books.index')}}" class="btn text-white px-4 pt-2" style="background-color: #015F9E;">
                    Back
                </a>
            </div>

            <form action="{{ $book->id ? route('manage_books.update', $book->id) : route('manage_books.store') }}" method="POST">
                @csrf
                @if($book->id)
                @method('put')
                @endif
                <div class="row g-3">
                    <div class="col-md-6 form-group">
                        <label for="category_id">Select Category</label>
                        <select class="form-control" name="category_id" required>
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $book->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->category_name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" placeholder="Title" required value="{{ $book->title ?? '' }}">
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="author">Author</label>
                        <input type="text" class="form-control" placeholder="Author" name="author" required value="{{ $book->author ?? '' }}">
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="pdf_path">Pdf_Path</label>
                        <input type="link" class="form-control" placeholder="Pdf_Path" name="pdf_path" required value="{{ $book->pdf_path ?? '' }}">
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="description">Description</label>
                        <input type="text" class="form-control" placeholder="description" name="description" required value="{{ $book->description ?? '' }}">
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="image">Image</label>
                        <input type="text" class="form-control" placeholder="Image" name="image" value="{{ $book->image ?? '' }}">
                    </div>
                    <button class="btn mt-4" style="background-color: #015F9E; color: white;">
                        {{ $book->id ? 'Update' : 'Create' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@stop