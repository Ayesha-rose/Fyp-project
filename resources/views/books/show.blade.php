@extends('master')

@section('userpanel')
<div class="container ">
    <div class="row">
        <div class="col-md-3" >
            <img src="{{ asset('storage/' . $book->image) }}" class="img-fluid rounded" alt="Book Image">
        </div>

        <div class="col-md-9">
            <h2>Title: {{ $book->title }}</h2>
            <h5>Author: {{ $book->author }}</h5>
            <h5>Category: {{ $book->category->category_name }}</h5>
            <p>Description: {{ $book->description }}</p>

            <a href="{{ asset('storage/' . $book->pdf_link) }}" class="btn btn-primary" target="_blank">
                View PDF
            </a>
        </div>
    </div>
</div>
@endsection
