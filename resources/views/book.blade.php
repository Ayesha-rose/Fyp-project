<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduVerse</title>
</head>
<body>
<div class="container py-4">
    <div class="row">
        <div class="col-md-5">
            <img src="{{ asset('storage/' . $book->image) }}" class="img-fluid rounded" alt="Book Image">
        </div>
        <div class="col-md-7">
            <h2>{{ $book->title }}</h2>
            <h2>{{ $book->author }}</h2>
            <h5>Category: {{ $book->category->category_name }}</h5>
            <p>{{ $book->description }}</p>
            <a href="{{ asset('storage/' . $book->pdf_link) }}" class="btn btn-primary" target="_blank">
                View/Download PDF
            </a>
        </div>
    </div>
</div>

</body>
</html>