<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Eduverse</title>
      <!-- Bootstrap & Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
  <link href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
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

                <a href="{{ asset('storage/' . $book->pdf_link) }}" class="btn btn-primary" target="_blank">
                    Read Book
                </a>
                <button type="submit" class="btn btn-outline-danger btn-sm">
                    <i class="fa-regular fa-heart"></i>
                </button>
                @endauth

                @guest

                <a href="{{ route('login') }}" class="btn btn-primary">
                    Read Book
                </a>
                @endguest

            </div>
        </div>
    </div>

</body>

</html>