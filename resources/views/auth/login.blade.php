@extends('layout')

@section('content')
<main class="login-form">
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header">Login</div>
                  <div class="card-body">
  
                      <form id="loginForm" action="{{ route('login.post') }}" method="POST">
                          @csrf
                          <div class="form-group row">
                              <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                              <div class="col-md-6">
                                  <input type="email" id="email_address" class="form-control" name="email" required autofocus>
                                  <span class="text-danger" id="emailError"></span>
                                  @if ($errors->has('email'))
                                      <span class="text-danger">{{ $errors->first('email') }}</span>
                                  @endif
                              </div>
                          </div>
  
                          <div class="form-group row">
                              <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                              <div class="col-md-6">
                                  <input type="password" id="password" class="form-control" name="password" required>
                                  <span class="text-danger" id="passwordError"></span>
                                  @if ($errors->has('password'))
                                      <span class="text-danger">{{ $errors->first('password') }}</span>
                                  @endif
                              </div>
                          </div>
  
                          {{-- <div class="form-group row">
                              <div class="col-md-6 offset-md-4">
                                  <div class="form-check">
                                      <input type="checkbox" class="form-check-input" name="remember" id="remember">
                                      <label class="form-check-label" for="remember">Remember Me</label>
                                  </div>
                              </div>
                          </div> --}}
  
                          <div class="form-group row">
                              <div class="col-md-6 offset-md-4">
                                  <div class="checkbox">
                                      <label>
                                          <a href="{{ route('forget.password.get') }}">Reset Password</a>
                                      </label>
                                  </div>
                              </div>
                          </div>
    
                          <div class="col-md-6 offset-md-4">
                              <button type="submit" class="btn btn-primary">
                                  Login
                              </button>
                          </div>
                      </form>
                        
                  </div>
              </div>
          </div>
      </div>
  </div>
</main>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    const emailInput = document.getElementById('email_address');
    const passwordInput = document.getElementById('password');
    const emailError = document.getElementById('emailError');
    const passwordError = document.getElementById('passwordError');

    emailInput.addEventListener('input', function() {
      if (!emailInput.validity.valid) {
        if (emailInput.value.trim() === "") {
          emailError.textContent = "Email is required.";
        } else if (!/\S+@\S+\.\S+/.test(emailInput.value)) {
          emailError.textContent = "Invalid email format.";
        } else {
          emailError.textContent = "";
        }
      } else {
        emailError.textContent = "";
      }
    });

    passwordInput.addEventListener('input', function() {
      if (passwordInput.value.trim() === "") {
        passwordError.textContent = "Password is required.";
      } else {
        passwordError.textContent = "";
      }
    });
  });
</script>

@endsection
  