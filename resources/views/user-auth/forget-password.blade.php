<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Eduverse - Forgot Password</title>
  <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/login.css') }}" rel="stylesheet" type="text/css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-md-6 p-0 d-none d-md-block d-sm-block"></div>
      <div class="col-md-6">
        <div class="form-wrapper" style="margin-top: 160px;">
          <h3 class="mb-4 fw-bold" style="color: #015F9E;">Forgot Password</h3>

          @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
          @endif
          @if ($errors->any())
            <div class="alert alert-danger mb-3">
              <ul class="mb-0">
                @foreach ($errors->all() as $e)
                  <li>{{ $e }}</li>
                @endforeach
              </ul>
            </div>
          @endif

          <form action="{{ route('password.email') }}" method="post">
            @csrf
            <input type="email" class="form-control mb-3 w-100" name="email" placeholder="example@gmail.com" required>
            <button class="btn-primary-custom fw-bold w-100">Send Reset Link</button>
          </form>

          <div class="form-footer mt-4">
            Remembered your password? <a href="{{ route('login') }}">Sign in</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
