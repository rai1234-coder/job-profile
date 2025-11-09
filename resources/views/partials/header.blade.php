 <!-- ===== Header Start ===== -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top">
    <div class="container">
      <!-- Logo -->
      <a class="navbar-brand" href="{{ route('home.view') }}">
        Job<span>Portal</span>
      </a>

      <!-- Mobile Toggle -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Menu -->
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav align-items-center">
          <li class="nav-item">
            <a class="nav-link active" href="{{ route('home.view') }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('alljobs.show') }}">Find Jobs</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('login.view') }}">Login</a>
          </li>
          <li class="nav-item ms-2">
            <a href="{{ route('employer.dashboard') }}" class="btn btn-post-job">Post a Job</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- ===== Header End ===== -->