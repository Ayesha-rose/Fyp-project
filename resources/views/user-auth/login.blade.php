<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sign In - Eduverse</title>

  <!-- Bootstrap 5
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
    integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
  <link href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="css/login.css" rel="stylesheet" type="text/css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    

</head>

<body>
  <div class="container">
    <div class="row">
      <!-- Left Side Image -->
     <div class="col-md-6 p-0 d-none d-md-block">
        <img src="/images/Image (1).png" alt="Library Image" class="image_Content" />
      </div>

      <!-- Right Side Form -->
      <div class="col-md-6 d-flex align-items-center justify-content-center">
        <div class="form-wrapper ">
          <h3 class="mb-4 fw-bold">Sign in</h3>
          <!-- Email Input -->
           <form action="/login" method="post">
            @csrf
          <input type="email" class="form-control mb-3 w-100" name="email" placeholder="email@gmail.com" value="{{old('email')}}"/>

          <!-- Password Input -->
          <input type="password" class="form-control mb-1 w-100" name="password" placeholder="Password" value="{{old('password')}}"/>
          
          <div class="d-flex justify-content-end mb-3">
            <a href="#" class="text-muted" style="font-size: 14px;">Forget your password</a>
          </div>

          <!-- Sign In Button -->
          <button class="btn-primary-custom ">Sign in</button>
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
