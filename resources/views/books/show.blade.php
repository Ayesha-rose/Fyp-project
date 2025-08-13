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
            <div class="col-md-4">
                <img src="{{ asset('storage/' . $book->image) }}" class="img-fluid rounded" alt="Book Image">
            </div>

            <div class="col-md-8">
                <h2>Title: {{ $book->title }}</h2>
                <h5>Author: {{ $book->author }}</h5>
                <h5>Category: {{ $book->category->category_name }}</h5>
                <p style="text-align: justify; "><b>Description:</b> {{ $book->description }}</p>
                @auth

                <a href="{{ asset('storage/' . $book->pdf_link) }}" class="btn btn-primary" target="_blank">
                    Read Book
                </a>
                @endauth

                @guest

                <a href="{{ route('login') }}" class="btn btn-primary">
                    Read Book
                </a>
                @endguest
                <div class="my-3">
                    <textarea name="review" class="form-control" rows="3" placeholder="Add your review " required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>

</body>

</html>