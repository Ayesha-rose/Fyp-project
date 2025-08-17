<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Eduverse</title>
  <link href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('css/login.css')}}" rel="stylesheet" type="text/css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />


</head>

<body>
  <div class="container">
    <div class="row">
      <!-- Left Side Image -->
      <div class="col-md-6 p-0 d-none d-md-block d-sm-block">
        <!-- <img src="/images/signup_img.png" alt="Library Image" class="img-fluid" /> -->
      </div>

      <!-- Right Side Form -->
      <div class="col-md-6">
        <div class="form-wrapper" style="margin-top: 160px;">
          <h3 class="mb-4 fw-bold" style="color: #015F9E;">Sign in</h3>
          <!-- Email Input -->
          <form action="/login" method="post">
            @csrf
            <input type="email" class="form-control mb-3 w-100" name="email" placeholder="example@gmail.com" value="" required>

            <!-- Password Input -->
            <input type="password" class="form-control mb-1 w-100" name="password" placeholder="Password" value="" required>

            <div class="d-flex justify-content-end mb-3">
              <a href="#" class="text-muted" style="font-size: 14px;">Forget your password</a>
            </div>

            <!-- Sign In Button -->
            <button class="btn-primary-custom  fw-bold">Sign in</button>
          </form>
          <!-- Footer -->
          <div class="form-footer mt-4">
            Don’t have an account? <a href="signup">Sign up</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>