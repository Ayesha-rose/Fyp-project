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

            <form action="{{ $book->id ? route('manage_books.update', $book->id) : route('manage_books.store') }}"
                method="POST" enctype="multipart/form-data">
                @csrf
                @if($book->id)
                @method('put')
                @endif
                <div class="row g-3">
                    <div class="col-md-6 form-group">
                        <label for="category_id">Select Category</label>
                        <select class="form-control" name="category_id" required>
                            <option value="">Choose</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $book->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->category_name }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6 form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" required value="{{ $book->title ?? '' }}">
                    </div>

                    <div class="col-md-6 form-group">
                        <label for="author">Author</label>
                        <input type="text" class="form-control" name="author" required value="{{ $book->author ?? '' }}">
                    </div>


                    <div class="col-md-6 form-group">
                        <label for="pdf">Pdf</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Choose file" readonly
                                value="{{ $book->id && $book->pdf_link ? basename($book->pdf_link) : '' }}">
                            <input type="file" name="pdf" class="form-control" style="opacity: 0; position: absolute; left: 0; top: 0; width: 100%; height: 100%;">
                        </div>
                    </div>


                    <div class="col-md-6 form-group">
                        <label for="description">Description</label>
                        <input type="text" class="form-control" name="description" required value="{{ $book->description ?? '' }}">
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="image">Image</label>
                        <div class="input-group" style="position: relative;">
                            <input type="text" class="form-control" placeholder="Choose image" readonly
                                value="{{ $book->id && $book->image ? basename($book->image) : '' }}">
                            <input type="file" name="image" accept="image/*"
                                class="form-control"
                                style="opacity: 0; position: absolute; left: 0; top: 0; width: 100%; height: 100%;">
                        </div>
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