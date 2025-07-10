<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Signup Page</title>
  <link href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('css/signup.css')}}" rel="stylesheet" type="text/css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    .valid {
      color: green;
    }
    .invalid {
      color: red;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="row">
      <!-- Column 1 -->
      <div class="col-lg-6 mb-4 mb-lg-0">
        <img
        src="/images/Logo (1).png"
        alt="Eduverse Logo"
        class="img-fluid logo-img mb-3" />
        <h3>Join <span class="text-primary">Eduverse</span> Today</h3>
        <p class="fs-5 fw-normal">
          Unlock a universe of free books and boundless learning.
        </p>

        @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

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
            placeholder="Name"
            required />
          <input
            type="password"
            id="password"
            name="password"
            class="form-control mb-3"
            placeholder="Enter Password"
            required
            onkeyup="validatePassword()" />
          <input
            type="password"
            name="password_confirmation"
            class="form-control mb-3"
            placeholder="Re-enter Password"
            required />

          <div id="password-rules">
            <div class="row gx-2 gy-2">
              <div class="col-6">
                <p id="length" class="small"><span class="invalid">&#x25CF;</span> Use 8+ characters</p>
              </div>
              <div class="col-6">
                <p id="number" class="small"><span class="invalid">&#x25CF;</span> One number</p>
              </div>
            </div>
          </div>

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
   <script>
    function validatePassword() {
      const password = document.getElementById("password").value;

      const rules = {
        length: password.length >= 8,
        number: /[0-9]/.test(password)
      };

      for (let rule in rules) {
        const element = document.getElementById(rule);
        if (rules[rule]) {
          element.classList.remove("invalid");
          element.classList.add("valid");
          element.querySelector("span").classList.remove("invalid");
          element.querySelector("span").classList.add("valid");
        } else {
          element.classList.remove("valid");
          element.classList.add("invalid");
          element.querySelector("span").classList.remove("valid");
          element.querySelector("span").classList.add("invalid");
        }
      }
    }
  </script>
</body>
</html>