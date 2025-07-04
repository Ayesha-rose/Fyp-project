<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Signup Page</title>
  <link href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="css/signup.css" rel="stylesheet" type="text/css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body>

  <div class="container py-2">
    <div class="row">
      <!-- Column 1 -->
      <div class="col-lg-6 mb-4 mb-lg-0">
        <img
        src="/images/Logo (1).png"
        alt="Eduvers Logo"
        class="img-fluid logo-img mb-3" />
        <h3>Join <span class="text-primary">Eduverse</span> Today</h3>
        <p class="fs-5 fw-normal">
          Unlock a universe of free books and boundless learning.
        </p>

        <form action="/signup" method="post">
          @csrf
          <input
            type="email"
            name="email"
            class="form-control mb-3"
            placeholder="Email"
            required />
          <input
            type="text"
            name="name"
            class="form-control mb-3"
            placeholder="Username"
            required />
          <input
            type="password"
            name="password"
            class="form-control mb-3"
            placeholder="Enter Password"
            required />
          <input
            type="password"
            name="confirmpassword"
            class="form-control mb-3"
            placeholder="Re-enter Password"
            required />

          <div id="password-rules" >
            <div class="row gx-2 gy-2">
              <div class="col-6">
                <p class="small d-flex align-items-center">
                  <img src="/images/Ellipse 1.png" alt="" class="icon" /> Use
                  8+ characters
                </p>
              </div>
              <div class="col-6">
                <p class="small d-flex align-items-center">
                  <img src="/images/Ellipse 1.png" alt="" class="icon" /> One
                  uppercase character
                </p>
              </div>
              <div class="col-6">
                <p class="small d-flex align-items-center">
                  <img src="/images/Ellipse 1.png" alt="" class="icon" /> One
                  lowercase characters
                </p>
              </div>
              <div class="col-6">
                <p class="small d-flex align-items-center">
                  <img src="/images/Ellipse 1.png" alt="" class="icon" /> One
                  special character
                </p>
              </div>
              <div class="col-6">
                <p class="small d-flex align-items-center">
                  <img src="/images/Ellipse 1.png" alt="" class="icon" /> One
                  number
                </p>
              </div>
            </div>
          </div>

          <!-- Checkbox & Terms -->
      <!--    <div class="form-check my-3">
            <input type="checkbox" class="form-check-input" id="consent" />
            <label class="form-check-label small" for="consent">
              I want to receive emails about product updates and promotions.
            </label>
          </div> -->

          <p class="small">
            By creating an account, you agree to the
            <a href="#" class="text-dark">Terms of Use</a> and
            <a href="#" class="text-dark">Privacy Policy</a>.
          </p>

          <!-- Button -->
          <button
            type="submit"
            class="btn2 border-0 text-white rounded-pill w-100 fw-bold">
            Create an Account
          </button>

          <p class="mt-3">
            Already have an account? <a href="login" class="text-dark">Sign in</a>
          </p>
        </form>
      </div>

      <!-- Column 2 -->
      <div class="col-lg-6 p-0">
        <img
        src="/images/img1.png"
        alt="Learning Image"
        class="w-100 img-content" />
      </div>
    </div>
  </div>



</body>

</html>