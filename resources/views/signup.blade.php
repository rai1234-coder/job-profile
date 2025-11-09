@extends('layouts.mainlayout')

@section('signup', ' - portal')  <!-- Set your page title here -->

@section('content')

<section class="py-4 my-4 d-flex justify-content-center align-items-center">
<div class="signup-card">
    <h2>Create Account</h2>

    @if ($errors->any())
    <ul style="color: red;">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

    <form method="POST" {{ route('signup.user') }}>
      @csrf
      <div class="mb-3">
        <label for="fullname" class="form-label">Full Name</label>
        <input type="text" class="form-control" id="fullname" name="fname" placeholder="Enter your full name">
      </div>

      <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
      </div>

      <div class="mb-3">
        <label for="role" class="form-label">Role</label>
<select class="form-select" name="role" id="role" required>
  <option value="" selected disabled>Select your role</option>
  <option value="job_seeker">Job Seeker</option>
  <option value="employer">Employer</option>
</select>
      </div>

      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
      </div>

      <div class="mb-3">
        <label for="confirmPassword" class="form-label">Confirm Password</label>
        <input type="password" class="form-control" id="confirmPassword" name="password_confirmation" placeholder="Confirm your password">
      </div>

      <button type="submit" class="btn btn-signup">Sign Up</button>
    </form>

    <div class="signup-footer">
      Already have an account? <a href="login.html">Login</a>
    </div>
  </div>
</section>
@endsection