  <div class="sidebar">
    <h4>JobPortal Admin</h4>
    <a href="{{ route('employer.dashboard') }}" class="active"><i class="bi bi-speedometer2 me-2"></i> Dashboard</a>
  <li class="nav-item">
  <a class="nav-link collapsed" data-bs-toggle="collapse" href="#jobsMenu" role="button" aria-expanded="false" aria-controls="jobsMenu">
    <i class="bi bi-briefcase me-2"></i> Jobs
  </a>
  <div class="collapse" id="jobsMenu">
    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
      <li><a href="{{ route('jobs.index') }}" class="nav-link">All Jobs</a></li>
      <li><a href="{{ route('category.index') }}" class="nav-link">Manage Categories</a></li>
      {{-- <li><a href="{{ route('locations.index') }}" class="nav-link">Manage Locations</a></li> --}}
    </ul>
  </div>
</li>

    {{-- <a href="#"><i class="bi bi-people me-2"></i> Employers</a> --}}
    <a href="{{ route('job.application') }}"><i class="bi bi-person-lines-fill me-2"></i> Job Seekers</a>
    <a href="#"><i class="bi bi-gear me-2"></i> Settings</a>
    <a href="#"><i class="bi bi-box-arrow-right me-2"></i> Logout</a>
  </div>