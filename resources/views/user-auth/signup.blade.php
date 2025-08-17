<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Eduverse</title>
  <link href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('css/signup.css')}}" rel="stylesheet" type="text/css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body>
  <div class="container">
    <div class="row">

      <div class="col-md-6 mt-5">
        <img src="/images/Logo (1).png" alt="Eduverse Logo" class="img-fluid logo-img mb-3" />
        <h3>Join <span class="text-primary">Eduverse</span> Today</h3>
        <p class="fs-5 fw-normal">Unlock a universe of free books and boundless learning. </p>

        <form action="/signup" method="post">
          @csrf
          <input type="email" name="email" class="form-control mb-3" placeholder="Email" required />
          <input type="text" name="name" class="form-control mb-3" placeholder="Name" required />
          <input type="password" id="password" name="password" class="form-control mb-3" placeholder="Enter Password" required onkeyup="validatePassword()" />
          <input type="password" name="password_confirmation" class="form-control mb-3" placeholder="Re-enter Password" required />
          @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
          @endif
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
          <br>
          <!-- <p class="small">
            By creating an account, you agree to the
            <a href="#" class="text-dark">Terms of Use</a> and
            <a href="#" class="text-dark">Privacy Policy</a>.
          </p>
          @error('email')
          <div class="text-danger small">{{ $message }}</div>
          @enderror -->

          <button
            type="submit"
            class="btn2 border-0 text-white rounded-pill w-100 fw-bold">
            Create an Account
          </button>

          <p class="mt-3">
            Already have an account? <a href="login">Sign in</a>
          </p>
        </form>
      </div>


       <!-- <div class="col-md-6 p-0 d-none">
        <img src="/images/signup_img.png" alt="Library Image" class="img-fluid" />
      </div> -->
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