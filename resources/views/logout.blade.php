<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout Page</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    
    <!-- CSS -->
    <link href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="css/style3.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="background" style="background: url('images/logout.png') center/cover no-repeat;">
        <div class="card shadow p-4 text-center bg-white">
            <div class="mt-4">
                <img src="images/Logo_ft.png" alt="Logo" class="position-absolute top-0 start-0 m-2">
                <a href="/" type="button" class="btn-close position-absolute top-0 end-0 m-2" onclick="closeCard()"></a>

                <div class="display-4"><i class="fa-solid fa-circle-exclamation"></i></div>
                <h4 class="mt-3">Are You Leaving?</h4>
                <p>Are you sure you want to log out?</p>

                <!-- YES button -->
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="btn btn-outline-primary px-4">Yes I Am</button>
                </form>

            </div>
        </div>
    </div>


    <script>
        function closeCard() {
            document.querySelector('.card').style.display = 'none';
        }
    </script>
</body>

</html>