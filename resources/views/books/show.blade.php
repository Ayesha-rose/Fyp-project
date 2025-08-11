<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Eduverse</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container">
        <div class="row align-items-center my-4 g-4">
            <div class="col-md-3">
                <img src="{{ asset('storage/' . $book->image) }}" class="img-fluid rounded" alt="Book Image">
            </div>

            <div class="col-md-9">
                <h2>Title: {{ $book->title }}</h2>
                <h5>Author: {{ $book->author }}</h5>
                <h5>Category: {{ $book->category->category_name }}</h5>
                <p style="text-align: justify;">Description: {{ $book->description }}</p>
               @auth
    <!-- If logged in, show Read Book link -->
    <a href="{{ asset('storage/' . $book->pdf_link) }}" class="btn btn-primary" target="_blank">
        Read Book
    </a>
@endauth

@guest
    <!-- If not logged in, redirect to login page -->
    <a href="{{ route('login') }}" class="btn btn-primary">
        Read Book
    </a>
@endguest

            </div>
        </div>
    </div>

</body>

</html>