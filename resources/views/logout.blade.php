<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style3.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <title>Logout Page</title>
</head>

<body>
    <div class="background">
        <div class="card shadow p-4 text-center bg-white">
            <div class="mt-4">
                <img src="images/Logo_ft.png" alt="Logo" class="position-absolute top-0 start-0 m-2">
                <button type="button" class="btn-close position-absolute top-0 end-0 m-2"></button>
                <div class="display-4"><i class="fa-solid fa-circle-exclamation"></i></div>
                <h4 class="mt-3">Are You Leaving?</h4>
                <p>Are you sure you want to log out?</p>
                <!-- <button class="btn btn-outline-primary px-4">Yes I Am</button> -->
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <!-- <a href="{{ route('home') }}" class="btn btn-outline-primary px-4">Yes I Am</a> -->
                    <button type="submit" class="btn btn-outline-primary px-4">Yes I Am</button>
                </form>
                <a href="{{ route('home') }}" class="btn btn-secondary px-4 ms-2">Cancel</a> {{-- Cancel button added --}}
                 <!-- <a href="{{ route('home') }}" class="btn btn-outline-primary px-4">Yes I Am</a> -->
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script src="main.js"></script>
</body>

</html>