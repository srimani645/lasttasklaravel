<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Custom User Register Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
  <style type="text/css">
    body {
      background: #F8F9FA;
    }
  </style>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

<section class="bg-light py-3 py-md-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
        <div class="card border border-light-subtle rounded-3 shadow-sm">
          <div class="card-body p-3 p-md-4 p-xl-5">
            <div class="text-center mb-3">
              <a href="#!">
                <img src="{{asset('/img/undraw_rocket.svg') }}" alt="Task Logo" height="100"width="120">
              </a>
            </div>
            <h2 class="fs-6 fw-normal text-center text-secondary mb-4">Sign up to your account</h2>
            <form id="registerForm" method="POST" action="{{ route('register.post') }}">
              @csrf

              @session('error')
                  <div class="alert alert-danger" role="alert"> 
                      {{ session('error') }}
                  </div>
              @endsession

              <div class="row gy-2 overflow-hidden">
                <div class="col-12">
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Name" required>
                    <label for="name" class="form-label">{{ __('Name') }}</label>
                    <div class="invalid-feedback" id="nameError"></div>
                  </div>
                  @error('name')
                        <span class="text-danger" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div class="col-12">
                  <div class="form-floating mb-3">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Email Address" required>
                    <label for="email" class="form-label">{{ __('Email Address') }}</label>
                    <div class="invalid-feedback" id="emailError"></div>
                  </div>
                  @error('email')
                        <span class="text-danger" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div class="col-12">
                  <div class="form-floating mb-3">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Password" required>
                    <label for="password" class="form-label">{{ __('Password') }}</label>
                    <div class="invalid-feedback" id="passwordError"></div>
                  </div>
                  @error('password')
                      <span class="text-danger" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div class="col-12">
                  <div class="form-floating mb-3">
                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password" required>
                    <label for="password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
                    <div class="invalid-feedback" id="passwordConfirmationError"></div>
                  </div>
                  @error('password_confirmation')
                      <span class="text-danger" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div class="col-12">
                  <div class="d-grid my-3">
                    <button class="btn btn-primary btn-lg" type="submit">{{ __('Register') }}</button>
                  </div>
                </div>
                <div class="col-12">
                  <p class="m-0 text-secondary text-center">Have an account? <a href="{{ route('login') }}" class="link-primary text-decoration-none">Sign in</a></p>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
  $(document).ready(function() {
    $('#registerForm input').on('input', function() {
      const name = $('#name').val().trim();
      const email = $('#email').val().trim();
      const password = $('#password').val();
      const passwordConfirmation = $('#password_confirmation').val();
      
      // Name validation
      if (name === "") {
        $('#name').addClass('is-invalid');
        $('#nameError').text("Name is required.");
      } else {
        $('#name').removeClass('is-invalid');
        $('#nameError').text("");
      }

      // Email validation
      if (email === "") {
        $('#email').addClass('is-invalid');
        $('#emailError').text("Email is required.");
      } else if (!/\S+@\S+\.\S+/.test(email)) {
        $('#email').addClass('is-invalid');
        $('#emailError').text("Invalid email format.");
      } else {
        $('#email').removeClass('is-invalid');
        $('#emailError').text("");
      }

      // Password validation
      if (password.length < 6) {
        $('#password').addClass('is-invalid');
        $('#passwordError').text("Password must be at least 6 characters.");
      } else {
        $('#password').removeClass('is-invalid');
        $('#passwordError').text("");
      }

      // Password confirmation validation
      if (passwordConfirmation !== password) {
        $('#password_confirmation').addClass('is-invalid');
        $('#passwordConfirmationError').text("Passwords do not match.");
      } else {
        $('#password_confirmation').removeClass('is-invalid');
        $('#passwordConfirmationError').text("");
      }
    });
  });
</script>

</body>
</html>
