@extends('layouts.mainlayout')

@section('login', 'login - portal')  <!-- Set your page title here -->

@section('content')

<section class="py-4 my-4 d-flex justify-content-center align-items-center">
 <div class="login-card">
    <h2>Login to portal</h2>

    <form method="post" {{ route('login.user') }}>
      @csrf
      <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
      </div>

      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
      </div>

      <div class="d-flex justify-content-between align-items-center mb-4">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="" id="rememberMe">
          <label class="form-check-label" for="rememberMe">
            Remember me
          </label>
        </div>
        <a href="#" class="forgot-password">Forgot Password?</a>
      </div>

      <button type="submit" class="btn btn-login">Login</button>
    </form>

    <div class="login-footer">
      Don't have an account? <a href="{{ route('signup.view') }}">Sign Up</a>
    </div>
  </div>
</section>


@endsection