@extends('layouts.adminmain')

@section('title', 'Admin - Dashboiard')  <!-- Set your page title here -->

@section('content')


  <!-- Main Content -->
  <div class="main-content">
    <!-- Navbar -->
    <div class="navbar-custom d-flex justify-content-between align-items-center">
      <h5 class="mb-0 fw-bold">Dashboard</h5>
      <div class="d-flex align-items-center">
        <i class="bi bi-bell fs-5 me-3"></i>
        <img src="https://via.placeholder.com/40" alt="Admin" class="rounded-circle">
      </div>
    </div>

    <!-- Stats Cards -->
    <div class="row g-4 mb-4">
      <div class="col-md-3">
        <div class="stats-card">
          <i class="bi bi-briefcase-fill"></i>
          <h5 class="fw-bold mt-2">120</h5>
          <p class="text-muted mb-0">Active Jobs</p>
        </div>
      </div>
      <div class="col-md-3">
        <div class="stats-card">
          <i class="bi bi-building"></i>
          <h5 class="fw-bold mt-2">45</h5>
          <p class="text-muted mb-0">Employers</p>
        </div>
      </div>
      <div class="col-md-3">
        <div class="stats-card">
          <i class="bi bi-person-check-fill"></i>
          <h5 class="fw-bold mt-2">320</h5>
          <p class="text-muted mb-0">Job Seekers</p>
        </div>
      </div>
      <div class="col-md-3">
        <div class="stats-card">
          <i class="bi bi-currency-rupee"></i>
          <h5 class="fw-bold mt-2">₹1.2L</h5>
          <p class="text-muted mb-0">Revenue</p>
        </div>
      </div>
    </div>

    <!-- Recent Jobs Table -->
    <div class="table-responsive">
      <table class="table align-middle">
        <thead>
          <tr>
            <th>Job Title</th>
            <th>Company</th>
            <th>Location</th>
            <th>Status</th>
            <th>Posted On</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Frontend Developer</td>
            <td>TechSoft</td>
            <td>Delhi</td>
            <td><span class="badge bg-success">Active</span></td>
            <td>Oct 15, 2025</td>
          </tr>
          <tr>
            <td>Backend Engineer</td>
            <td>CodeWorks</td>
            <td>Bangalore</td>
            <td><span class="badge bg-warning text-dark">Pending</span></td>
            <td>Oct 12, 2025</td>
          </tr>
          <tr>
            <td>UI/UX Designer</td>
            <td>DesignHub</td>
            <td>Mumbai</td>
            <td><span class="badge bg-success">Active</span></td>
            <td>Oct 10, 2025</td>
          </tr>
          <tr>
            <td>Marketing Manager</td>
            <td>BizGrow</td>
            <td>Pune</td>
            <td><span class="badge bg-danger">Closed</span></td>
            <td>Oct 8, 2025</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

@endsection


