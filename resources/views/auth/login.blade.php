@extends('templates.guest')
@section('content')
  <div class="login-box">
    <div class="login-logo">
      <a href="../../index2.html"><b>Login</b>Tatib</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Sign in to App Tatib</p>

        <form action="../../index3.html" method="post">
          <div class="input-group mb-3">
            <input type="email" class="form-control" placeholder="Email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="remember">
                <label for="remember">
                  Remember Me
                </label>
              </div>
            </div>
          </div>
          <div class="social-auth-links text-center mb-3">
            <a href="#" class="btn btn-block btn-primary">
              Sign In
            </a>
          </div>
        </form>

        {{-- <p class="mb-1">
          <a href="forgot-password.html">I forgot my password</a>
        </p> --}}
        <p class="mb-0">
          <a href="register.html" class="text-center">Create new account</a>
        </p>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
@endsection
