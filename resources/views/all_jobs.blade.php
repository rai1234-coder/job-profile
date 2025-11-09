@extends('layouts.mainlayout')

@section('title', 'All Jobs')  <!-- Set your page title here -->

@section('content')

  <section class="jobs-page">
    <div class="container">
      <div class="row g-4">

        <div class="text-left mb-2">
      <h2 class="fw-bold">All <span class="highlight">Jobs</span></h2>
      

    </div>

        <!-- LEFT SIDEBAR (Filters) -->
        <div class="col-lg-3">
        <form method="GET" action="{{ route('alljobs.show') }}" class="mb-4">
          <div class="filter-sidebar">
            <h4>Filters</h4>
            <a href="{{ route('alljobs.show') }}" class="btn btn-secondary float-end">Clear Filters</a>
            <div class="filter-group">
              <label>Search by Job Title</label>
              <input type="text" class="form-control" name="keyword" value="{{ request('keyword') }}" placeholder="Search job...">
            </div>

            <div class="filter-group">
              <label>Category</label>
              <select name="category" class="form-select">
<option value="">Select Category</option>
    @foreach($categories as $category)
        <option value="{{ $category->id }}" 
            {{ request('category_id') == $category->id ? 'selected' : '' }}>
            {{ $category->name }}
        </option>
    @endforeach
              </select>
            </div>

            <div class="filter-group">
              <label>Location</label>
              <select name="location" class="form-select">
               @foreach($locations as $location)
      <option value="{{ $location }}" {{ request('location') == $location ? 'selected' : '' }}>
        {{ $location }}
      </option>
    @endforeach
              </select>
            </div>

            <div class="filter-group">
              <label>Job Type</label>
              <select name="type" class="form-select">
                <option value="">Select Type</option>
                <option value="remote" {{ request('type') == 'remote' ? 'selected' : '' }}>Remote</option>
                <option value="office" {{ request('type') == 'office' ? 'selected' : '' }}>Office</option>
                <option value="hybrid" {{ request('type') == 'hybrid' ? 'selected' : '' }}>Hybrid</option>
              </select>
            </div>

            <div class="filter-group">
              <label>Salary Range (₹)</label>
              <input type="range" class="form-range" min="10000" max="200000" step="5000" id="salaryRange">
              <p class="mt-2 text-muted small">₹10,000 – ₹2,00,000</p>
            </div>

            <button class="btn w-100 btn-primary">Apply Filters</button>
          </div>
        </form>
        </div>

        <!-- RIGHT SIDE (Job Listings) -->
        <div class="col-lg-9">
          <div class="job-listing">

         @forelse ($jobs as $job)   
            <div class="job-card">
              <h5>{{$job->title}}</h5>
              <div class="job-meta">
                <span>📍 {{$job->location}}</span> | 
                <span>💼 {{$job->category->name}}</span> | 
                <span>🕒 {{$job->type}}</span>
              </div>
              <p>{{ Str::words($job->description, 10, '...') }}</p>
              <div class="salary">₹{{$job->salary}}/month</div>
              <a href="{{ route('job.details', $job->id) }}" class="btn mt-3">View Details</a>
            </div>
                @empty
        <p class="text-center">No jobs found matching your criteria.</p>
    @endforelse
          </div>
        </div>

      </div>
    </div>
  </section>

@endsection