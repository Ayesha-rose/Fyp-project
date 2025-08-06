<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Book Display</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding: 2rem;
        }
    </style>
</head>
<body>

<div class="container my-5">
    <div class="row align-items-center g-4">
        <!-- Book Image -->
        <div class="col-auto">
             <img src="{{ asset('storage/' . $book->image) }}" alt="Book Image" class="img-fluid" style="width: 200px;">
        </div>

        <!-- Book Details -->
        <div class="col">
            <h2 class="mb-2">Title:{{$book->title}}</h2>
            <p class="mb-1"><strong>Author:{{$book->author}}</strong> </p>
            <p class="mb-1"><strong>Category:</strong>{{$book->category->category_name}}</p>
            <p class="mb-3"><strong>Description:</strong>{{$book->description}}</p>
         <a href="{{ asset('storage/' . $book->pdf_link) }}" class="btn btn-primary" target="_blank">View PDF</a>
        </div>
    </div>
</div>

</body>
</html>
